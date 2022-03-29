<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
    	$request->validate([
			'name' => 'required|string|max:190',
            'email' => 'required|email',
			// 'email' => 'required|email|unique:users,email',
			'password' => 'required|min:6|max:190|confirmed',
            'advocate' => 'required'
		]);
        $data = $request->only('name', 'email', 'password', 'advocate');
        $user = User::whereEmail($data['email'])->select('id')->first();
        if($user)
            return ['email_exist' => true];
        $data['password'] = Hash::make($data['password']);
		$user = User::create($data);
		return $this->login($request);
    }

    public function login(Request $request)
    {
    	$request->validate([
    		'email' => 'required|email',
    		'password' => 'required|min:6'
    	]);
        $data = $request->only('email', 'password');
        $user = User::whereEmail($data['email'])->first();
        if(!$user)
            return ['email_not_exist' => true];
        if (! Hash::check($data['password'], $user->password)) {
            return ["password" => true];
        }
        $token = str_random(60);

        $user->api_token = hash('sha256', $token);
        $user->save();
		return response()->json([
        	"token" => [
	            'access_token' => $token,
	            'token_type' => 'bearer',
	        ],
	        "user" => $user
	    ]);
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->api_token = null;
        $user->save();
        return 'true';
    }

    public function user(Request $request)
    {
        $user = auth()->user();
        return $user;
    }
}
