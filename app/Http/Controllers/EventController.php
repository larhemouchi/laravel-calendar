<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return $this->eventsToArray(Event::all());
    }

    public function eventsToArray($events)
    {
        $eventsArray = [];
        foreach ($events as $event) {
            $data = [
                "title" => $event->title,
                "nom_service" => $event->nom_service,
                "start" => $event->start_date,
                "end" => $event->end_date,
                "textColor" => "white"
            ];
            array_push($eventsArray, $data);
        }
        return response()->json($eventsArray);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Event::create([
            "title" => $request->title,
            //  "nom_service" => $request->nom_service,
            "start_date" => $request->start,
            "end_date" => $request->end
        ]);
        return response()->json(['success' => 'added']);
        //return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {

        //return response('return response');

        $garde_id = request('garde_id');

        $garde = Event::where(['title' => $garde_id])->get()->first();

        return response()->json($garde);

        //return view('show')->withEvent($event);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
        $event->update([
            "start_date" => $request->start,
            "end_date" => $request->end
        ]);
        return response()->json(['success' => 'updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */


    public function remove($id)
    {
        $event = Event::where(['title' => $id])->get()->first();

        $event->delete();

        return response()->json(['success' => 'deleted']);
    }
    /*
    public function destroy(Event $event)
    {
        //
        $event->delete();

        return response()->json(['success' => 'deleted']);
    }*/
}