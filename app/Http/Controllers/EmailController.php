<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\EmailRequest;

use Mail;
use Session;
use Redirect;

class EmailController extends Controller
{

    /**
     * Send email.
     *
     * @return \Illuminate\Http\Response
     */
    public function send(EmailRequest $request)
    {

		$mail = Mail::send('emails.contact', $request->all(), function ($msj) use ($request){

            $msj->from($request->email, $request->name);
            $msj->replyTo($request->email);
            $msj->to('xochissea@gmail.com');
            $msj->subject($request->subject);
		});

        Session::flash('message','Enviado correctamente');
        return Redirect::to('#contacto');

    }
}
