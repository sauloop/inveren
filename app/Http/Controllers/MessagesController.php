<?php

namespace App\Http\Controllers;

use App\Mail\MessageReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessagesController extends Controller
{
    public function store()
    {
        $title = 'Contacto';

        $confirmation = 'Mensaje enviado.';

        $msg = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'content' => 'required|min:3',
        ]);

        //   $msg = ['message' => 'This is a test!'];

        Mail::to('consumocracia@gmail.com')->queue(new MessageReceived($msg));

        return view('contact', compact('title', 'confirmation'));

        // return redirect()->route('contact');
    }
}
