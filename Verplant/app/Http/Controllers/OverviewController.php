<?php

namespace App\Http\Controllers;
use App\Event;
use Illuminate\Http\Request;

class OverviewController extends Controller
{
    public function overview()
    {
        $events = Event::latest()->paginate(5);

        return view('events.overview',compact('events'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
