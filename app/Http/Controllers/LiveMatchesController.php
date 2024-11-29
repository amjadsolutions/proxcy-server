<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LiveMatchesController extends Controller
{


    public function getLiveMatches()
    {
        // Fetch data from external API
        $response = Http::withoutVerifying()->get("https://sofascore.com/api/v1/sport/cricket/events/live");

        // Check if the response is successful
        if ($response->successful()) {
            return response()->json($response->json());
        }

        // Handle errors
        return response()->json(['error' => 'Unable to fetch data'], $response->status());
    }
    
}
