<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ImagesController extends Controller
{

    public function getTeamImages($id)
    {
        try {
            // Use your proxy server to fetch the image
            $response = Http::withoutVerifying()->get("https://api.sofascore.app/api/v1/team/" . $id . "/image");
    
            // Validate response
            if ($response->failed()) {
                return response()->json(['error' => 'Unable to fetch the image'], 500);
            }
    
            // Retrieve the image content
            $imageBody = $response->body();
            $contentType = $response->header('Content-Type'); // Get the content type from the response headers
    
            // Return the image with proper headers
            return response($imageBody, 200)
                ->header('Content-Type', $contentType);
        } catch (\Exception $e) {
            // Handle exceptions
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }


    public function getPlayerImages($id)
    {
        try {
            // Use your proxy server to fetch the image
            $response = Http::withoutVerifying()->get("https://api.sofascore.app/api/v1/player/" . $id . "/image");
    
            // Validate response
            if ($response->failed()) {
                return response()->json(['error' => 'Unable to fetch the image'], 500);
            }
    
            // Retrieve the image content
            $imageBody = $response->body();
            $contentType = $response->header('Content-Type'); // Get the content type from the response headers
    
            // Return the image with proper headers
            return response($imageBody, 200)
                ->header('Content-Type', $contentType);
        } catch (\Exception $e) {
            // Handle exceptions
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }


    public function getLeagueImages($id)
    {
        try {
            // Use your proxy server to fetch the image
            $response = Http::withoutVerifying()->get("https://api.sofascore.app/api/v1/unique-tournament/" . $id . "/image");
    
            // Validate response
            if ($response->failed()) {
                return response()->json(['error' => 'Unable to fetch the image'], 500);
            }
    
            // Retrieve the image content
            $imageBody = $response->body();
            $contentType = $response->header('Content-Type'); // Get the content type from the response headers
    
            // Return the image with proper headers
            return response($imageBody, 200)
                ->header('Content-Type', $contentType);
        } catch (\Exception $e) {
            // Handle exceptions
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }
    
   
}
