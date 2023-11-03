<?php

namespace App\Console\Commands;

use App\Mail\ReminderEmail;
use App\Models\Calibration;
use Illuminate\Console\Command;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Mail;

class remindernearcalib extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:remindernearcalib';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $recipients = User::where('leveluser',6)->get();
        foreach($recipients as $recipient){
            $emailto[]=$recipient->email;
        }
       
        $kalibrasinear = Calibration::where('nextcalibration', '>=', now())
        ->where('nextcalibration', '<', now()->addDays(30))
        ->where('status_approval',1)
        ->where('status_instrument',1)
        ->get();
        // dd($kalibrasinear->count());
        Mail::to($emailto)                 
        ->send(new ReminderEmail($kalibrasinear));
     
    }
}
