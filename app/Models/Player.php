<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    protected $fillable = [
    'character_id', 
    'sanity', 
    'stamina', 
    'speed',
    'sneak',
    'fight',
    'will',
    'lore',
    'luck',
    'game_room_id'
];
public $timestamps = false;
    public function character() {
        return $this->belongsTo(Character::class);
    }

    public function gameRoom(){
        return $this->belongsTo(GameRoom::class);
    }

}
