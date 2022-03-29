<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advocate extends Model
{
    protected $fillable = ['user_id', 'city', 'fees', 'speciality', 'avatar'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
