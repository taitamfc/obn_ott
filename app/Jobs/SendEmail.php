<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $item;
    protected $data;
    protected $type;
    /**
     * Create a new job instance.
     */
    public function __construct($item,$data,$type = '')
    {
        $this->item = $item;
        $this->data = $data;
        $this->type = $type;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $item = $this->item;
        $data = $this->data;
        Mail::send('admin.auth.mail',compact('data'), function($email) use ($item){
            $email->subject('Forgot Password');
            $email->to($item->email, $item->name );
        });
    }
}
