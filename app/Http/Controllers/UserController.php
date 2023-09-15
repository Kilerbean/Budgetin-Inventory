<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=User::latest()->get();

        return view('users.index',compact('user'))-> with('i');
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
    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
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

        $user->update(['leveluser'=>2]);

        return back()->with('success','Karyawan di Update ke Staff');
    }

    public function updatespv(Request $request,$user)
    {
        $user=User::find($user);

        $user->update(['leveluser'=>3]);

        return back()->with('success','Karyawan di Update ke SuperVisor');
    }

    public function updatemanager(Request $request,$user)
    {
        $user=User::find($user);

        $user->update(['leveluser'=>4]);

        return back()->with('success','Karyawan di Update ke Manager');
    }

    public function updateadmin(Request $request,$user)
    {
        $user=User::find($user);

        $user->update(['leveluser'=>5]);

        return back()->with('success','Karyawan di Update ke Admin');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
