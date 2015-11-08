<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Mail; // for mail
use App\Http\Requests\MailRequest; // for validation

class MailController extends Controller
{

    /**
     * Send email from contact page
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MailRequest $request)
    {
        $message_arr = Array(
            "name"  => $request->name,
            "email" => $request->email,
            "text"  => $request->text
        );

        Mail::send('emails.contact', ['mail' => $message_arr], function($message)
        {
            $mail_to = 'lollipop.fly@gmail.com';
            $subject = 'Новое письмо с сайта Laraplane.ru!';
            $message->to($mail_to, 'Laraplane')->subject($subject);
        });

        session()->flash('flash_message', 'Ваше сообщение отправлено!');
        return redirect()->back();
    }
}
