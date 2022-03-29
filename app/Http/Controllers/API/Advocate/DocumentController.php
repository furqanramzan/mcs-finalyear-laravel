<?php

namespace App\Http\Controllers\API\Advocate;

use Illuminate\Http\Request;
use App\Http\Controllers\CrudController;
use Storage;

class DocumentController extends CrudController
{
    public function setup()
    {
        $this->setModel('App\Models\Document');
    }

    public function exceptIndexColumns()
    {
        return ['updated_at'];
    }

    public function beforeSaving($data)
    {
      // $images = [];
      // foreach ($data['images'] as $key => $image) {
      //    $moveTo = 'uploads/chart_patterns';
      //   $name = time().$key.'.'.$image->extension();
      //   $move = $image->move(public_path($moveTo), $name);
      //   $path = '/'.$moveTo.'/'.$name;
      //   array_push($images, $path);
      // }
      // $data['images'] = $images;
      $image = $data['file'];
      $data['extension'] = $image->extension();
      $moveTo = 'documents';
      $file = Storage::disk('local')->put($moveTo, $image);
      $data['file'] = $file;
      return $data;
    }

    public function show($id)
    {
        $item = $this->model->select('file')->findorFail($id);
        return Storage::download($item->file);
    }
}
