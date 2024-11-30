<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

class TeamController extends Controller
{
    public function fetchAndStoreTeamDetails($teamId)
    {

        $response = Http::withoutVerifying()->get("https://sofascore.com/api/v1/team/" . $teamId);
        // Fetch data from external API
        // Check if the response is successful
        if ($response->successful()) {
            return response()->json($response->json());
        }
        // Handle errors
        return response()->json(['error' => 'Unable to fetch data'], $response->status());
    }

    public function getTeamPastMatches($teamId)
    {

        // If data does not exist in Redis, fetch from API
        $response = Http::withoutVerifying()->get("https://www.sofascore.com/api/v1/team/" . $teamId . "/events/last/0");
        // Check if the response is successful
        if ($response->successful()) {
            return response()->json($response->json());
        }
        // Handle errors
        return response()->json(['error' => 'Unable to fetch data'], $response->status());

    }

    public function getTeamNextMatches($leagueId, $seasonId)
    {
        // If data does not exist in Redis, fetch from API
        $response = Http::withoutVerifying()->get("https://www.sofascore.com/api/v1/team/" . $teamId . "/events/next/0");
        if ($response->successful()) {
            return response()->json($response->json());
        }
        // Handle errors
        return response()->json(['error' => 'Unable to fetch data'], $response->status());

    }

    public function getTeamSquad($teamId)
    {
      
// dd('Amjad');
        $response = Http::withoutVerifying()->get("https://sofascore.com/api/v1/team/" . $teamId . "/players");
         
        if ($response->successful()) {
            return response()->json($response->json());
        }
        // Handle errors
        return response()->json(['error' => 'Unable to fetch data'], $response->status());

    }

    public function getTeamStandings($seasonId)
    {

        $response = Http::withoutVerifying()->get("https://www.sofascore.com/api/v1/team/" . $seasonId . "/standings/seasons");
        if ($response->successful()) {
            return response()->json($response->json());
        }
        // Handle errors
        return response()->json(['error' => 'Unable to fetch data'], $response->status());

    }

    public function getTeamMatchH2H($customId)
    {

        $response = Http::withoutVerifying()->get("https://www.sofascore.com/api/v1/event/" . $customId . "/h2h/events");
        if ($response->successful()) {
            return response()->json($response->json());
        }
        // Handle errors
        return response()->json(['error' => 'Unable to fetch data'], $response->status());

    }

    public function teamPreviousH2H($teamId)
    {
        $response = Http::withoutVerifying()->get("https://www.sofascore.com/api/v1/team/{$teamId}/events/last/0");

        if ($response->successful()) {
            return response()->json($response->json());
        }
        // Handle errors
        return response()->json(['error' => 'Unable to fetch data'], $response->status());

    }


    public function teamContents($teamId)
    {
        $responseContents = Http::withoutVerifying()->get("https://sofascore.com/api/v1/seo/content/team/" . $teamId . "/en");

        if ($response->successful()) {
            return response()->json($response->json());
        }
        // Handle errors
        return response()->json(['error' => 'Unable to fetch data'], $response->status());

    }




}
