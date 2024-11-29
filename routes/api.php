<?php

use App\Http\Controllers\DailyMatchesController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UniqueTournmentController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\PlayerController;
use Illuminate\Http\Request; // Import the controller

use Illuminate\Support\Facades\Route;

// Import the controller

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {

    // matches endpoint
    Route::get('/sport/cricket/scheduled-events/{date}', [DailyMatchesController::class, 'getDailyMatches']);

    // league endpoints
    Route::get('/unique-tournament/{leagueId}/season/{seasonId}/info', [UniqueTournmentController::class, 'getSeasonInfo']);
    Route::get('/unique-tournament/{leagueId}/featured-events', [UniqueTournmentController::class, 'getFeaturedMatch']);
    Route::get('/seo/content/unique-tournament/{leagueId}/en");', [UniqueTournmentController::class, 'getLeagueContents']);
    Route::get('/unique-tournament/{leagueId}/season/{seasonId}/top-players/overall"', [UniqueTournmentController::class, 'getSeasonPlayerStats']);
    Route::get('/unique-tournament/{leagueId}', [UniqueTournmentController::class, 'topLeagueDetails']);
    Route::get('/unique-tournament/{leagueId}/season/seasonId/standings/total', [UniqueTournmentController::class, 'getSeasonStandings']);
    Route::get('/unique-tournament/{leagueId}/season/{seasonId}/events/last/0', [UniqueTournmentController::class, 'getSeasonPreviousMatches']);
    Route::get('/unique-tournament/{leagueId}/season/{seasonId}/events/next/0', [UniqueTournmentController::class, 'getSeasonNextMatches']);
    Route::get('/unique-tournament/{leagueId}/seasons', [UniqueTournmentController::class, 'getSeasons']);

    // teams endpoints

    Route::get('/team/{teamId}"', [TeamController::class, 'fetchAndStoreTeamDetails']);
    Route::get('/team/{teamId}/events/last/0', [TeamController::class, 'getTeamPastMatches']);
    Route::get('/team/{teamId}/events/next/0', [TeamController::class, 'getTeamNextMatches']);
    Route::get('/team/{teamId}/players', [TeamController::class, 'getTeamSquad']);
    Route::get('/team/{seasonId}/standings/seasons', [TeamController::class, 'getTeamStandings']);
    Route::get('/team/{teamId}/events/last/0', [TeamController::class, 'teamPreviousH2H']);
    Route::get('/event/{customId}/h2h/events', [TeamController::class, 'getTeamMatchH2H']);
    Route::get('/seo/content/team/{teamId}/en', [TeamController::class, 'teamContents']);

    // matches endpoints

    Route::get('/event/{matchId}', [TeamController::class, 'getSpecificMatchDetails']);
    Route::get('/event/{matchId}/lineups', [TeamController::class, 'getMatchLineups']);
    Route::get('/event/{matchId}/innings', [TeamController::class, 'getMatchInnings']);
    Route::get('/event/{matchId}/h2h', [TeamController::class, 'getMatchH2H']);
    Route::get('/odds/1/featured-events-by-tiers/cricket', [TeamController::class, 'getFeaturedMatch']);



    Route::get('/team/{teamId}/image', [ImagesController::class, 'getTeamImages']);
    Route::get('/player/{playerId}/image', [ImagesController::class, 'getPlayerImages']);
    Route::get('/unique-tournament/{leagueId}/image', [ImagesController::class, 'getLeagueImages']);



    // player Image


    Route::get('/seo/content/player/{playerId}/en', [PlayerController::class, 'getPlayerContents']);
       

 

});
