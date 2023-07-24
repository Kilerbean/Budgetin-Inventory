@extends('templates.dasar')
@php
  $title = 'Edit Stock Barang';
  $pretitle = 'EDIT';

@endphp 
@section('coba')
    
        <div class="card ">
         <div class="card-body ">
            <form action="{{ route('Barang.update',$barang->id) }}" class=""  method="post">

                @csrf
              @method('PUT')

              <label class="form-label">Jumlah Stok : {{ $barang->Quantity }} </label>
              <br>
            <div class="  mb-3">
                <label class="form-label">Code Material</label>
                <input type="text" name="Material_Code" class="form-control" 
                name="example-text-input" placeholder="Input placeholder" value="{{ $barang->Material_Code }}" >
              </div>

              <div class=" mb-3">
                <div class="form-label">Type of Budget</div>
                <select class="form-select" name="Type_of_Budget" value="{{ $barang->Type_of_Budget }}"  >
                  <option value="Maintenance">Maintenance</option>
                  <option value="Product Research and Development">Product Research and Development</option>
                  <option value="Supporting Material">Supporting Material</option>
                  <option value="Manufacturing Supply">Manufacturing Supply</option>
                </select>
              </div>

                <div class="mb-3">
                    <div class="form-label">Type of Material</div>
                    <select class="form-select" name="Type_of_Material"  value="{{ $barang->Type_of_Material }}" >
                      <option value="Column">Column</option>
                      <option value="Spare Part Instrument">Spare Part Instrument</option>
                      <option value="Service Charge">Service Charge</option>
                      <option value="Reference Standard">Reference Standard</option>
                      <option value="Working Standard">Working Standard</option>
                      <option value="Bacteria / Yeast and Mold Standard">Bacteria / Yeast and Mold Standard</option>
                      <option value="External Laboratory">External Laboratory</option>
                      <option value="Reagent">Reagent</option>
                      <option value="Microbiology Media">Microbiology Media</option>
                      <option value="Glassware">Glassware</option>
                      <option value="General Usage">General Usage</option>
                    </select>
                  </div>

                    <div class="mb-3">
                        <label class="form-label">Name of Material</label>
                        <input type="text" name="Name_of_Material" class="form-control" 
                        name="example-text-input" placeholder="Input placeholder" value="{{ $barang->Name_of_Material }}" >
                      </div>
                      
                    <div class="mb-3">
                        <label for="safety_stok" class="form-label">Catalog Number</label>
                        <input type="text" class="form-control" name="Catalog_Number" 
                        value="{{ $barang->Catalog_Number }}"  > </div>
                        

                    <div class="mb-3">
                        <label for="safety_stok" class="form-label" hidden>Quantity </label>
                        <input type="number" class="form-control" name="Quantity" 
                        placeholder="0" min=0 value="{{ $barang->Quantity }}" hidden> </div>

                    <div class="mb-3">
                        <label for="safety_stok" class="form-label">Safety Stock</label>
                        <input type="number" class="form-control" name="Safety_Stock" 
                            min=0 placeholder="0" value="{{ $barang->Safety_Stock }}"> </div>
                            
                    <div class="mb-3">
                        <label for="safety_stok" class="form-label">Harga</label>
                        <input type="number" class="form-control" name="Harga" 
                            min=0 placeholder="0" value="{{ $barang->Harga }}"> </div>
                    
                    <div class="mb-3">
                        <label for="safety_stok" class="form-label">Maximum Stock</label>
                        <input type="number" class="form-control" name="Maximum_Stock" 
                            min=0 placeholder="0" value="{{ $barang->Maximum_Stock }}"></div>
                    
                    <div class="mb-3">
                        <input type="submit" value="Simpan" class="btn btn-primary">
                    </div>
              </div>
        </form>

    </div>
</div>
@endsection