<?php

namespace App\Console\Commands;

use App\Models\QCSession;
use Illuminate\Console\Command;

class ClearSession extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:session';

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
        $sessionConfig = config('session.lifetime');
        $thresholdTimestamp = now()->addMinute(-$sessionConfig)->unix();      
        $sesi = QCSession::where('last_activity', '<', $thresholdTimestamp)->get();        
        foreach($sesi as $data){
            $data->delete();
        }
        
    }
}
