<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendOtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public $otp;
    public $name;
    public $appname;


    /**
     * Create a new message instance.
     */
    public function __construct($otp, $name)
    {
        $this->otp = $otp;
        $this->name = $name;
        $this->appname = config('app.name');
    }

    public function build()
    {
        return $this->subject('Your OTP for Restaurant POS Registration')
                    ->view('frontend.layouts.auth.otp_email');
    }
}
