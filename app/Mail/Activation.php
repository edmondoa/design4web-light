<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Activation extends Mailable
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
			->view('emails.Goshare_activation');
    }
}