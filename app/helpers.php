<?php
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Http\HtmlDumper;
use Illuminate\Foundation\Console\CliDumper;
use Symfony\Component\VarDumper\Cloner\VarCloner;



function auditmms($change_by,$activity,$recordid,$table,$field,$before,$after){
    $tablename = DB::connection()->getDatabaseName().'.audits';      
    DB::table($tablename)->insert([  
        'created_at'=>now(),
        'change_by'=>$change_by,
        'activity'=>$activity,
        'recordid' => $recordid,
        'sourcetable' => $table,
        'sourcefield' => $field,
        'beforevalue' => $before,
        'aftervalue' => $after,
    ]);    
                
}

function startauditkalibrasi($data, $fields, $old, $table, $activity)
{
    if ($data->wasChanged() == true) {
        foreach ($fields as $field) {
            if ($data->wasChanged($field)) {
                if ($old[$field] != $data->$field) {
                    auditmms(Auth::user()->name, $activity, $data->instrumentid,
                        $table, $field, $old[$field], $data->$field);
                }
            }
        }       

        return back()->with('success', 'Data was Saved !')->withInput(['messages' => 'success']);
    } else {
        return back()->with('info', 'Nothing Changed!');
    }
}

function startauditexpanse($data, $fields, $old, $table, $activity)
{
    if ($data->wasChanged() == true) {
        foreach ($fields as $field) {
            if ($data->wasChanged($field)) {
                if ($old[$field] != $data->$field) {
                    auditmms(Auth::user()->name, $activity,$data->Catalog_Number,
                    'List of Material', $field, $old[$field], $data->$field);
                }
            }
        }       


        return back()->with('success', 'Data was Saved !')->withInput(['messages' => 'success']);
    } else {
        return back()->with('info', 'Nothing Changed!');
    }
}





function startauditmms($data, $fields, $old, $table, $activity)
{
    if ($data->wasChanged() == true) {
        foreach ($fields as $field) {
            if ($data->wasChanged($field)) {
                if ($old[$field] != $data->$field) {
                    auditmms(Auth::user()->id, $activity, $data->id,
                        $table, $field, $old[$field], $data->$field);
                }
            }
        }       

        return back()->with('success', 'Data was Saved !')->withInput(['messages' => 'success']);
    } else {
        return back()->with('info', 'Nothing Changed!');
    }
}

function startauditsparta($data, $fields, $old, $table, $activity)
{
    if ($data->wasChanged() == true) {
        foreach ($fields as $field) {
            if ($data->wasChanged($field)) {
                if ($old[$field] != $data->$field) {
                    auditmms(Auth::user()->id, $activity, $data->id_produk,
                        $table, $field, $old[$field], $data->$field);
                }
            }
        }       

        return back()->with('success', 'Data was Saved !')->withInput(['messages' => 'success']);
    } else {
        return back()->with('info', 'Nothing Changed!');
    }
}

function getoldvalues($connection,$table,$data){
    $fields = array_diff(Schema::Connection($connection)->getColumnListing($table),['updated_at']);    
    //get old value 
    foreach($fields as $field){
        $old[$field]= $data->$field;
    }     
    return ['fields'=>$fields,'old'=>$old,'table'=>$table];
}

function randomPassword($len = 8) {

    //enforce min length 8
    if($len < 8)
        $len = 8;

    //define character libraries - remove ambiguous characters like iIl|1 0oO
    $sets = array();
    $sets[] = 'ABCDEFGHJKLMNPQRSTUVWXYZ';
    $sets[] = 'abcdefghjkmnpqrstuvwxyz';
    $sets[] = '23456789';
    //$sets[]  = '!@#$%^&*?';

    $password = '';
    
    //append a character from each set - gets first 4 characters
    foreach ($sets as $set) {
        $password .= $set[array_rand(str_split($set))];
    }

    //use all characters to fill up to $len
    while(strlen($password) < $len) {
        //get a random set
        $randomSet = $sets[array_rand($sets)];
        
        //add a random char from the random set
        $password .= $randomSet[array_rand(str_split($randomSet))]; 
    }
    
    //shuffle the password string before returning!
    return str_shuffle($password);
}

function getshifttext($time){     
    $seconds= strtotime($time) - strtotime('00:00:00');
    if($seconds < 25200){
        $shifttext = 'C';
    }elseif($seconds < 54001){
        $shifttext = 'A';
    }elseif($seconds < 82801){
        $shifttext = 'B';
    }else{
        $shifttext = 'C';
    }   
       return $shifttext;   
}
function search_forarray($id, $array) {
    foreach ($array as $key => $val) {
        if ($val['day_month'] === $id) {
            return $key;
        }
    }
    return null;
}

function search_fromarray($array, $search_list) {
  
    // Create the result array
    $result = array();
  
    // Iterate over each array element
    foreach ($array as $key => $value) {
  
        // Iterate over each search condition
        foreach ($search_list as $k => $v) {
      
            // If the array element does not meet
            // the search condition then continue
            // to the next element
            if (!isset($value[$k]) || $value[$k] != $v)
            {
                  
                // Skip two loops
                continue 2;
            }
        }
      
        // Append array element's key to the
        //result array
        $result[] = $value;
    }
  
    // Return result 
    return $result;
}

function monthNamesShort()
{
    return [
        '01' => 'Jan',
        '02' => 'Feb',
        '03' => 'Mar',
        '04' => 'Apr',
        '05' => 'May',
        '06' => 'Jun',
        '07' => 'Jul',
        '08' => 'Aug',
        '09' => 'Sep',
        '10' => 'Oct',
        '11' => 'Nov',
        '12' => 'Dec',
    ];
}
/* function dumpi($value)
{
    if (class_exists(CliDumper::class)) {
        $dumper = 'cli' === PHP_SAPI ? new CliDumper : new HtmlDumper;

        $cloner = new VarCloner();
        $cloner->setMaxItems(5000);
        $dumper->dump($cloner->cloneVar($value));
    } else {
        var_dump($value);
    }
} */