<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Supervisor extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = ['name', 'username', 'password'];
    protected $casts = [
        'password' => 'hashed'
    ];

    public function materials()
    {
        return $this->hasMany(MaterialExchange::class);
    }

    public function materialExchangeWorkers()
    {
        return $this->hasManyThrough(
            MaterialExchangeWorker::class,
            MaterialExchange::class
        );
    }
}
