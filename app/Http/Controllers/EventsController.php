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
                'error' => $e->getMessage(),
                'message' => "An error ocurred",
            ], 422);
        }
    }

    public function store(EventRequest $eventRequest)
    {
        try {
            $events = Event::all();

            return response()->json($events);

        } catch (\Throwable $th) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => "An error ocurred",
            ], 422);
        }
    }
}
