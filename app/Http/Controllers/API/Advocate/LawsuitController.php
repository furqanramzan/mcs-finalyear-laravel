<?php

namespace App\Http\Controllers\API\Advocate;

use Illuminate\Http\Request;
use App\Http\Controllers\CrudController;

class LawsuitController extends CrudController
{
    public function setup()
    {
        $this->setModel('App\Models\Lawsuit');
    }

    public function exceptIndexColumns()
    {
        return ['updated_at'];
    }

    public function setShowColumns()
    {
        return ['id', 'case_no', 'total_payment', 'received_payment'];
    }

    public function addClause($model, $request = null)
    {
        $model = $model->whereUserId(auth()->user()->id)
                    ->with(['case_type' => function ($query) {
                        $query->select('id', 'name');
                    }, 'client' => function ($query) {
                        $query->select('id', 'name');
                    }]);
        return $model;
    }

    public function beforeSaving($data)
    {
        $data['user_id'] = auth()->user()->id;
        return $data;
    }

    public function afterSaving($item)
    {
        return $item->load(['case_type' => function ($query) {
                    $query->select('id', 'name');
                }, 'client' => function ($query) {
                    $query->select('id', 'name');
                }]);
    }
}
