<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'start', 'constant_item_id', 'random_item_id'];
    public $timestamps = false;
    public function constantInventories(){
        return $this->hasMany(ConstantInventory::class);
    }
    public function randomInventories(){
        return $this->hasMany(RandomInventory::class);
    }
    public function players(){
        return $this->hasMany(Player::class);
    }
}
