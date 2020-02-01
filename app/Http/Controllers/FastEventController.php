<?php

namespace App\Http\Controllers;

use App\FastEvent;
use App\Http\Requests\FastEventRequest;
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
        fastEvent::create($request->all());

        return  response()->json(true);
    }

    public function update(FastEventRequest $request)
    {
        //
        $event = fastEvent::where('id', $request->id)->first();

        $event->fill($request->all());

        $event->save();

        return response()->json(true);
    }

    public function destroy(Request $request)
    {
        //
        fastEvent::where('id', $request->id)->delete();

        return  response()->json(true);

    }
}
