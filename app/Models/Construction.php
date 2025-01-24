<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Construction extends Model
{
    use HasFactory;

    protected $fillable = ['piece_id' , 'name'];

    protected $hidden = ['piece_id', 'created_at', 'updated_at'];

    public function piece()
    {
        return $this->belongsTo(Piece::class);
    }

    public function floors()
    {
        return $this->hasMany(Floor::class);
    }

    public function floorsName()
    {
        return $this
            ->belongsToMany(
                FloorName::class,
                'floors',
                'construction_id',
                'floor_name_id',
            )->withPivot('id');
    }
}
