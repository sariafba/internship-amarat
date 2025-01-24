<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $hidden = ['created_at','updated_at'];

    public function worker_hours()
    {
        return $this->hasMany(WorkerHour::class);
    }

    public function materials()
    {
        return $this->hasMany(MaterialExchange::class);
    }

    public function materialExchangeWorker()
    {
        return $this->hasMany(MaterialExchangeWorker::class);
    }
}
