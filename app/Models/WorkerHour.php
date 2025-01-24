<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkerHour extends Model
{
    use HasFactory;

    protected $fillable = ['worker_id', 'date'];

    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }
}