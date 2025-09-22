<?php
namespace EnvioEmail\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class GenericEmail extends Mailable
{
    public $bodyContent;
    public $subjectLine;

    public function __construct($subject, $body)
    {
        $this->subjectLine = $subject;
        $this->bodyContent = $body;
        $this->subject($subject); // define o subject
    }

    public function build()
    {
        return $this
            ->subject($this->subjectLine)
            ->view('envio-email::emails.generic') // ✅ view HTML
            ->with([
                'bodyContent' => $this->bodyContent,
                'subjectLine' => $this->subjectLine,
            ]);
    }
}
