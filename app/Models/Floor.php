<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    use HasFactory;

    protected $fillable = ['floor_name_id', 'construction_id'];

    public function floor_name()
    {
        return $this->belongsTo(FloorName::class);
    }


    public function construction()
    {
        return $this->belongsTo(Construction::class);
    }
}