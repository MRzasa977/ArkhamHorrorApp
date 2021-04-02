<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RandomInventory extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public $timestamps = false;
    function character() {
        return $this->belongsTo(Character::class);
    }
}
