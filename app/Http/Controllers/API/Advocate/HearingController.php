<?php

namespace App\Http\Controllers\API\Advocate;

use Illuminate\Http\Request;
use App\Http\Controllers\CrudController;
use Storage;

class HearingController extends CrudController
{
    public function setup()
    {
        $this->setModel('App\Models\Hearing');
    }

    public function exceptIndexColumns()
    {
        return ['updated_at'];
    }

    public function addClause($model, $request = null)
    {
        $model = $model->where('date', $request->date);
        return $model;
    }
}
