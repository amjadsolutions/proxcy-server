<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

class DailyMatchesController extends Controller
{
    public function getDailyMatches($date)
    {
        // Fetch data from external API
        $response = Http::get("https://www.sofascore.com/api/v1/sport/cricket/scheduled-events/{$date}");

        // Check if the response is successful
        if ($response->successful()) {
            return response()->json($response->json());
        }

        // Handle errors
        return response()->json(['error' => 'Unable to fetch data'], $response->status());
    }
}
