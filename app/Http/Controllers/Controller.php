<?php

namespace App\Http\Controllers;

use App\Models\ContactusInbox;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $trainers = User::role('trainer')->get();

        return view('homepage', compact('trainers'));
    }

    public function sendContactUs(Request $request){
        ContactusInbox::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ]);

        return redirect()->route('contact.us')->with('success', 'Message Sent.');
    }
}
