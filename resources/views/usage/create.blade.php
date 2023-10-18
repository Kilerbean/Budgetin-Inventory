@extends('layouts.master')
@php
    $titles = 'Q-LIS - List of Material';
    $title = 'Q-LIS |Create Material Usage';
    $pretitle = 'Create New Data';
    $pages = $title;
@endphp
@section('title', $pages)
@section('content')
    <div class="row">
        <div class="col">
            <a class="btn btn-info btn-sm" href="{{ route('usage.index') }}">
                <i class="fa fa-clipboard-list"></i><i class="fa fa-turn-down"></i> List Material Usage
            </a>
            <a class="btn btn-primary text-white btn-sm" href="{{ route('usage.index') }}"> Back</a>
        </div>
    </div>
    <div class="mx-2 mt-2">
        <h4 class="mb-2">Add New Material Usage </h4>
    </div>
    <div class="card" style="background-color: rgb(230, 225, 225);">
        <div class="card-body">
            <form action="{{ route('usage.store') }}" method="POST">
                @csrf                
                    <div class="row">
                        <div class="col-12 ">
                            <div class="form-label"><strong>Catalog Number - Material Name</strong></div>
                            <select class="form-select" name="Catalog_Number" id="Catalog_Number">
                                <option value="">Click to search for materials</option>
                                @foreach ($uniqueIncomes as $row)
                                    <option value="{{ $row->Catalog_Number }}"
                                        @if (old('Catalog_Number') == $row->Catalog_Number) selected @endif>
                                        {{ $row->Catalog_Number }} - {{ $row->Name_of_Material }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-8 mb-2">
                            <div class="form-label"><strong>Batch Number</strong></div>

                            <select class="form-select" name="no_batch" id="no_batch">
                                @if (old('no_batch'))
                                    <option value="{{ old('no_batch') }}" selected>{{ old('no_batch') }}</option>
                                @endif
                            </select>
                        </div>
                        
                        <div class="col-4 md-4">
                            <div class="form-label"><strong>Open By </strong></div>
                            <select class="form-select" name="Open_By" id="Open_By">
                                <option value="">Click to search for Name Analyst</option>
                                @foreach ($openby as $row)
                                    <option value="{{ $row->name }}"
                                        @if (old('Open_By') == $row->name) selected @endif>
                                        {{ $row->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-md-2">
                            <div class="form-group">
                                <div class="form-label"><strong>Quantity</strong></div>

                                <input class="form-control" type="number" name="Quantity" placeholder="Input here"
                                    value="{{ old('Quantity') }}">
                            </div>
                        </div>
                        {{-- <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-label"><strong>Open By</strong></div>
                                <input class="form-control" name="Open_By" placeholder="Input name here"
                                    value="{{ old('Open_By') }}">
                            </div>
                        </div> --}}
                        <div class="col-4 md-3">
                            <div class="form-label">Usage</div>
                            <select class="form-select" name="usage">
                                <option value="">Select</option>
                                <option value="Usage for analysis" {{ old('usage') === 'Usage for analysis' ? 'selected' : '' }}>Usage for analysis</option>
                                <option value="Usage by other departement" {{ old('usage') === 'Usage by other departement' ? 'selected' : '' }}>Usage by other departement</option>
                            </select>
                        </div>


                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>

                
            </form>
        </div>
    </div>

    <div class="card" style="height: 1000"></div>
    {{-- <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom border-danger">
    </div>
    <br>
    @include('usage.listusage') --}}


@stop
@push('js')
    <!-- JavaScript untuk mengambil nomor batch -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#Catalog_Number').on('change', function() {
                var selectedCatalog = $(this).val();
                if (selectedCatalog) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '/get-batches/' + selectedCatalog,
                        type: 'GET',

                        dataType: 'json',
                        success: function(data) {
                            $('#no_batch').empty();
                            var len = 0;
                            if (data != null) {
                                len = data.batches.length;
                            }

                            if (len > 0) {
                                // Read data and create <option >
                                for (var i = 0; i < len; i++) {

                                    var batch = data.batches[i].no_batch;
                                    var stok = Math.round(data.batches[i].Quantity);
                                    var expired = moment(data.batches[i].Expire_Date).format(
                                        'DD-MMM-YYYY');

                                    var option = "<option value='" + batch + "'>" + batch +
                                        " | Stok = " + stok + " | Expired = " + expired +
                                        "</option>";

                                    $("#no_batch").append(option);
                                }
                            }
                        }
                    })
                } else {
                    $('#no_batch').empty();
                }

            });
        });
    </script>
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
            var table = $('#listlow,#lis,#listlowss').DataTable();
        });
    </script>
@endpush
