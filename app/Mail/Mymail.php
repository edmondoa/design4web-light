<?php

namespace App\Mail;

use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Mymail extends Mailable
{
    use Queueable, SerializesModels;

    public $title;
  

 
    public function __construct($title)
    {
       $this->title = $title;
    }

   
    public function build()
    {
        return $this->from('joemar.t.lamata@gmail.com')
			->view('emails.mymail');
    }
}