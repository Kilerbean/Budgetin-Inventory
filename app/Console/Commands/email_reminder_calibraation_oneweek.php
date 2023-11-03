<?php

namespace App\Console\Commands;

use App\Mail\ReminderEmail;
use App\Mail\Reminderoneweek;
use App\Models\Calibration;
use Illuminate\Console\Command;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Mail;

class email_reminder_calibraation_oneweek extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:email_reminder_calibraation_oneweek';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Kirim email pengingat untuk kalibrasi alat yang mendekati dalam 7 hari dan di cek tiap hari';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $recipients = User::where('leveluser', 6)->get();
    $emailto = [];

    foreach ($recipients as $recipient) {
        $emailto[] = $recipient->email;
    }

    $kalibrasinearweek = Calibration::where('nextcalibration', '>=', now())
        ->where('nextcalibration', '<', now()->addDays(7))
        ->where('status_approval', 1)
        ->where('status_instrument', 1)
        ->get();
// dd($kalibrasinearweek->count());
    if ($kalibrasinearweek->isNotEmpty()) {
        Mail::to($emailto)
            ->send(new Reminderoneweek($kalibrasinearweek));
    } else {
        $this->info('Tidak ada alat kalibrasi yang mendekati 7 hari.');
    }

    }
}
