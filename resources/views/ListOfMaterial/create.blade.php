@extends('layouts.master')
@php
    $titles = 'QC - List of Material';
    $title = 'Q-LIS |Create New Material';
    $pretitle = 'LIMS';
    $pages = $title;
@endphp
@section('title', $pages)
@section('content')
    <div class="mx-2 mt-2">
        <h4 class="mb-2">Create New Material </h4>
    </div>


    <div class="card ">
        <div class="card-body " style="background-color: rgb(230, 225, 225);">
            <form action="{{ route('Barang.store') }}" class="" method="post">

                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Name of Material</label>
                        <input type="text" name="Name_of_Material" class="form-control @error('Name_of_Material')
                        is-invalid @enderror"name="example-text-input" placeholder="Input here" value="{{ old('Name_of_Material') }}">
                        @error('Name_of_Material')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">CAS Number</label>
                        <input type="text" name="CAS_Number" class="form-control @error('CAS_Number')
                        is-invalid @enderror"name="example-text-input" placeholder="Input here" value="{{ old('CAS_Number') }}">
                        @error('CAS_Number')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">Material Code</label>
                        <select name="Material_Code" id="Material_Code"
                            class="form-select @error('Material_Code')is-invalid @enderror"name="example-text-input"
                            placeholder="Leave blank if new material" value="{{ old('Material_Code') }}">
                            <option value="">Automatically Generate Code Material</option>
                            @foreach ($barang as $item)
                                <option value="{{ $item->Material_Code }}"
                                    @if (old('Material_Code') == $item->Material_Code) selected @endif>
                                    {{ $item->Material_Code }}
                            @endforeach
                        </select>
                        @error('Material_Code')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="col-md-6">
                        <div class="form-label">Type of Budget</div>
                        <select class="form-select @error('Type_of_Budget') is-invalid @enderror" name="Type_of_Budget">
                            <option value="">Select</option>
                            <option value="Maintenance" {{ old('Type_of_Budget') === 'Maintenance' ? 'selected' : '' }}>
                                Maintenance</option>
                            <option value="Product Research and Development"
                                {{ old('Type_of_Budget') === 'Product Research and Development' ? 'selected' : '' }}>Product
                                Research and Development</option>
                            <option value="Supporting Material"
                                {{ old('Type_of_Budget') === 'Supporting Material' ? 'selected' : '' }}>Supporting Material
                            </option>
                            <option value="Manufacturing Supply"
                                {{ old('Type_of_Budget') === 'Manufacturing Supply' ? 'selected' : '' }}>Manufacturing
                                Supply</option>
                        </select>
                        @error('Type_of_Budget')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="col-md-6">
                        <div class="form-label">Type of Material</div>
                        <select class="form-select @error('Type_of_Material') is-invalid @enderror" name="Type_of_Material">
                            <option value="">Select</option>
                            <option value="Column" {{ old('Type_of_Material') === 'Column' ? 'selected' : '' }}>Column
                            </option>
                            <option
                                value="Sparepart Instrument"{{ old('Type_of_Material') === 'Sparepart Instrument' ? 'selected' : '' }}>
                                Sparepart Instrument</option>
                            <option
                                value="Service Charge"{{ old('Type_of_Material') === 'Service Charge' ? 'selected' : '' }}>
                                Service Charge</option>
                            <option
                                value="Reference Standard"{{ old('Type_of_Material') === 'Reference Standard' ? 'selected' : '' }}>
                                Reference Standard</option>
                            <option
                                value="Working Standard"{{ old('Type_of_Material') === 'Working Standard' ? 'selected' : '' }}>
                                Working Standard</option>
                            <option
                                value="Bacteria/Yeast and Mold Standard"{{ old('Type_of_Material') === 'Bacteria/Yeast and Mold Standard' ? 'selected' : '' }}>
                                Bacteria / Yeast and Mold Standard</option>
                            <option
                                value="External Laboratory"{{ old('Type_of_Material') === 'External Laboratory' ? 'selected' : '' }}>
                                External Laboratory</option>
                            <option
                                value="Liquid Reagent"{{ old('Type_of_Material') === 'Liquid Reagent' ? 'selected' : '' }}>
                                Liquid Reagent</option>
                            <option
                                value="Solid Reagent"{{ old('Type_of_Material') === 'Solid Reagent' ? 'selected' : '' }}>
                                Solid Reagent</option>
                            <option
                                value="Microbiology Reagent"{{ old('Type_of_Material') === 'Microbiology Reagent' ? 'selected' : '' }}>
                                Microbiology Reagent</option>
                            <option
                                value="Microbiology Media"{{ old('Type_of_Material') === 'Microbiology Media' ? 'selected' : '' }}>
                                Microbiology Media</option>
                            <option value="Glassware" {{ old('Type_of_Material') === 'Glassware' ? 'selected' : '' }}>
                                Glassware</option>
                            <option
                                value="General Usage"{{ old('Type_of_Material') === 'General Usage' ? 'selected' : '' }}>
                                General Usage</option>
                        </select>
                        @error('Type_of_Material')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Packing Size</label>
                        <input type="number" name="packingsize"
                            class="form-control 
                        @error('packingsize')
                        is-invalid
                      @enderror"
                            placeholder="Input here" value="{{ old('packingsize') }}">
                        @error('packingsize')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class=" col-md-6">
                        <div class="form-label">Packing Size Unit</div>
                        <select class="form-select @error('packingsize_unit') is-invalid @enderror" name="packingsize_unit">
                            <option value="">Select</option>
                            <option value="mL" {{ old('packingsize_unit') === 'mL' ? 'selected' : '' }}>mL</option>
                            <option value="mg" {{ old('packingsize_unit') === 'mg' ? 'selected' : '' }}>mg</option>
                            <option value="gram" {{ old('packingsize_unit') === 'gram' ? 'selected' : '' }}>gram</option>
                            <option value="liter" {{ old('packingsize_unit') === 'liter' ? 'selected' : '' }}>liter
                            </option>
                            <option value="stick" {{ old('packingsize_unit') === 'stick' ? 'selected' : '' }}>stick
                            </option>
                            <option value="pcs" {{ old('packingsize_unit') === 'pcs' ? 'selected' : '' }}>pcs</option>
                            {{-- <option value="Lembar" {{ old('packingsize_unit') === 'Lembar' ? 'selected' : '' }}>Lembar</option>
                          <option value="box" {{ old('packingsize_unit') === 'box' ? 'selected' : '' }}>box</option>
                       
                          <option value="Botol" {{ old('packingsize_unit') === 'Botol' ? 'selected' : '' }}>Botol</option>
                          <option value="rack" {{ old('packingsize_unit') === 'rack' ? 'selected' : '' }}>rack</option> --}}
                        </select>
                        @error('packingsize_unit')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Manufacture</label>
                        <input type="text" name="Manufaktur"
                            class="form-control 
                        @error('Manufaktur') is-invalid @enderror"
                            name="example-text-input" placeholder="Input here" value="{{ old('Manufaktur') }}">
                        @error('Manufaktur')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="col-md-6">
                        <label for="safety_stok" class="form-label">Catalog Number</label>
                        <input type="text"
                            class="form-control @error('Catalog_Number')
                        is-invalid @enderror"
                            name="Catalog_Number" placeholder="0" value="{{ old('Catalog_Number') }}">
                        @error('Catalog_Number')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>



                    <div class=" col-md-6">
                        <div class="form-label">Unit</div>
                        <select class="form-select @error('Unit') is-invalid @enderror" name="Unit">
                            <option value="">Select</option>
                            <option value="pack" {{ old('Unit') === 'pack' ? 'selected' : '' }}>pack</option>
                            <option value="stick" {{ old('Unit') === 'stick' ? 'selected' : '' }}>stick</option>
                            <option value="Vial" {{ old('Unit') === 'Vial' ? 'selected' : '' }}>Vial</option>
                            <option value="Lembar" {{ old('Unit') === 'Lembar' ? 'selected' : '' }}>Lembar</option>
                            <option value="box" {{ old('Unit') === 'box' ? 'selected' : '' }}>box</option>
                            <option value="pcs" {{ old('Unit') === 'pcs' ? 'selected' : '' }}>pcs</option>
                            <option value="Botol" {{ old('Unit') === 'Botol' ? 'selected' : '' }}>Botol</option>
                            <option value="rack" {{ old('Unit') === 'rack' ? 'selected' : '' }}>rack</option>
                        </select>
                        @error('Unit')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>




                    <div class="col-md-6">
                        <label for="Harga" class="form-label">Prices</label>
                        <input type="number"
                            class="form-control @error('Harga')
                        is-invalid @enderror"
                            name="Harga" min=0 placeholder="0" value="{{ old('Harga') }}"> @error('Harga')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="Safety_Stock" class="form-label">Safety Stock</label>
                        <input type="number"
                            class="form-control @error('Safety_Stock')
                        is-invalid
                      @enderror"
                            name="Safety_Stock" min=0 placeholder="0" value="{{ old('Safety_Stock') }}">
                        @error('Safety_Stock')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="Maximum_stok" class="form-label">Maximum Stock</label>
                        <input type="number"
                            class="form-control @error('Maximum_Stock')
                        is-invalid @enderror"
                            name="Maximum_Stock" min=0 placeholder="0" value="{{ old('Maximum_Stock') }}">
                        @error('Maximum_Stock')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>


                    {{-- <div class=" col-md-6">
                        <div class="form-label">Movement Category</div>
                        <select class="form-select @error('category') is-invalid @enderror" name="category">
                            <option value="">Select</option>
                            <option value="Fast" {{ old('category') === 'Fast' ? 'selected' : '' }}>Fast</option>
                            <option value="Slow" {{ old('category') === 'Slow' ? 'selected' : '' }}>Slow</option>
                        </select>
                        @error('category')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div> --}}


                    <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                        <input type="submit" value="Save" class="btn btn-primary">
                    </div>
                </div>

            </form>

        </div>
    </div>



@stop
@push('js')
    <script>
        $(document).ready(function() {
            $('#Material_Code').select2({
                theme: "bootstrap-5",
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' :
                    'style',
                placeholder: $(this).data('placeholder'),
                closeOnSelect: true,
                tags: true,
                selectionCssClass: 'select2--small',
                dropdownCssClass: 'select2--small',
            });
            $(document).on("select2:open", () => {
                document.querySelector(".select2-container--open .select2-search__field").focus()
            });
        });
    </script>
@endpush
