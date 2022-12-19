<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class ContactController extends Controller
{

    public function store(): RedirectResponse
    {
       $attributes = request()->validate([
            'name'=>'required|string',
            'subject'=>'required|string',
            'message'=>'required|string',
            'email'=>'required|email'

        ]);

        $message = Contact::create([
            'name'=> $attributes['name'],
            'subject'=> $attributes['subject'],
            'message'=> $attributes['message'],
            'email'=> $attributes['email'],

        ]);

        return redirect()->route('home');

    }
}
