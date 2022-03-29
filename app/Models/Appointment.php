<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = ['applicant_id', 'advocate_id', 'purpose', 'status', 'date', 'time'];

    public function applicant()
    {
    	return $this->belongsTo(User::class, 'applicant_id');
    }

    public function advocate()
    {
    	return $this->belongsTo(User::class, 'advocate_id');
    }
}
