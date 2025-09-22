<?php
namespace EnvioEmail\Traits;

use EnvioEmail\Mail\GenericEmail;
use Illuminate\Support\Facades\Mail;

trait SendsEmail
{
    public function sendEmail(string $to, string $subject, string $body, bool $queue = true, $delay = null): void
    {
        $mailable = new GenericEmail($subject, $body);

        if ($queue) {
            $delay
                ? Mail::to($to)->later($delay, $mailable)
                : Mail::to($to)->queue($mailable);
        } else {
            Mail::to($to)->send($mailable);
        }
    }
}
