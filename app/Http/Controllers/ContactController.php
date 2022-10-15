<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function store()
    {
        request()->validate([
            'name'=>'required|string',
            'subject'=>'required|string',
            'message'=>'required|string'

        ]);

        $message = Contact::create([
            'name' =>request('name'),
            'subject' =>request('subject'),
            'message' =>request('message'),
        ]);
        return redirect()->route('home');

    }
}
