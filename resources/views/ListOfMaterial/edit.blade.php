@extends('layouts.master')
@php
    $titles = 'QC - List of Material';
    $title = 'Edit Material Stock';
    $pretitle = 'EDIT';
    $pages = $title;
@endphp
@section('title', $pages)
@section('content')
    <div class="row">
        <div class="col">
            <label class="form-label h5"> Status Material : {{ $barang->Status == 1 ? 'Active' : 'Inactive' }}

            </label>
            <a class="btn btn-danger btn-sm" href="{{ route('nonaktif', $barang->id) }}"{{ $barang->Status ? '' : 'hidden' }}
                title="Deactivate Material"> <i class="fa fa-pen"></i> Deactivate</a>
            <a class="btn btn-primary btn-sm" href="{{ route('aktif', $barang->id) }}"{{ $barang->Status ? 'hidden' : '' }}
                title="Activate Material"> <i class="fa fa-pen"></i> Activate</a>
        </div>
    </div>
    <div class="mx-2 mt-2">
        <h4 class="mb-2">Edit Material Stock</h4>
    </div>

    <div class="card " style="background-color: rgb(230, 225, 225);">
        <div class="card-body ">
            <form action="{{ route('Barang.update', $barang->id) }}" class="" method="post">

                @csrf
                @method('PUT')

                <label class="form-label"> Stock Quantity : {{ $barang->Quantity }} </label>



                <br>
                <div class="mb-3">
                    <label class="form-label">Code Material</label>
                    <input type="text" name="Material_Code" class="form-control"
                        value="{{ old('Material_Code', $barang->Material_Code) }}">
                </div>

                <div class="mb-3">
                    <div class="form-label">Type of Budget</div>
                    <select class="form-select" name="Type_of_Budget">
                        <option value="Maintenance"
                            {{ old('Type_of_Budget', $barang->Type_of_Budget) === 'Maintenance' ? 'selected' : '' }}>
                            Maintenance</option>
                        <option value="Product Research and Development"
                            {{ old('Type_of_Budget', $barang->Type_of_Budget) === 'Product Research and Development' ? 'selected' : '' }}>
                            Product Research and Development</option>
                        <option value="Supporting Material"
                            {{ old('Type_of_Budget', $barang->Type_of_Budget) === 'Supporting Material' ? 'selected' : '' }}>
                            Supporting Material</option>
                        <option value="Manufacturing Supply"
                            {{ old('Type_of_Budget', $barang->Type_of_Budget) === 'Manufacturing Supply' ? 'selected' : '' }}>
                            Manufacturing Supply</option>
                    </select>
                </div>

                <div class="mb-3">
                    <div class="form-label">Type of Material</div>
                    <select class="form-select" name="Type_of_Material">
                        <option value="Column"
                            {{ old('Type_of_Material', $barang->Type_of_Material) === 'Column' ? 'selected' : '' }}>Column
                        </option>
                        <option value="Sparepart Instrument"
                            {{ old('Type_of_Material', $barang->Type_of_Material) === 'Sparepart Instrument' ? 'selected' : '' }}>
                            Spare Part Instrument</option>
                        <option value="Service Charge"
                            {{ old('Type_of_Material', $barang->Type_of_Material) === 'Service Charge' ? 'selected' : '' }}>
                            Service Charge</option>
                        <option value="Reference Standard"
                            {{ old('Type_of_Material', $barang->Type_of_Material) === 'Reference Standard' ? 'selected' : '' }}>
                            Reference Standard</option>
                        <option value="Working Standard"
                            {{ old('Type_of_Material', $barang->Type_of_Material) === 'Working Standard' ? 'selected' : '' }}>
                            Working Standard</option>
                        <option value="Bacteria/Yeast and Mold Standard"
                            {{ old('Type_of_Material', $barang->Type_of_Material) === 'Bacteria / Yeast and Mold Standard' ? 'selected' : '' }}>
                            Bacteria / Yeast and Mold Standard</option>
                        <option value="External Laboratory"
                            {{ old('Type_of_Material', $barang->Type_of_Material) === 'External Laboratory' ? 'selected' : '' }}>
                            External Laboratory</option>
                        <option value="Liquid Reagent"
                            {{ old('Type_of_Material', $barang->Type_of_Material) === 'Liquid Reagent' ? 'selected' : '' }}>
                            Liquid Reagent</option>
                        <option value="Solid Reagent"
                            {{ old('Type_of_Material', $barang->Type_of_Material) === 'Solid Reagent' ? 'selected' : '' }}>
                            Solid Reagent</option>
                        <option value="Microbiology Reagent"
                            {{ old('Type_of_Material', $barang->Type_of_Material) === 'Microbiology Reagent' ? 'selected' : '' }}>
                            Microbiology Reagent</option>
                        <option value="Microbiology Media"
                            {{ old('Type_of_Material', $barang->Type_of_Material) === 'Microbiology Media' ? 'selected' : '' }}>
                            Microbiology Media</option>
                        <option value="Glassware"
                            {{ old('Type_of_Material', $barang->Type_of_Material) === 'Glassware' ? 'selected' : '' }}>
                            Glassware</option>
                        <option value="General Usage"
                            {{ old('Type_of_Material', $barang->Type_of_Material) === 'General Usage' ? 'selected' : '' }}>
                            General Usage</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Name of Material</label>
                    <input type="text" name="Name_of_Material" class="form-control"
                        value="{{ old('Name_of_Material', $barang->Name_of_Material) }}">
                </div>

                <div class="mb-3">
                    <label for="Catalog_Number" class="form-label">Catalog Number</label>
                    <input type="text" class="form-control" name="Catalog_Number"
                        value="{{ old('Catalog_Number', $barang->Catalog_Number) }}">
                </div>

                <div class="mb-3">
                    <label for="packingsize" class="form-label">Packing size</label>
                    <input type="text" class="form-control" name="packingsize"
                        value="{{ old('packingsize', $barang->packingsize) }}">
                </div>

                <div class="mb-3">
                    <div class="form-label">Packing Size Unit</div>
                    <select class="form-select" name="packingsize_unit">
                        <option value="mL"
                            {{ old('packingsize_unit', $barang->packingsize_unit) === 'mL' ? 'selected' : '' }}>mL</option>
                        <option value="gram"
                            {{ old('packingsize_unit', $barang->packingsize_unit) === 'gram' ? 'selected' : '' }}>gram
                        </option>
                        <option value="Lb"
                            {{ old('packingsize_unit', $barang->packingsize_unit) === 'Lb' ? 'selected' : '' }}>Lb</option>
                        <option value="pcs"
                            {{ old('pcsingsize_unit', $barang->pcsingsize_unit) === 'pcs' ? 'selected' : '' }}>pcs</option>
                        <option value="stick"
                            {{ old('packingsize_unit', $barang->packingsize_unit) === 'stick' ? 'selected' : '' }}>stick
                        </option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="Manufaktur" class="form-label">Manufaktur</label>
                    <input type="text" class="form-control" name="Manufaktur"
                        value="{{ old('Manufaktur', $barang->Manufaktur) }}">
                </div>

                <div class="mb-3">
                    <div class="form-label">Unit</div>
                    <select class="form-select" name="Unit">

                        <option value="pack" {{ old('Unit', $barang->Unit) === 'pack' ? 'selected' : '' }}>pack</option>
                        <option value="stick" {{ old('Unit', $barang->Unit) === 'stick' ? 'selected' : '' }}>stick
                        </option>
                        <option value="Vial" {{ old('Unit', $barang->Unit) === 'Vial' ? 'selected' : '' }}>Vial</option>
                        <option value="Lembar" {{ old('Unit', $barang->Unit) === 'Lembar' ? 'selected' : '' }}>Lembar
                        </option>
                        <option value="box" {{ old('Unit', $barang->Unit) === 'box' ? 'selected' : '' }}>box</option>
                        <option value="pcs" {{ old('Unit', $barang->Unit) === 'pcs' ? 'selected' : '' }}>pcs</option>
                        <option value="Botol" {{ old('Unit', $barang->Unit) === 'Botol' ? 'selected' : '' }}>Botol
                        </option>
                        <option value="rack" {{ old('Unit', $barang->Unit) === 'rack' ? 'selected' : '' }}>rack</option>
                    </select>
                </div>

                <div class="mb-3" hidden>
                    <label for="Quantity" class="form-label">Quantity </label>
                    <input type="number" class="form-control" name="Quantity" placeholder="0" min=0
                        value="{{ $barang->Quantity }}">
                </div>
                <div class="mb-3">
                    <label for="Safety_Stock" class="form-label">Safety Stock</label>
                    <input type="number" class="form-control" name="Safety_Stock" min="0"
                        value="{{ old('Safety_Stock', $barang->Safety_Stock) }}">
                </div>

                <div class="mb-3">
                    <label for="Harga" class="form-label">Prices</label>
                    <input type="number" class="form-control" name="Harga" min="0"
                        value="{{ old('Harga', $barang->Harga) }}">
                </div>

                <div class="mb-3">
                    <label for="Maximum_Stock" class="form-label">Maximum Stock</label>
                    <input type="number" class="form-control" name="Maximum_Stock" min="0"
                        value="{{ old('Maximum_Stock', $barang->Maximum_Stock) }}">
                </div>

                <div class="mb-3">
                    <div class="form-label">Movement Category</div>
                    <select class="form-select" name="category">

                        <option value="Slow" {{ old('category', $barang->category) === 'Slow' ? 'selected' : '' }}>Slow</option>
                        <option value="Fast" {{ old('category', $barang->category) === 'Fast' ? 'selected' : '' }}>Fast</option>
                    </select>
                </div>

                <br>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                    <input type="submit" value="Save" class="btn btn-primary">
                </div>
            </form>

        </div>
    </div>
@stop
