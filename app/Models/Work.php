<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $fillable = ['work_type_id', 'floor_id'];

    protected $hidden = ['created_at', 'updated_at'];

    public function floor()
    {
        return $this->belongsTo(Floor::class);
    }

    public function workType()
    {
        return $this->belongsTo(WorkType::class);
    }

    public function floorName()
    {
        return $this->hasOneThrough(
            FloorName::class,
            Floor::class,
            'id',
            'id',
            'floor_id',
            'floor_name_id'
        );
    }

    public function construction()
    {
        return $this->hasOneThrough(
            Construction::class,
            Floor::class,
            'id',
            'id',
            'floor_id',
            'construction_id'
        );
    }

    public function materials()
    {
        return $this->hasMany(MaterialExchange::class);
    }
}
