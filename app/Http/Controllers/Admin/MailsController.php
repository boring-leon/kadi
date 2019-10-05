<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Mail\MailSender;

class MailsController extends Controller
{
    private $sender;

    public function __construct(MailSender $sender){
        $this->middleware('admin');
        $this->sender = $sender;
    }

    public function send(){
        if($this->sender->shouldSend()){
            $this->sender->sendMails();
            return redirect()->to('admin.index')->with('info', 'Maile są wysyłane');
        }
        
        return redirect()->to('admin.index')->with('info', 'Mailing jest wyłączony');
    }

    public function index(){
        $target = $this->sender->getConfig()->getTarget();
        return view('admin.mailing_panel')->with('target', $target);
    }

    public function show(){
        return $this->sender->getConfig()->getMail(auth()->user());
    }
}
