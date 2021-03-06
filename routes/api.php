<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SecretController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\TopicsController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TopicController;

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

Route::get('/secrets', [SecretController::class, 'index']);

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResources([
    'teams' => TeamsController::class,
    // 'topics' => TopicsController::class,
]);

Route::resource('team', TeamController::class)
    ->scoped(['team' => 'slug']);

Route::resource('topics', TopicsController::class)
    ->parameters(['team_id' => 'slug']);

Route::resource('topic', TopicController::class)
    ->parameters(['topic_id' => 'slug']);

// Route::apiResource('profile', )
