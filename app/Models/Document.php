<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['lawsuit_id', 'name', 'file', 'extension'];

    public function lawsuit()
    {
    	return $this->belongsTo(Lawsuit::class);
    }
}
