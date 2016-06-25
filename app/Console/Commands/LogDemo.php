<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use App\User;
use Mail;
use Carbon;
class LogDemo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'log:demo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adding lines to the log file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users = User::all();  
        foreach($users as $user){
            $email = $user->email;
            $content = 'Hi '.$user->nombre.', we wish you a happy new year! Thanks for another year with us!.';   
            Mail::raw($content,function($message) use ($email,$user)
            {
                $message->to($email);
                $message->subject('¡Happy new year! '.$user->nombre);
            });
            \Log::info('Happy new years send to: @ '. $user->nombre);            
        }

    }
}
