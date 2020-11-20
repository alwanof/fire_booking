<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailManager extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public $name , $key ,$email,$data;
    public function __construct($name,$key,$email, $data)
    {
      $this->name = $name ;
      $this->key = $key ;
      $this->email = $email ;
      $this->data= $data ;
//      dd($data);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->from('cloudways@cloudways.com')
            ->view('mail');

    }
}
