<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests\EventRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{

    public function listEvents()
    {
        //
        $group = Event::all();

//        return $group;
        return view('group.group')->with('group', $group);
    }

    public function loadEvents(Request $request)
    {
        //
        $returnedColumns = ['id', 'title', 'start', 'end', 'color', 'description'];

        $start = (!empty($request->start)) ? ($request->start) : ('');
        $end = (!empty($request->end)) ? ($request->end) : ('');

        /**Retorna apenas agendas que estejam entre a data inicial e a final */

        $events = Event::whereBetween('start', [$start, $end])->get($returnedColumns);

//        $events = Event::all();
        return response()->json($events);
    }

    public function store(EventRequest $request)
    {
        //

//        $startX = $request->input('start');
//        $endX = $request->input('end');

        $start = Event::where('start', $request->input('start'))
            ->orWhere('end', $request->input('start'))
            ->first();
        $end = Event::where('end', $request->input('end'))
            ->orWhere('start', $request->input('end'))
            ->first();

//        $between = Event::whereBetween('reservation_from', [$startX, $endX])->get();

//        if ($between != null) {
//            return response()->json(['between' => 'Conflito']);
//        }

        if ($start != null) {
            return response()->json(['negarstart' => 'A DATA INICIAL esta conflitando com outra data INICIAL Ou FINAL,
            Agendamento nao pode Começar ou Terminar na mesma Data/Hora']);
        }

        if ($end != null) {
            return response()->json(['negarend' => 'A DATA FINAL esta conflitando com outra data FINAL Ou INICIAL,
            Agendamento nao pode Começar ou Terminar na mesma Data/Hora']);
        }

        $data = new Event;
        $data->title = $request->input('title');
        $data->start = $request->input('start');
        $data->end = $request->input('end');
        $data->color = $request->input('color');
        $data->description = $request->input('description');
        $data->manager = Auth::user()->name;
        $data->save();

        return response()->json(true);
    }

    public function update(EventRequest $request)
    {
        //

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

        $event = Event::where('id', $request->id)->first();

        $event->fill($request->all());

        $event->save();

        return response()->json(true);
    }

    public function destroy(Request $request)
    {
        //
        Event::where('id', $request->id)->delete();

        return response()->json(true);
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/event-list');
    }
}
