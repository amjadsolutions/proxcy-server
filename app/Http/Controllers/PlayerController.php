<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PlayerController extends Controller
{

    public function getPlayerDetails($playerId)
    {

        $response = Http::withoutVerifying()->get("https://sofascore.com/api/v1/player/" . $playerId);
        if ($response->successful()) {
            return response()->json($response->json());
        }
        // Handle errors
        return response()->json(['error' => 'Unable to fetch data'], $response->status());

    }





    public function getPlayerContents($playerId)
    {
        $response = Http::withoutVerifying()->get("https://sofascore.com/api/v1/seo/content/player/" . $playerId . "/en");
        if ($response->successful()) {
            return response()->json($response->json());
        }
        // Handle errors
        return response()->json(['error' => 'Unable to fetch data'], $response->status());

    }



   
    
      
}
