<?php

namespace App\Http\Controllers;

use App\Models\ContestEntry;
use Illuminate\Http\Request;
use App\Events\NewEntryReceivedEvent;

class ContestEntryController extends Controller
{
    public function store(Request $request) 
    {
        $data = $request->validate([
          'email'  => 'required|email',
        ]);

        $contestEntry = ContestEntry::create($data);

        // Facade method
        // event(NewEntryReceived::class);

        // Without Facade -> Can be moved to ContestEntry Model (Example in the model)
        NewEntryReceivedEvent::dispatch($contestEntry);
    }
}
