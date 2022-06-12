<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'DOB',
        'image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',

    ];
    public function setBirthDateAttribute($value){
        $this->attributes['DOB']= Carbon::createFromFormat('m/d/Y',$value)->format('Y-m-d');
    }
    public function getBirthDateAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['DOB'])->format('m/d/Y');
    }
    public function getTransaction(){

        return $this->hasMany(Transaction::class, 'user_id', 'id');
    }
}
