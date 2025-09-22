<?php
namespace EnvioEmail\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class GenericEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $subjectLine;
    public $bodyContent;

    public function __construct($subjectLine, $bodyContent)
    {
        $this->subjectLine = $subjectLine;
        $this->bodyContent = $bodyContent;
    }

    public function build()
    {
        return $this->subject($this->subjectLine)
                    ->view('envio-email::emails.generic')
                    ->with([
                        'bodyContent' => $this->bodyContent,
                        'subjectLine' => $this->subjectLine,
                    ]);
    }
}
