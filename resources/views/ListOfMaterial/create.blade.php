@extends('templates.dasar')
@php
  $title = 'Tambah Material';
  $pretitle = 'LIMS';

@endphp 
@section('coba')
    
        <div class="card ">
         <div class="card-body ">
            <form action="{{ route('Barang.store') }}" class=""  method="post">

                @csrf

            <div class="  mb-3">
                <label class="form-label">Material Code</label>
                <input type="text" name="Material_Code" class="form-control     
                @error('Material_Code')
                is-invalid
              @enderror" 
                name="example-text-input" 
                 placeholder="Input placeholder" value="{{ old('Material_Code') }}">
                 @error('Material_Code')
                 <span class="invalid-feedback">{{ $message }}</span>
                 @enderror
              </div>

              <div class=" mb-3">
                <div class="form-label">Type of Budget</div>
                <select class="form-select " name="Type_of_Budget" >
                  <option value="Maintenance">Maintenance</option>
                  <option value="Product Research and Development">Product Research and Development</option>
                  <option value="Supporting Material">Supporting Material</option>
                  <option value="Manufacturing Supply">Manufacturing Supply</option>
                </select>

                <div class="mb-3">
                    <div class="form-label">Type of Material</div>
                    <select class="form-select" name="Type_of_Material"  >
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

                    <div class="mb-3">
                        <label class="form-label">Name of Material</label>
                        <input type="text" name="Name_of_Material" class="form-control @error('Name_of_Material')
                        is-invalid
                      @enderror" 
                        name="example-text-input" placeholder="Input placeholder" value="{{ old('Name_of_Material') }}">@error('Name_of_Material')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                      </div>
                      
                    <div class="mb-3">
                        <label for="safety_stok" class="form-label">Catalog Number</label>
                        <input type="text" class="form-control @error('Catalog_Number')
                        is-invalid @enderror" name="Catalog_Number" 
                            placeholder="0" value="{{ old('Catalog_Number') }}">@error('Catalog_Number')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                    </div>
                        
                    <div class="mb-3">
                        <label class="form-label">Vendor</label>
                        <input type="text" name="Vendor" class="form-control 
                        @error('Vendor')
                        is-invalid
                      @enderror" 
                         placeholder="Input placeholder" value="{{ old('Vendor') }}">
                         @error('Vendor')
                         <span class="invalid-feedback">{{ $message }}</span>
                         @enderror
                      </div>

                    <div class="mb-3">
                        <label class="form-label">Supplier</label>
                        <input type="text" name="Supplier" class="form-control 
                        @error('Supplier') is-invalid @enderror" 
                        name="example-text-input" placeholder="Input placeholder" value="{{ old('Supplier') }}">
                        @error('Supplier')
                         <span class="invalid-feedback">{{ $message }}</span>
                         @enderror
                      </div>

                    <div class="mb-3">
                        <label for="safety_stok" class="form-label">Quantity</label>
                        <input type="number" class="form-control  @error('Quantity') is-invalid @enderror" name="Quantity" 
                        placeholder="0" min=0  value="{{ old('Quantity') }}">
                        @error('Quantity')
                         <span class="invalid-feedback">{{ $message }}</span>
                         @enderror
                    </div>

                    <div class=" mb-3">
                      <div class="form-label">Unit</div>
                      <select class="form-select  " name="Unit" >
                        <option value="Pcs">Pcs</option>
                        <option value="Satuan">Satuan</option>
                        <option value="Set">Set</option>
                        <option value="Unit">Unit</option>
                        <option value="Roll">Roll</option>
                        <option value="Zak">Zak</option>
                        <option value="Can">Can</option>
                        <option value="Pail">Pail</option>
                        <option value="Liter">Liter</option>
                      </select>

                    <div class="mb-3">
                        <label for="Safety_Stock" class="form-label">Safety Stock</label>
                        <input type="number" class="form-control @error('Safety_Stock')
                        is-invalid
                      @enderror" name="Safety_Stock" 
                            min=0 placeholder="0" value="{{ old('Safety_Stock') }}">
                            @error('Safety_Stock')
                         <span class="invalid-feedback">{{ $message }}</span>
                         @enderror
                    </div>
                    
                     <div class="mb-3">
                        <label for="Harga" class="form-label">Harga</label>
                        <input type="number" class="form-control @error('Harga')
                        is-invalid @enderror" name="Harga" 
                            min=0 placeholder="0" value="{{ old('Harga') }}"> @error('Harga')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                      </div>
                    
                    <div class="mb-3">
                        <label for="Maximum_stok" class="form-label">Maximum Stock</label>
                        <input type="number" class="form-control @error('Maximum_Stock')
                        is-invalid @enderror" name="Maximum_Stock" 
                            min=0 placeholder="0" value="{{ old('Maximum_Stock') }}"> 
                            @error('Maximum_Stock')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                    </div>
                    
                    <div class="mb-3">
                        <input type="submit" value="Simpan" class="btn btn-primary">
                    </div>
              </div>
        </form>

    </div>
</div>
@endsection