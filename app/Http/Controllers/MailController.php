<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function testMail(){
        Mail::to('hattanourdine4@gmail.com')->send(new OrderShipped());
        echo "bravo Email Envoyer";
    }
}
