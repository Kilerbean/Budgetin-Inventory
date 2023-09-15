@extends('templates.dasar')
@php
    $title = 'Material Usage';
    $pretitle = 'Create New Data';
@endphp
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/js/select2.min.js"></script>

@push('page-action')
    <a class="btn btn-info btn-sm" href="{{ route('usage.index') }}">
        <i class="fa fa-clipboard-list"></i><i class="fa fa-turn-down"></i> List Material Usage
    </a>
@endpush

@section('coba')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div>
                <h2>Add New Material Usage</h2>
            </div>
            <div>
                <a class="btn btn-grad text-white" href="{{ route('usage.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <form action="{{ route('usage.store') }}" method="POST">
        @csrf
        <div class="card" style="background-color: rgb(230, 225, 225);">
            <div class="row">
                <div class="mb-3">
                    <strong>| Catalog Number | Material Name</strong>
                    <select class="form-select" name="Catalog_Number" id="Catalog_Number">
                        <option value="">Click to search for materials</option>
                        @foreach ($uniqueIncomes as $row)
                            <option value="{{ $row->Catalog_Number }}" @if(old('Catalog_Number') == $row->Catalog_Number) selected @endif>
                                {{ $row->Catalog_Number }} | {{ $row->Name_of_Material }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="mb-3">
                    <strong>Batch Number</strong>
                    <select class="form-select" name="no_batch" id="no_batch">
                        @if(old('no_batch'))
                            <option value="{{ old('no_batch') }}" selected>{{ old('no_batch') }}</option>
                        @endif
                    </select>
                </div>
            </div>
            <!-- ... -->


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

            <div class="col-md-4">
                <div class="form-group">
                    <strong>Quantity</strong>
                    <input class="form-control" type="number" name="Quantity" placeholder="Input here"
                        value="{{ old('Quantity') }}">
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <strong>Open By</strong>
                    <input class="form-control" name="Open_By" placeholder="Input name here" value="{{ old('Open_By') }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                <button type="submit" class="btn btn-success">Save</button>
            </div>

    </form>
    </div>
    </div>

    <br>
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom border-danger">
    </div>
    <br>
    @include('usage.listusage')

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
@endsection
