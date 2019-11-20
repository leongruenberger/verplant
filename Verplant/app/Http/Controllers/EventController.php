<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{

    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::latest()->paginate(5);

        return view('events.index',compact('events'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
       $user = Auth::user();
       $user->authorizeRoles(['admin', 'editor']);
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'ort' => 'required',
        ]);
        //$request['user_id'] = Auth::user()->user_id;
        
        Event::create($request->all());

        return redirect()->route('events.index')
                        ->with('success','Event created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('events.show',compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $user = Auth::user();
        $user->authorizeRoles(['admin', 'editor']);
        return view('events.edit',compact('event'));
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
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'ort' => 'required',
        ]);

        $event->update($request->all());

        return redirect()->route('events.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $user = Auth::user();
        $user->authorizeRoles(['admin']);
        $event->delete();

        return redirect()->route('events.index')
                        ->with('success','Event deleted successfully');
    }
}
