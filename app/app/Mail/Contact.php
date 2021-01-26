<?php

namespace App\Mail;

use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $sentFrom;
    public $theMessage;
    public $phone_number;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $theMessage, $sentFrom, $phone_number)
    {
        $this->theMessage = $theMessage;
        $this->sentFrom = $sentFrom;
        $this->phone_number = $phone_number;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $setting = Setting::first();
        return $this->view('emails.contact', compact('setting'));
    }
}
