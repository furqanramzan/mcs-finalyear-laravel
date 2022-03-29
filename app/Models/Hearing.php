<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hearing extends Model
{
    protected $fillable = ['lawsuit_id', 'date', 'time'];

    public function lawsuit()
    {
    	return $this->belongsTo(Lawsuit::class);
    }
}
