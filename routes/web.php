<?php

use App\Http\Controllers\CharacterController;
use App\Http\Controllers\GameController;
use App\Models\Character;
use App\Models\GameRoom;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::resource('character', CharacterController::class);
Route::middleware(['auth:sanctum', 'verified'])->get('/chat', function() {
    return Inertia::render('Game/container');
})->name('chat');

Route::get('/chat/gamerooms', [GameController::class, 'gameRooms']);
Route::get('/chat/gamerooms/{gameRoomID}/characters', [CharacterController::class, 'show']);
Route::post('/chat/gamerooms/{gameRoomID}/characters/{characterID}/newPlayer', [GameController::class, 'newPlayer']);
Route::get('/chat/gamerooms/{gameroomID}/players', [GameController::class, 'players']);