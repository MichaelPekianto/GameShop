<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    public function getTransactiondetail()
    {
        return $this->hasMany(TransactionDetail::class, 'transaction_id');
    }
    public function getUser(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
