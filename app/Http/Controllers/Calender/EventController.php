<?php

namespace App\Http\Controllers\Calender;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index(Request $request) {

        if ($request->ajax()) {
            $data = Event::whereDate('start_date', '>=', $request->start)
                         ->whereDate('end_date', '<=', $request->end)
                         ->get(['id', 'title', 'start_date as start', 'end_date as end']); // Aliased start_date and end_date to start and end.
    
            return response()->json($data);
        }

        return view('Calender.calender');
    }

    public function ajax(Request $request)
    {
 
        switch ($request->type) {
           case 'add':
              $event = Event::create([
                  'title' => $request->title,
                  'start_date' => $request->start_date,
                  'end_date' => $request->end_date,
              ]);
 
              return response()->json([
                'id' => $event->id,
                'title' => $event->title,
                'start_date' => $event->start_date,
                'end_date' => $event->end_date,
            ]);             
            break;
  
           case 'update':
              $event = Event::find($request->id)->update([
                  'title' => $request->title,
                  'start_date' => $request->start_date,
                  'end_date' => $request->end_date,
              ]);
 
              return response()->json($event);
             break;
  
           case 'delete':
              $event = Event::find($request->id)->delete();
  
              return response()->json($event);
             break;
             
           default:
             # code...
             break;
        }
    }
}
