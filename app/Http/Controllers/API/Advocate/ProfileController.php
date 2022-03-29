<?php

namespace App\Http\Controllers\API\Advocate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Advocate;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user()->load('advocate');
        return $user;
    }

    public function store(Request $request)
    {
        $data = $request->only('city', 'fees', 'speciality');
        $data['user_id'] = auth()->user()->id;
        auth()->user()->advocate()->create($data);
        auth()->user()->name = $request->name;
        auth()->user()->save();
        return auth()->user()->load('advocate');
    }

    public function update(Request $request, $id)
    {
        $data = $request->only('city', 'fees', 'speciality');
        $user = auth()->user();
        $advocate = Advocate::whereUserId($user->id)->first();
        $advocate->city = $data['city'];
        $advocate->fees = $data['fees'];
        $advocate->speciality = $data['speciality'];
        $advocate->save();
        $user->name = $request->name;
        $user->save();
        return $user->load('advocate');
    }
}
