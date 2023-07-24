<?php

namespace App\Console\Commands;
use App\Models\financial;
use Illuminate\Console\Command;

class budget_sedeer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:financial';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    // public function __construct()
    // {
    //     parent::__construct();
    // }


    /**
     * Execute the console command.
     */
    public function handle()
    {
       
        $currentYear = date('y');
        $months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
        $materials = ['Maintenance','Product Research and Development','Supporting Material','Manufacturing Supply'];

        foreach($months as $month){
            $bulantahun= $month.'-'.$currentYear;
            foreach($materials as $material){
                $financial = Financial::UpdateorCreate(['bulan_tahun'=>$bulantahun,'Type_of_Budget'=>$material],
                ['actual'=>null]);
            }
        }
    }
}
