<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    public $fillable =['quantity', 'game_id',  'user_id', 'transaction_id'];
    public function getGame()
    {
        return $this->belongsTo(Game::class, 'game_id', 'id');
    }
    public function getTransaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }
}
