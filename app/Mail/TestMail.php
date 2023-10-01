<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $textmail=[];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($textmail)
    {
        $this->textmail = $textmail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('1621010541106@rmutr.ac.th','DPIM')->subject($this->textmail{"text"})
        ->view('emails.subscribe')->with("textmail",$this->textmail);
    }
}
