<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialExchange extends Model
{
    use HasFactory;

    protected $fillable = ['supervisor_id','worker_id', 'work_id', 'duration'];

    protected $hidden = ['created_at','updated_at'];

    public function materialExchangeWorkers()
    {
        return $this->hasMany(MaterialExchangeWorker::class);
    }

    public function supervisor()
    {
        return $this->belongsTo(Supervisor::class);
    }

//    public function worker()
//    {
//        return $this->belongsTo(Worker::class);
//    }

    public function work()
    {
        return $this->belongsTo(Work::class);
    }
}
