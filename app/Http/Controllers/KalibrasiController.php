<?php

namespace App\Http\Controllers;

use App\Models\Calibration;
use Illuminate\Http\Request;

class KalibrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $kalibrasi=Calibration::latest()->get();
        return view('kalibrasi.listinstrument.index',compact('kalibrasi'));
     
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
    public function show(Calibration $calibration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Calibration $calibration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Calibration $calibration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Calibration $calibration)
    {
        //
    }
}