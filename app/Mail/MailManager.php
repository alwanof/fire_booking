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
     public $name , $key ,$email,$data,$status;
    public function __construct($name,$key,$email, $data,$status = "Create")
    {
      $this->name = $name ;
      $this->key = $key ;
      $this->email = $email ;
      $this->data= $data ;
      $this->status = $status;
//      dd($data);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->status =="Completed"){
                  return $this->from('info@2urkeybooking.com')
            ->view('mailing.completed');

        }elseif ($this->status =="Rejected"){
                  return $this->from('info@2urkeybooking.com')
            ->view('mailing.mail');

        }else{
                  return $this->from('info@2urkeybooking.com')
            ->view('mailing.mail');

        }

    }
}
