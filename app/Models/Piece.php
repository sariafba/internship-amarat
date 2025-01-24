<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piece extends Model
{
    use HasFactory;

    protected $fillable = ['pattern_id', 'name'];

    protected $hidden = ['pattern_id', 'created_at', 'updated_at'];

    public function pattern()
    {
        return $this->belongsTo(Pattern::class);
    }

    public function constructions()
    {
        return $this->hasMany(Construction::class);
    }
}
