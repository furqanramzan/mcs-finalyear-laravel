<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lawsuit extends Model
{
    protected $fillable = ['user_id', 'client_id', 'case_type_id', 'court_no', 'case_no', 'address', 'total_payment', 'received_payment'];

    public function client()
    {
    	return $this->belongsTo(Client::class);
    }

    public function case_type()
    {
    	return $this->belongsTo(CaseType::class);
    }

    public function payments()
    {
    	return $this->hasMany(Payment::class);
    }
}
