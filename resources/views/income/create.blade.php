@extends('layouts.master')
@php
    $titles = 'QC - List of Material';
    $title = 'Add New Purchasing Material';
    $pretitle = 'Create New';
    $pages = $title;
@endphp
@section('title', $pages)
@section('content')
    <div class="row">
        <div class="col">
            <a class="btn btn-info btn-sm" href="{{ route('income.index') }}"><i class="fa fa-clipboard-list"></i><i
                    class="fa fa-turn-up"></i> List of Incoming Material</a>
            <a class="btn btn-primary btn-sm" href="{{ route('income.index') }}"> Back</a>
        </div>
    </div>
    <div class="mx-2 mt-2">
        <h4 class="mb-2">Add New Purchasing Material </h4>
    </div>

    <div class="card" style="background-color: rgb(230, 225, 225);">
        <div class="card-body">
            <form action="{{ route('income.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="mb-3">
                        <div class="form-group">
                            <div class="form-label"><strong>Catalog Number | Material Name - Type of Material | Packing Size</strong></div>
                            
                            <select class="form-control" name="Catalog_Number" id="Catalog_Number">
                                <option value="">Click to search for materials</option>
                                @foreach ($barang as $row)
                                    <option value="{{ $row->Catalog_Number }}"
                                        @if (old('Catalog_Number') == $row->Catalog_Number) selected @endif>
                                        {{ $row->Catalog_Number }} | {{ $row->Name_of_Material }} - 
                                        {{ $row->Type_of_Material }} |
                                        {{ $row->packingsize }} {{ $row->packingsize_unit }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="form-label">Propose</div>
                        <select class="form-select" name="Propose">
                            <option value="">Select</option>
                            <option value="routine" {{ old('Propose') === 'routine' ? 'selected' : '' }}>routine</option>
                            <option value="consumable part" {{ old('Propose') === 'consumable part' ? 'selected' : '' }}>
                                consumable part</option>
                            <option value="services" {{ old('Propose') === 'services' ? 'selected' : '' }}>services
                            </option>
                            <option value="calibration" {{ old('Propose') === 'calibration' ? 'selected' : '' }}>
                                calibration</option>
                            <option value="new" {{ old('Propose') === 'new' ? 'selected' : '' }}>new</option>
                            <option value="external testing" {{ old('Propose') === 'external testing' ? 'selected' : '' }}>
                                external testing</option>
                            <option value="assets" {{ old('Propose') === 'assets' ? 'selected' : '' }}>assets</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="form-label"><strong>Request By</strong></div>
                            <input type="text" name="request_by" class="form-control" placeholder="Input name here"
                                value="{{ old('request_by') }}">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="form-label"><strong>No PR:</strong></div>                            
                            <input type="text" name="No_PR" class="form-control" placeholder="Input No PR Here"
                                value="{{ old('No_PR') }}">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="form-label"><strong>Quantity</strong></div>  
                            <input class="form-control" type="number" name="Quantity" placeholder="input Quantity"
                                value="{{ old('Quantity') }}">
                        </div>
                    </div>

                    {{-- <div class="col-md-2">
                    <div class="form-group">
                        <strong>PR Date</strong>
                        <input class="form-control" type="date" name="PO_Date" placeholder=" input PO Date" value="{{ old('PO_Date') }}">
                    </div>
                </div> --}}
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <br>
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom border-danger">
    </div>
    <br>
    @include('COST_QC.listmaterial.listmaterialbelumditerima')


@stop
@push('js')
    <script>
        $(document).ready(function() {
            $('#Catalog_Number').select2({
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

    <script type="text/javascript">
        $(function() {
            var table = $('#listlow,#listlowss,#listlowq').DataTable({

            });
        });
    </script>
@endpush
