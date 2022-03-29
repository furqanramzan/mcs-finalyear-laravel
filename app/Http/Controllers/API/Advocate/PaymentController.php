<?php

namespace App\Http\Controllers\API\Advocate;

use Illuminate\Http\Request;
use App\Http\Controllers\CrudController;

class PaymentController extends CrudController
{
    public function setup()
    {
        $this->setModel('App\Models\Payment');
    }

    public function exceptIndexColumns()
    {
        return ['updated_at'];
    }

    public function afterSaving($item)
    {
        $item->load(['lawsuit' => function ($query) {
                    $query->select('id', 'total_payment', 'received_payment');
                }]);
        $new = $item->lawsuit->received_payment + $item->received;
        $item->lawsuit->received_payment = $new;
        $item->lawsuit->save();
        return $item;
    }

    public function update(Request $request, $id)
    {
        $item = $this->model->select('id', 'received')->findorFail($id);
        $updated_item = parent::update($request, $id);
        $updated_item->load(['lawsuit' => function ($query) {
                    $query->select('id', 'received_payment');
                }]);
        $new = $updated_item->lawsuit->received_payment - $item->received;
        $new += $updated_item->received;
        $updated_item->lawsuit->received_payment = $new;
        $updated_item->lawsuit->save();
        return $updated_item;
    }
    public function destroy($id)
    {
        $item = $this->model->select('id', 'lawsuit_id', 'received')->with(['lawsuit' => function ($query) {
                    $query->select('id', 'received_payment');
                }])->findorFail($id);
        parent::destroy($id);
        $new = $item->lawsuit->received_payment - $item->received;
        $item->lawsuit->received_payment = $new;
        $item->lawsuit->save();
        return $id;
    }
}
