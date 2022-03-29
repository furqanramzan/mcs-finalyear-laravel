<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['lawsuit_id', 'received'];

    public function lawsuit()
    {
    	return $this->belongsTo(Lawsuit::class);
    }
}
