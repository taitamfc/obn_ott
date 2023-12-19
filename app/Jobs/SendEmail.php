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
        $type = $this->type;
        switch ($type) {
            case 'store_member':
                try {
                    Mail::send('admin.includes.mailMember',compact('data'), function($email) use ($item){
                        $email->subject('Store Member');
                        $email->to($item->email, $item->name );
                    });
                } catch (\Exception $e) {
                    Log::error('Bug send email error : '.$e->getMessage());
                }
                break;
            case 'forgot_pass':
                try {
                    Mail::send('admin.includes.mailForgot',compact('data'), function($email) use ($item){
                        $email->subject('Forgot Password');
                        $email->to($item->email, $item->name );
                    });
                } catch (\Exception $e) {
                    Log::error('Bug send email error : '.$e->getMessage());
                }
                break;
        }
    }
}