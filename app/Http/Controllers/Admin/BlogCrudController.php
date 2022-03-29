<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\BlogRequest as StoreRequest;
use App\Http\Requests\BlogRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class BlogCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class BlogCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Blog');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/blog');
        $this->crud->setEntityNameStrings('Blog', 'Blogs');
        $this->crud->enableBulkActions(); 
        $this->crud->addBulkDeleteButton();
        $this->crud->allowAccess('show');
        if (!$this->request->has('order'))
            $this->crud->orderBy('created_at', 'desc');

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();

        // add asterisk for fields that are required in BlogRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');

        $this->crud->addFields([
            [
                'name' => 'detail',
                'type' => 'ckeditor'
            ]
        ]);

        $this->crud->addColumns([
            [
                'name' => 'detail',
                'type' => 'text'
            ]
        ]);
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function show($id)
    {
        $content = parent::show($id);
        $this->crud->addColumn([
            'name' => 'detail',
            'type' => 'textarea',
        ]);

        return $content;
    }
}
