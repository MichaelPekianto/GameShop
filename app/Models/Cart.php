<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public $fillable=['quantity', 'game_id', 'user_id'];
    public function getGame()
    {
        return $this->belongsTo(Game::class, 'game_id');
    }
}
