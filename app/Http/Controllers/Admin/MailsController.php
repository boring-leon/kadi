<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Mail\MailSender;
use Illuminate\Support\Facades\DB;

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
            $jobsLength = DB::table('jobs')->count();
            return redirect()->to('admin.index')->with('info', "Maile dodano do kolejki (<b>".$jobsLength."</b>)");
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
