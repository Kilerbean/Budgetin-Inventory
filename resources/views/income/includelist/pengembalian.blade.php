@extends('layouts.master')
@php
    $titles = 'Q_LIS - List of Material';
    $title = 'Q-LIS | Create Purchasing Material';
    $pretitle = 'Create New';
    $pages = $title;
@endphp
@section('title', $pages)
@section('content')
    <div class="row">
        <div class="col">
        <a class="btn btn-primary btn-sm" href="{{ route('income.create') }}"> Back</a>
        </div>
    </div>
    <div class="mx-2 mt-2">
        <h4 class="mb-2">Material Return</h4>
    </div>

    <div class="card" style="background-color: rgb(230, 225, 225);">
        <div class="card-body">
            <form action="{{ route('pengebalian.store') }}" method="POST">
                @csrf
                <div class="row">
                    
                    <div class="mb-3">
                        <div class="form-group">
                            <div class="form-label"><strong>Catalog Number | Material Name - Type of Material |Manufacture |Packing Size</strong></div>
                            <select class="form-control" name="Catalog_Number" id="Catalog_Number">
                                <option value="">Click to search for materials</option>
                                @foreach ($barang as $row)
                                    <option value="{{ $row->Catalog_Number }}"
                                        @if (old('Catalog_Number') == $row->Catalog_Number) selected @endif>
                                        {{ $row->Catalog_Number }} | {{ $row->Name_of_Material }} - 
                                        {{ $row->Type_of_Material }} |Manufacture: {{ $row->Manufaktur }} |
                                        {{ $row->packingsize }} {{ $row->packingsize_unit }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                     <div class="col-md-3">
                        <div class="form-group">
                            <div class="form-label"><strong>Propose</strong></div>
                            <input type="text" name="Propose" class="form-control" placeholder="Input name here"
                                value="{{ old('Propose') }}">
                        </div>
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
                            <div class="form-label"><strong>No PR</strong></div>                            
                            <input type="text" name="No_PR" class="form-control" placeholder="Input No PR here"
                                value="{{ old('No_PR') }}">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="form-label"><strong>No PO</strong></div>
                            <input class="form-control" name="No_PO" placeholder="Input " value="{{ old('No_PO') }}">
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="form-label">  <strong>No batch</strong></div>
                            <input class="form-control" type="text" name="no_batch" placeholder="Input no batch " value="{{ old('no_batch') }}">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="form-label"><strong>Quantity</strong></div>  
                            <input class="form-control" type="number" name="Quantity" placeholder="Input quantity"
                                value="{{ old('Quantity') }}">
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="form-label"><strong>Expire Date</strong></div>
                            <input class="form-control" type="date" name="Expire_Date" placeholder="Input "
                                value="{{ old('Expire_Date') }}">
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
