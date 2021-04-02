<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConstantInventory extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public $timestamps = false;
    public function character(){
        return $this->belongsTo(Character::class);
    }
}
