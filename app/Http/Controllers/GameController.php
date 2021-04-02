<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\GameRoom;
use App\Models\Player;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function gameRooms(Request $request) {
        return GameRoom::all();
    }

    public function players(Request $request, $gameRoomId) {
        return Player::where('game_room_id', $gameRoomId)
        ->get();
    }

    public function updatePlayer(Request $request, $gameRoomId, $playerId) {
        $player = Player::find($playerId);

    }

    public function newPlayer(Request $request, $gameRoomId, $characterId) {
        $newPlayer = new Player;
        $newPlayer->gameRoom()->associate($gameRoomId);
        $character = Character::find($characterId);
        $newPlayer->sanity = $character->sanity;
        $newPlayer->stamina = $character->stamina;
        $newPlayer->save();
        $newPlayer = $newPlayer->fresh();

        return $newPlayer;
    }
}
