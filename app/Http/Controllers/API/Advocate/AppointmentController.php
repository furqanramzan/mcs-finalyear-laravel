<?php

namespace App\Http\Controllers\API\Advocate;

use Illuminate\Http\Request;
use App\Http\Controllers\CrudController;

class AppointmentController extends CrudController
{
    public function setup()
    {
        $this->setModel('App\Models\Appointment');
    }

    public function exceptIndexColumns()
    {
        return ['updated_at'];
    }

    public function addClause($model, $request = null)
    {
        $model = $model->whereAdvocateId(auth()->user()->id)->with(['applicant' => function ($query) {
                    $query->select('id', 'name');
                }]);
        return $model;
    }

    public function beforeSaving($data)
    {
        if($data['date'] && $data['time'])
            $data['status'] = 'Approved';
        else
            $data['status'] = 'Rejected';
        return $data;
    }
}
