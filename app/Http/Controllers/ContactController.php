<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactNotification;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store ( Request $request) {
        $name = $request->input('name');
        $email = $request->input('email');
        // $message = $request->input('message');
        $message = $request->message;
        Mail::to( env('MAIL_FROM_ADDRESS') )->send(new ContactNotification(
            $name, 
            $email, 
            $message
        ));
        // el return back lo hacemos para que al recargar la pagina no nos envie mensajes cada vez que se recarga. Lo que hace es enviarnos a una pagina anterior y asi nos muestra el mensaje.
        return back ()->with ('code', '0')->with ('message', 'Mensaje enviado correctamente');
        // return view ('contact', ['code' => '0', 'message' => 'Mensaje enviado correctamente']);
    }
}
