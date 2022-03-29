<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Schema;

class CrudController extends Controller
{
    protected $model;
    protected $columns;
    protected $indexColumns;
    protected $storeColumns;
    protected $updateColumns;

    public function __construct()
    {
    	$this->setup();
    	$this->model = new $this->model;
    }

    public function setup()
    {
    	
    }

    public function setModel($model)
    {
    	$this->model = $model;
    }

    public function getIndexColumns()
    {
    	$set = $this->setIndexColumns();
    	$except = $this->exceptIndexColumns();
    	if(is_null($set))
    		$columns = $this->model->getConnection()->getSchemaBuilder()->getColumnListing($this->model->getTable());
    	else
    		$columns = $set;
    	if(!is_null($except))
	    	$columns = array_diff($columns, $except);
    	return $columns;
    }

    public function setIndexColumns()
    {
    	return null;
    }

    public function exceptIndexColumns()
    {
    	return null;
    }

    public function getShowColumns()
    {
        $set = $this->setShowColumns();
        $except = $this->exceptShowColumns();
        if(is_null($set))
            $columns = $this->model->getConnection()->getSchemaBuilder()->getColumnListing($this->model->getTable());
        else
            $columns = $set;
        if(!is_null($except))
            $columns = array_diff($columns, $except);
        return $columns;
    }

    public function setShowColumns()
    {
        return null;
    }

    public function exceptShowColumns()
    {
        return null;
    }

    public function addClause($model, $request = null)
    {
    	return $model;
    }

    public function index(Request $request)
    {
    	$model = $this->addClause($this->model, $request);
        if($request->column && $request->value){
            if(Schema::hasColumn($this->model->getTable(), $request->column))
                $model = $model->where($request->column, $request->value);
        }
        if($request->display && $request->store){
            return $model->select($request->store, $request->display)->get();
        }
        elseif($request->sortField && $request->sortOrder){
        	$columns = $this->getIndexColumns();
            $model = $model->select($columns);
        	$model = $model->orderBy($request->sortField, $request->sortOrder);
        	return $model->paginate(16);            
        }
        else
            return 'false';
    }

    public function show($id)
    {
            $columns = $this->getShowColumns();
            $item = $this->model->select($columns)->findorFail($id);
            return $item;
    }


    public function getCreateColumns()
    {
    	$set = $this->setCreateColumns();
    	$except = $this->exceptCreateColumns();
    	if(is_null($set))
    		$columns = $this->model->getFillable();
    	else
    		$columns = $set;
    	if(!is_null($except))
	    	$columns = array_diff($columns, $except);
    	return $columns;
    }

    public function setCreateColumns()
    {
    	return null;
    }

    public function exceptCreateColumns()
    {
    	return null;
    }

    public function beforeSaving($data)
    {
    	return $data;
    }

    public function afterSaving($item)
    {
        return $item;
    }

    public function store(Request $request)
    {
    	$columns = $this->getCreateColumns();
    	$data = $request->only($columns);
        $data = $this->beforeSaving($data);
    	$item = $this->model->create($data);
    	$item = $this->afterSaving($item);
    	return $item;
    }

    public function update(Request $request, $id)
    {
        $item = $this->model->select('id')->findorFail($id);
        $columns = $this->getCreateColumns();
        $data = $request->only($columns);
        $data = $this->beforeSaving($data);
        $item->fill($data);
        $item->save();
        return $item;
    }

    public function destroy($id)
    {
        $item = $this->model->findorFail($id);
        $id = $item->id;
        $item = $item->delete();
        return $id;
    }
}
