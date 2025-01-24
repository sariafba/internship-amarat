<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialExchangeWorker extends Model
{
    use HasFactory;

    protected $fillable = ['material_exchange_id', 'worker_id', 'duration'];

    public function worker()
    {
        return $this->belongsTo(Worker::class, 'worker_id');
    }
}
