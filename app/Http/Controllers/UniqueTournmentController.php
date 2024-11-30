<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class UniqueTournmentController extends Controller
{
    public function getSeasons($leagueId)
    {

        $response = Http::withoutVerifying()->get("https://sofascore.com/api/v1/unique-tournament/" . $leagueId . "/seasons");
        // Fetch data from external API
        // Check if the response is successful
        if ($response->successful()) {
            return response()->json($response->json());
        }
        // Handle errors
        return response()->json(['error' => 'Unable to fetch data'], $response->status());
    }

    public function getSeasonNextMatches($leagueId, $seasonId)
    {
        // If data does not exist in Redis, fetch from API
        $response = Http::withoutVerifying()->get("https://www.sofascore.com/api/v1/unique-tournament/" . $leagueId . "/season/" . $seasonId . "/events/next/0");

        // Check if the response is successful
        if ($response->successful()) {
            return response()->json($response->json());
        }
        // Handle errors
        return response()->json(['error' => 'Unable to fetch data'], $response->status());
    }

    public function getSeasonPreviousMatches($leagueId, $seasonId)
    {
        // If data does not exist in Redis, fetch from API
        $response = Http::withoutVerifying()->get("https://www.sofascore.com/api/v1/unique-tournament/" . $leagueId . "/season/" . $seasonId . "/events/last/0");

        // Check if the response is successful
        if ($response->successful()) {
            return response()->json($response->json());
        }
        // Handle errors
        return response()->json(['error' => 'Unable to fetch data'], $response->status());
    }

    public function getSeasonStandings($leagueId, $seasonId)
    {

        // If data does not exist in Redis, fetch from API
        $response = Http::withoutVerifying()->get("https://sofascore.com/api/v1/unique-tournament/" . $leagueId . "/season/" . $seasonId . "/standings/total");
        // Check if the response is successful
        if ($response->successful()) {
            return response()->json($response->json());
        }
        // Handle errors
        return response()->json(['error' => 'Unable to fetch data'], $response->status());

    }

    public function getSeasonPlayerStats($leagueId, $seasonId)
    {

        // If data does not exist in Redis, fetch from API
        $response = Http::withoutVerifying()->get("https://www.sofascore.com/api/v1/unique-tournament/" . $leagueId . "/season/" . $seasonId . "/top-players/overall");

        // Check if the response is successful
        if ($response->successful()) {
            return response()->json($response->json());
        }
        // Handle errors
        return response()->json(['error' => 'Unable to fetch data'], $response->status());

    }

    public function topLeagueDetails($leagueId)
    {

        // Fetch data from the API if not found in Redis
        $response = Http::withoutVerifying()->get("https://sofascore.com/api/v1/unique-tournament/" . $leagueId);
        // Check if the response is successful
        if ($response->successful()) {
            return response()->json($response->json());
        }
        // Handle errors
        return response()->json(['error' => 'Unable to fetch data'], $response->status());

    }

    public function getLeagueContents($leagueId)
    {

        // Fetch data from the API if not found in Redis
        $response = Http::withoutVerifying()->get("https://sofascore.com/api/v1/seo/content/unique-tournament/" . $leagueId . "/en");
        // Check if the response is successful
        if ($response->successful()) {
            return response()->json($response->json());
        }
        // Handle errors
        return response()->json(['error' => 'Unable to fetch data'], $response->status());
    }

    public function getFeaturedMatch($leagueId)
    {

        // If data does not exist in Redis, fetch from API
        $response = Http::withoutVerifying()->get("https://www.sofascore.com/api/v1/unique-tournament/" . $leagueId . "/featured-events");
        // Check if the response is successful
        if ($response->successful()) {
            return response()->json($response->json());
        }
        // Handle errors
        return response()->json(['error' => 'Unable to fetch data'], $response->status());

    }

    public function getSeasonInfo($leagueId, $seasonId)
    {

        // If data does not exist in Redis, fetch from API
        $response = Http::withoutVerifying()->get("https://www.sofascore.com/api/v1/unique-tournament/" . $leagueId . "/season/" . $seasonId . "/info");
        // Check if the response is successful
        if ($response->successful()) {
            return response()->json($response->json());
        }
        // Handle errors
        return response()->json(['error' => 'Unable to fetch data'], $response->status());

    }


   
}
