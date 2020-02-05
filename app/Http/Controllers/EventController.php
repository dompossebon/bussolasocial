<?php

namespace App\Http\Controllers;

use App\Event;
use App\FastEvent;
use App\Http\Requests\EventRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{

    public function viewRegistrationForm(Request $request)
    {
        //
        if (empty($request->id)) {
            return false;
        }
        $detailsAll = FastEvent::with('Event')
            ->where('id', $request->id)
            ->orderBy('start')
            ->get();
        $somaDiffInMinExpected = 0;
        $somaDiffInMinFulfilled = 0;
        foreach ($detailsAll as $details) {
            unset($fullDetails);
            foreach ($details->Event as $detailsOne) {
                $hoursStart = new Carbon($detailsOne->start);
                $hoursEnd = new Carbon($detailsOne->end);
                $diffInMinExpected = $hoursEnd->diffInMinutes($hoursStart);

                if ($detailsOne->status != 2) {
                    $somaDiffInMinExpected += $diffInMinExpected;
                }

                if ($detailsOne->status == 2) {
                    $somaDiffInMinFulfilled += $diffInMinExpected;
                }

                switch ($detailsOne->status) {
                    case 0:
                        $status = "Agendada";
                        break;
                    case 1:
                        $status = "Realizada";
                        break;
                    case 2:
                        $status = "Cancelada";
                        break;
                }

                $turma[] = array(
                    'start' => $detailsOne->start,
                    'end' => $detailsOne->end,
                    'status' => $status,
                );
            }

            $hoursExpected = floor($somaDiffInMinExpected / 60);
            $minutesExpected = $somaDiffInMinExpected % 60;
            $hoursExpected = floor($somaDiffInMinExpected / 60);
            $hoursFulfilled = floor($somaDiffInMinFulfilled / 60);
            $minutesFulfilled = $somaDiffInMinFulfilled % 60;

            $fullDetails[] = array(
                'title' => $details->title,
                'manager' => $details->Event[0]->manager,
                'timeHoursExpected' => $hoursExpected,
                'timeMinutesExpected' => $minutesExpected,
                'timeHoursFulfilled' => $hoursFulfilled,
                'timeMinutesFulfilled' => $minutesFulfilled,
                'moreDetail' => $turma,
            );
        }
//        return $fullDetails;
        return view('group.viewRegistrationForm', ['fullDetails' => $fullDetails]);
    }

    public function listEvents()
    {
        //
        $group = FastEvent::with('Event')->get();
        foreach ($group as $value) {
            unset($status);
            $status = [];
            $dataStart = Carbon::createFromFormat('Y-m-d H:i:s', '9999-01-01 00:00:01');
            $dataEnd = Carbon::createFromFormat('Y-m-d H:i:s', '1000-01-01 00:00:01');

            foreach ($value->Event as $agenda) {

                $dataAgendaStart = Carbon::createFromFormat('Y-m-d H:i:s', $agenda->start);
                $dataAgendaEnd = Carbon::createFromFormat('Y-m-d H:i:s', $agenda->end);

                if ($dataStart->greaterThanOrEqualTo($dataAgendaStart)) {
                    $dataStart = $dataAgendaStart;
                }

                if ($dataEnd->lessThanOrEqualTo($dataAgendaEnd)) {
                    $dataEnd = $dataAgendaEnd;
                }

                if (isset($agenda->manager)) {
                    $manager = $agenda->manager;
                }

                array_push($status, $agenda->status);
            };

            $dataStart = substr($dataStart, 0, 10);
            $dataEnd = substr($dataEnd, 0, 10);
            $statusAgendada = array_search(0, $status);
            $statusRealizada = array_search(1, $status);
            $statusCancelada = array_search(2, $status);
            $statusResultado = 'Aberta';

            if (
                (!is_integer($statusAgendada) && !is_integer($statusCancelada))
                ||
                (!is_integer($statusAgendada) && !is_integer($statusRealizada))
            ) {
                $statusResultado = 'Fechada';
            }

            if ($dataStart != "9999-01-01") {
                $viewTurmas[] = array(
                    "id" => $value->id,
                    "name" => $value->title,
                    "dataStart" => $dataStart,
                    "dataEnd" => $dataEnd,
                    "manager" => $manager,
                    "status" => $statusResultado,
                );
            }
        }

        return view('group.group', ['viewTurmas' => $viewTurmas]);
    }

    public function loadEvents(Request $request)
    {
        //Mostra datas agendadas no calendario
        $returnedColumns = ['id', 'title', 'start', 'end', 'color', 'description', 'status'];
        $start = (!empty($request->start)) ? ($request->start) : ('');
        $end = (!empty($request->end)) ? ($request->end) : ('');

        /**Retorna apenas agendas que estejam entre a data inicial e a final */

        $events = Event::whereBetween('start', [$start, $end])->get($returnedColumns);

        return response()->json($events);
    }

    public function store(EventRequest $request)
    {
        //
        if (empty($request->all())) {
            return false;
        }

        $start = Event::where('start', $request->start)
            ->orWhere('end', $request->start)
            ->first();

        $end = Event::where('end', $request->end)
            ->orWhere('start', $request->end)
            ->first();

        if ($start != null) {
            return response()->json(['negarstart' => 'A DATA INICIAL esta conflitando com outra data INICIAL Ou FINAL,
            Agendamento nao pode Começar ou Terminar na mesma Data/Hora']);
        }

        if ($end != null) {
            return response()->json(['negarend' => 'A DATA FINAL esta conflitando com outra data FINAL Ou INICIAL,
            Agendamento nao pode Começar ou Terminar na mesma Data/Hora']);
        }

        $ManagerEvent = fastEvent::where('id', $request->id)
            ->where('manager', $this->verifiIfTestinf())
            ->first();
        if ($ManagerEvent == null) {
            return response()->json(['negar' => 'Ação Negada, Apenas o Responśavel pode Alterar agenda']);
        }

        $data = new Event;
        $data->fast_events_id = $request->fast_events_id;
        $data->title = $request->title;
        $data->start = $request->start;
        $data->end = $request->end;
        $data->color = $request->color;
        $data->description = $request->description;
        $data->manager = $this->verifiIfTestinf();
        $data->save();

        return response()->json(true);
    }

    public function update(EventRequest $request)
    {
        //
        if (empty($request->all())) {
            return false;
        }
        $startX = $request->input('start');
        $endX = $request->input('end');

        $start = Event::where('id', '!=', $request->id)
            ->where(function ($query) use ($startX) {
                $query->where('start', $startX)
                    ->orWhere('end', $startX);
            })
            ->first();

        $end = Event::where('id', '!=', $request->id)
            ->where(function ($query) use ($endX) {
                $query->where('end', $endX)
                    ->orWhere('start', $endX);
            })
            ->first();

        if ($start != null) {
            return response()->json(['negarstart' => 'upd A DATA INICIAL esta conflitando com outra data INICIAL Ou FINAL,
            Agendamento nao pode Começar ou Terminar na mesma Data/Hora']);
        }

        if ($end != null) {
            return response()->json(['negarend' => 'upd A DATA FINAL esta conflitando com outra data FINAL Ou INICIAL,
            Agendamento nao pode Começar ou Terminar na mesma Data/Hora']);
        }

        $ManagerEvent = Event::where('id', $request->id)
            ->where('manager', $this->verifiIfTestinf())
            ->first();
        if ($ManagerEvent == null) {
            return response()->json(['negar' => 'Ação Negada, Apenas o Responśavel pode excluir agenda']);
        }

        $event = Event::where('id', $request->id)->first();
        $event->fill($request->all());
        $event->save();

        return response()->json(true);
    }

    public function destroy(Request $request)
    {
        //
        Event::findOrFail($request->id);

        $ManagerEvent = Event::where('id', $request->id)
            ->where('manager', $this->verifiIfTestinf())
            ->first();
        if ($ManagerEvent == null) {
            return response()->json(['negar' => 'Ação Negada, Apenas o Responśavel pode excluir agenda']);
        }
        Event::where('id', $request->id)->delete();

        return response()->json(true);
    }

    public function logout()
    {

        auth()->logout();

        return redirect('/event-list');
    }

    public function verifiIfTestinf()
    {
        if (env('APP_ENV') == 'testing') {
            return 'Possebon';
        } else {
            return Auth::user()->name;
        }
    }
}
