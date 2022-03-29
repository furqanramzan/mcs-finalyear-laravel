<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
    	return view('pages.home');
    }

    public function about()
    {
    	return view('pages.about');
    }

    public function contact()
    {
    	return view('pages.contact');
    }

    public function postContact(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|string',
        //     'phone' => 'required',
        //     'email' => 'required|email',
        //     'subject' => 'required|string',
        //     'message' => 'required|string'
        // ]);

        $data=array(
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'subject'=>$request->subject,
            'bodyMessage'=>$request->message
        );

        \Mail::send('support@gmail.com',$data,function($message) use ($data){
            $message->subject($data['subject']);
        });

        return redirect()->back()->with('success', 'Message sent successfully.');
    }
}
