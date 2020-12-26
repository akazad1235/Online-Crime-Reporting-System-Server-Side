<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class accountActive extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $id;
    public $varification_code;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $id, $varification_code)
    {
        $this->name = $name;
        $this->id = $id;
        $this->varification_code = $varification_code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.userVerify')->with('name', $this->name)->with('id', $this->id)->with('verify_code',$this->varification_code  );
    }
}
