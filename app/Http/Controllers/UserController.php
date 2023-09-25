<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=User::latest()->get();
        $incomess = Income::latest()->whereNotNull('No_PO')->where('Status', '1')->where('tipe_transaksi', '1')->where('Quantity','>','0')->get();


        return view('users.index',compact('user','incomess'))-> with('i');
    }

    public static function getLevelUserText($level)
    {
        switch ($level) {
            case 1:
                return 'User';
            case 2:
                return 'Staff';
            case 3:
                return 'Supervisor';
            case 4:
                return 'Manager';
            case 5:
                return 'Administrator';
            default:
                return 'Unknown';
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($user)
    {
        $user=User::find($user);
        $audit = DB::table('audits')->latest()->where('sourcetable', 'Users')->get();
        return view('users.edit',compact('user','audit'));
    }
    public function update(Request $request ,$user)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'Status' => 'required',
                'title' => 'required',
            ],
        );
        $user=User::find($user);
      
        $old= \getoldvalues('mysql','users',$user); 
     
        $user->name=$request->name;
        $user->email=$request->email;
        $user->Status=$request->Status;
        $user->title=$request->title;
        $user->save();


        
        $old_level = $old["old"]["leveluser"];
        $old_name=$old["old"]["name"];
        $old_email=$old["old"]["email"];
        $old_title=$old["old"]["title"];

  \auditmms(auth()->user()->name, 'Edit Data User',$user->email,'Users','Edit User Data',"Name :".$user->name."| Email :".$user->email,"Name :".$request->name."| Email :".$request->email);
        return back()
        ->with('success','User updated successfully');
    }





    public function profil(User $user)
    {
        return view('COST_QC.profil',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
   

    public function updatestaff(Request $request,$user)
    {
        $user=User::find($user);
        $old= \getoldvalues('mysql','users',$user); 
        $old_level = $old["old"]["leveluser"];
  
        $user->update(['leveluser'=>2]);
        


        return back()->with('success','Employees are promoted to staff');
    }

    public function updatespv(Request $request,$user)
    {
        $user=User::find($user);
        $old= \getoldvalues('mysql','users',$user); 
        $old_level = $old["old"]["leveluser"];

        $user->update(['leveluser'=>3]);

        return back()->with('success','Employees are promoted to SuperVisor');
    }

    public function updatemanager(Request $request,$user)
    {
        $user=User::find($user);
        $old= \getoldvalues('mysql','users',$user); 
        $old_level = $old["old"]["leveluser"];

        $user->update(['leveluser'=>4]);

        return back()->with('success','Employees are promoted to Manager');
    }

    public function updateadmin(Request $request,$user)
    {
        $user=User::find($user);
        $old=\getoldvalues('mysql','users',$user);
        $old_level=$old["old"]["leveluser"];
        $user->update(['leveluser'=>5]);

        return back()->with('success','Employees are promoted to Administator');
    }
    
    public function updateaktif(Request $request,$user)
    {
        $user=User::find($user);
        $user->update(['Status'=>1]);

        return back()->with('success','Employees are activated');
    }

    public function updatenonaktif(Request $request,$user)
    {
        $user=User::find($user);

        $user->update(['Status'=>0]);

        return back()->with('success','Employees are Deactivated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
