<?php

namespace App\Http\Controllers\API\Applicant;

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
        $model = $model->whereApplicantId(auth()->user()->id)->with(['advocate' => function ($query) {
                    $query->select('id', 'name');
                }]);
        return $model;
    }
}
