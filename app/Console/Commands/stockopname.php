<?php

namespace App\Console\Commands;
use App\Models\barang;
use App\Models\Income;
use App\Models\Usage;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;
use App\Models\Opname;

class stockopname extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:stockopname';

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
        $barang=barang::where('Status' ,'1')->sum('Quantity');
        $incomes = Income::where('tipe_transaksi', '2')
        ->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
         ->get();

        $usages = Usage::where('tipe_transaksi', '3')
         ->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
         ->get();

        $semuaperubahan = [
            'income' => $incomes,
            'usage' => $usages
        ];
 
        $jumlah=$incomes->sum('Quantity') + $usages->sum('Quantity');
        $accuracy= ($barang - $jumlah) / $barang * 100;
        Opname::create([
            'created_at'=>Carbon::now()->startOfMonth(),
            'end_at' =>Carbon::now()->endOfMonth(),
            'type'=>'auto',
            'accuracy'=>$accuracy,
            'data'=>json_encode($semuaperubahan)]);
            return Command::SUCCESS;
            
    }

}
