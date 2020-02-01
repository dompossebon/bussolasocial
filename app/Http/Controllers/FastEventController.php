<?php

namespace App\Http\Controllers;

use App\Event;
use App\FastEvent;
use App\Http\Requests\FastEventRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class FastEventController extends Controller
{
    //
    public function viewcalendar()
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

        if ($validator->fails())
        {
            return response()->json(['negarstart' => 'Existe Outra Turma com o mesmo nome,
            Escolha outro Nome']);
        }
        fastEvent::create($request->all());

        return response()->json(true);
    }

    public function update(FastEventRequest $request)
    {
        //
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
        $fastEvent =
        $deleteFE = fastEvent::find($request->id)->delete();

        return response()->json(true);

    }
}
