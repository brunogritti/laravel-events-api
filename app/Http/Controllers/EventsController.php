<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index()
    {
        try {
            $events = Event::all();

            return response()->json($events);

        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage(),
                'message' => "An error ocurred",
            ], 422);
        }
    }

    public function store(EventRequest $eventRequest)
    {
        try {

            return response()
                ->json(Event::create($eventRequest->all()), 201);

        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage(),
                'message' => "An error ocurred",
            ], 422);
        }
    }

    public function show(int $event)
    {
        try {

            $eventModel = Event::with('address', 'category')->find($event);

            if ($eventModel === null) {
                return response()->json(['message' => 'Event no found'], 404);
            }

            return response()->json($eventModel);

        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage(),
                'message' => "An error ocurred",
            ], 422);
        }
    }

    public function update(Event $event, EventRequest $eventRequest)
    {
        try {

            $event->fill($eventRequest->all());
            $event->save();

            return response()
                ->json($event);

        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage(),
                'message' => "An error ocurred",
            ], 422);
        }
    }

    public function destroy(int $event)
    {
        try {

            Event::destroy($event);
            
            return response()->noContent();

        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage(),
                'message' => "An error ocurred",
            ], 422);
        }
    }
}
