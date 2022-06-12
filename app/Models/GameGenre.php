<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameGenre extends Model
{
    use HasFactory;
    public function getGame()
    {
        return $this->hasMany(Game::class, 'genre');
    }
}
