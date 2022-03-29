<?php

namespace App\Http\Controllers\API\Advocate;

use Illuminate\Http\Request;
use App\Http\Controllers\CrudController;

class ClientController extends CrudController
{
    public function setup()
    {
        $this->setModel('App\Models\Client');
    }

    public function exceptIndexColumns()
    {
        return ['updated_at'];
    }

    public function addClause($model, $request = null)
    {
        $model = $model->whereUserId(auth()->user()->id);
        return $model;
    }

    public function beforeSaving($data)
    {
        $data['user_id'] = auth()->user()->id;
        return $data;
    }
}
