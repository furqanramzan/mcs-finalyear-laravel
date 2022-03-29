<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\EmailRequest as StoreRequest;
use App\Http\Requests\EmailRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;
use App\Mail\BulkEmail;
use App\Models\User;
use Mail;

/**
 * Class EmailCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class EmailCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Email');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/email');
        $this->crud->setEntityNameStrings('Email', 'Emails');
        $this->crud->enableBulkActions(); 
        $this->crud->addBulkDeleteButton();
        $this->crud->allowAccess('show');
        $this->crud->denyAccess('update');
        if (!$this->request->has('order'))
            $this->crud->orderBy('created_at', 'desc');

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();

        // add asterisk for fields that are required in EmailRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');

        $this->crud->addFields([
            [
                'name' => 'to',
                'type' => 'select_from_array',
                'options' => [
                    '' => '-',
                    0 => 'Applicant',
                    1 => 'Advocate',
                    2 => 'Both',
                ]
            ],
            [
                'name' => 'message',
                'type' => 'ckeditor'
            ]
        ]);

        $this->crud->addColumns([
            [
                'name' => 'to',
                'type' => 'select_from_array',
                'options' => [
                    '' => '-',
                    0 => 'Applicant',
                    1 => 'Advocate',
                    2 => 'Both',
                ]
            ],
            [
                'name' => 'message',
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
        $users = User::select('email');
        switch ($request->to) {
            case 0:
                $users = $users->whereAdvocate(0)->get();
                break;
            case 1:
                $users = $users->whereAdvocate(1)->get();
                break;
            case 2:
                $users = $users->get();
                break;
        }
        foreach ($users as $user) {
            Mail::to($user->email)->send(new BulkEmail($this->crud->entry));
        }
        return $redirect_location;
    }

    public function show($id)
    {
        $content = parent::show($id);
        $this->crud->addColumn([
            'name' => 'message',
            'type' => 'textarea',
        ]);

        return $content;
    }
}
