<?php

namespace App\Http\Controllers\API\Applicant;

use Illuminate\Http\Request;
use App\Http\Controllers\CrudController;
use App\Models\Appointment;

class AdvocateController extends CrudController
{
    public function setup()
    {
        $this->setModel('App\Models\User');
    }

    public function setIndexColumns()
    {
        return ['id', 'name'];
    }

    public function addClause($model, $request = null)
    {
        $model = $model->with('advocate')->has('advocate');
        return $model;
    }

    public function store(Request $request)
    {
        $data['purpose'] = $request->purpose;
        $data['advocate_id'] = $request->user_id;
        $data['applicant_id'] = auth()->user()->id;
        $data['status'] = 'Pending';
        $appointment = Appointment::create($data);
        return 'true';
    }
}
