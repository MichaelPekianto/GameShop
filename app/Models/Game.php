<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $fillable=['title','image','desc','price','genre','PEGI_rating'];
    public function getGenre(){
        return $this->belongsTo(GameGenre::class, 'genre', 'id');
    }
    public function getCart()
    {
        return $this->hasMany(Cart::class, 'game_id', 'id');
    }
    public function getTransactiondetail()
    {
        return $this->hasMany(TransactionDetail::class, 'game_id');
    }
}
