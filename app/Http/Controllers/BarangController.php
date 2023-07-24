<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Http\Requests\StorebarangRequest;
use App\Http\Requests\UpdatebarangRequest;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    public function index()
    {

        $barangs=barang::latest()->paginate(25);
        $barangs->status = true; // Mengubah nilai menjadi Diterima
        return view('ListofMaterial.index',compact('barangs'))
        ->with('i', (request()->input('page', 1) - 1) * 25);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ListOfMaterial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorebarangRequest $request)
    {
        $this ->validate($request, [
            'Material_Code' => ['required'] ,
            'Type_of_Material' => ['required'] ,
            'Type_of_Budget' => ['required'] ,
            'Name_of_Material' => ['required'] ,
            'Catalog_Number' => ['required'] ,
            'Vendor' => ['required'] ,
            'Supplier' => ['required'] ,
            'Quantity' => ['required'] ,
            'Unit' => ['required'] ,
            'Safety_Stock' => ['required'] ,
            'Harga' => ['required'] ,
            'Maximum_Stock' => ['required'] ,
        ]);
        $barang = new barang();

        $barang ->Material_Code = $request->Material_Code;
        $barang ->Type_of_Material=$request->Type_of_Material;
        $barang ->Type_of_Budget =$request ->Type_of_Budget ;
        $barang ->Name_of_Material =$request ->Name_of_Material ;
        $barang ->Catalog_Number =$request ->Catalog_Number ;
        $barang ->Vendor =$request ->Vendor ;
        $barang ->Supplier =$request ->Supplier ;
        $barang ->Quantity =$request ->Quantity ;
        $barang ->Unit =$request ->Unit ;
        $barang ->Safety_Stock =$request ->Safety_Stock ;
        $barang ->Harga =$request ->Harga ;
        $barang ->Maximum_Stock =$request ->Maximum_Stock ;

        $barang ->save();
        session()->flash('success','Data Berhasil di Tambahkan.');
        
        return redirect() -> route('Barang.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $barang = barang::find($id);
     
        return view('ListOfMaterial.edit' ,[
            'barang' => $barang,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatebarangRequest $request, barang $barang,$id)
    {
        $barang = barang::find($id);

        $barang ->Material_Code = $request->Material_Code;
        $barang ->Type_of_Material=$request->Type_of_Material;
        $barang ->Type_of_Budget =$request ->Type_of_Budget ;
        $barang ->Name_of_Material =$request ->Name_of_Material ;
        $barang ->Catalog_Number =$request ->Catalog_Number ;
        $barang ->Quantity =$request ->Quantity ;
        $barang ->Harga =$request ->Harga ;
        $barang ->Safety_Stock =$request ->Safety_Stock ;
        $barang ->Maximum_Stock =$request ->Maximum_Stock ;

        $barang ->save();
        session()->flash('info','Stok Barang Berhasil di Update.');
        return redirect() -> route('Barang.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(barang $barang ,$id)
    {
        $barang = barang::find($id);
        $barang ->delete();
        session()->flash('danger','Barang Berhasil di Hapus.');
         return redirect() -> route('Barang.index');
    }

    

}
