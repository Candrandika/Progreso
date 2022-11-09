<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Event, Note};
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function getEvents() {
        $events = Event::where('user_id', Auth::user()->id)->get();

        return response()->json([
            'events' => $events
        ], 200);
    }
    public function getDetails($id) {
        $event = Event::where('id', $id)->first();

        $notes = Note::where('event_id', $event->id)
                     ->orderBy('date', 'asc')
                     ->get();

        return response()->json([
            'event' => $event,
            'notes' => $notes
        ], 200);
    }
    public function getEvent() {
        $user = Auth::user()->id;

        $event = Event::where('user_id', $user)
                      ->count();
        $eventProgress = Event::where('user_id', $user)
                      ->where('progress','<',100)
                      ->count();
        $eventDone = Event::where('user_id', $user)
                      ->where('progress',100)
                      ->count();        

        return response()->json([
            'event' => $event,
            'eventDone' => $eventDone,
            'eventProgress' => $eventProgress,
        ], 200);
    }
    public function addEvent(Request $request) {
        $event = Event::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
        ]);

        return response()->json([
            'id' => $event->id
        ]);

        return response()->json([
            'id' => $event->id
        ]);
    }
    public function addImage(Request $request, $id) {
        $image = $request->file('image');
        $imageName = time().'.'.$image->extension();
        $imageLoc = '/assets/media/event/';
        $imageNames = $imageLoc.$imageName;

        $image->move(public_path($imageLoc), $imageName);

        Event::where('id', $id)->update([
            'image' => $imageNames
        ]);

        return response()->json([
            'image' => $imageNames
        ]);
    }
    public function delEvent($id) {
        Event::where('id', $id)->delete();
        Note::where('event_id', $id)->delete();

        return response()->json([
            'alert' => 'data berhasil dihapus'
        ]);
    }
    public function updateProgress(Request $request, $id) {
        $event = Event::where('id', $id)->first();

        $event->update([
            'progress' => $request->progress
        ]);

        return response()->json([
            'alert' => 'progress telah diupdate menjadi '.$request->progress.'%'
        ]);
    }
    public function addNote(Request $request, $id) {
        Note::create([
            'note' => $request->note,
            'date' => $request->date,
            'event_id' => $id
        ]);

        return response()->json([
            'alert' => 'catatan berhasil ditambahkan'
        ]);
    }
    
}
