<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatchController extends Controller
{
   

    public function getSpecificMatchDetails($matchId)
    {
        try {
            $response = Http::withoutVerifying()->get("https://sofascore.com/api/v1/event/" . $matchId);
            if ($response->successful() && !empty($response->body())) {
                return json_decode($response->body(), true);
            }
        } catch (Throwable $e) {
            // Handle the exception as needed
            return null;
        }
    }

    public function getMatchLineups($matchId)
    {
        try {
            $response = Http::withoutVerifying()->get("https://sofascore.com/api/v1/event/" . $matchId . "/lineups");
            if ($response->successful() && !empty($response->body())) {
                return json_decode($response->body(), true);
            }
        } catch (Throwable $e) {
            // Handle the exception as needed
            return null;
        }
    }

    public function getMatchInnings($matchId)
    {
        try {
            $response = Http::withoutVerifying()->get("https://sofascore.com/api/v1/event/" . $matchId . "/innings");
            if ($response->successful() && !empty($response->body())) {
                return json_decode($response->body(), true);
            }
        } catch (Throwable $e) {
            // Handle the exception as needed
            return null;
        }
    }

    public function getMatchH2H($matchId)
    {
        try {
            $response = Http::withoutVerifying()->get("https://sofascore.com/api/v1/event/" . $matchId . "/h2h");
            if ($response->successful() && !empty($response->body())) {
                return json_decode($response->body(), true);
            }
        } catch (Throwable $e) {
            // Handle the exception as needed
            return null;
        }
    }

    public function getFeaturedMatch()
    {
        try {
            // Fetch the featured match data from the SofaScore API
            $response = Http::withoutVerifying()->get("https://www.sofascore.com/api/v1/odds/1/featured-events-by-tiers/cricket");


                if ($response->successful() && !empty($response->body())) {
                    return json_decode($response->body(), true);
                }
            } catch (Throwable $e) {
                // Handle the exception as needed
                return null;
            }
          
        
    }
}
