<?php

namespace App\Http\Controllers;

use App\Event;
use App\FastEvent;
use App\Http\Requests\FastEventRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class FastEventController extends Controller
{
    //
    public function viewCalendar()
    {
        //
        $fastEvents = FastEvent::all();

        return view('group.calendar', ['fastEvents' => $fastEvents]);
    }

    public function store(FastEventRequest $request)
    {
        //
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|unique:fast_events',
            ]);

        if ($validator->fails()) {
            return response()->json(['negarstart' => 'Existe Outra Turma com o mesmo nome,
            Escolha outro Nome']);
        }
        $data = new fastEvent;
        $data->title = $request->input('title');
        $data->start = $request->input('start');
        $data->end = $request->input('end');
        $data->color = $request->input('color');
        $data->manager = $this->verifiIfTestinf();
        $data->save();

        return response()->json(true);
    }

    public function update(FastEventRequest $request)
    {
        //
        $fastManagerEvent = fastEvent::where('id', $request->id)
            ->where('manager', $this->verifiIfTestinf())
            ->first();
        if ($fastManagerEvent == null) {
            return response()->json(['negar' => 'Ação Negada, Apenas o Responśavel pode Alterar agenda']);
        }

        $fEvent = fastEvent::where('id', $request->id)->first();
        $fEvent->fill($request->all());
        $fEvent->save();

        Event::where('fast_events_id', $request->id)
            ->update(['title' => $request->title,
                'color' => $request->color]);

        return response()->json(true);
    }

    public function destroy(Request $request)
    {
        //
        fastEvent::findOrFail($request->id);

        $ManagerEvent = fastEvent::where('id', $request->id)
            ->where('manager', $this->verifiIfTestinf())
            ->first();
        if ($ManagerEvent == null) {
            return response()->json(['negar' => 'Ação Negada, Apenas o Responśavel pode Alterar agenda']);
        }

        fastEvent::find($request->id)->delete();

        return response()->json(true);
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
