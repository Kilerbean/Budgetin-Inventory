@extends('layouts.master')
@php
    $title = 'Q-LIS |Callibration | Dashboard ';
    $pretitle = 'Callibration | Q-LIS';
    $pages = $title;
@endphp
@section('title', $pages)
@section('content')
<div class="container-fluid p-0">
    <h1><img {{-- class="slide-fwd-top" --}} src="{{asset('icon/laboratory.png')}}" alt="Unsplash" style="width: 50px">
    <span {{-- class="slide-left" --}} style="display: inline-block">   Welcome to <strong>{{$pretitle}}</strong></span></h1>        
</div> 

    <a href="{{ route('Barang.Create') }}" class="btn btn-success btn-sm" style="padding-right: 46px"> <i
            class="fa fa-folder-plus"></i> Add New
        Material
    </a>
    <a class="btn btn-success btn-sm" href="{{ route('income.create') }}"> <i class="fa fa-cart-plus"></i> Add New
        Purchasing
        Material</a>
    <a class="btn btn-success btn-sm" href="{{ route('usage.create') }}"><i class="fa fa-plus"></i> New Material Usage</a>
    <a class="btn btn-info btn-sm" href="{{ route('income.index') }}"><i class="fa fa-clipboard-list"></i><i
            class="fa fa-turn-up"></i> List of Incoming Material</a>

    <a class="btn btn-info btn-sm" href="{{ route('usage.index') }}"> <i class="fa fa-clipboard-list"></i><i
            class="fa fa-turn-down"></i> List Material Usage</a>
    <a class="btn btn-info btn-sm" href="{{ route('Barang.index') }}"> <i class="fa fa-book"></i> List of All Material
    </a>
    @if (auth()->user()->leveluser > 2)
        <a class="btn btn-secondary btn-sm mt-1 mb-2" href="{{ route('laporanincome') }}"><i
                class="fa fa-file-arrow-up"></i>
            Incoming
            Material Report </a>
        <a class="btn btn-secondary btn-sm mt-1 mb-2" href="{{ route('laporanusage') }}" style="padding-right: 53px"> <i
                class="fa fa-file-arrow-down"></i>
            Material Usage Report</a>
    @endif









    @stop
@push('js')
    <script type="text/javascript">
        $(function() {
            var table = $('#listlow,#listlowss,#listlowws,#listlowq').DataTable({
                dom: 'lBftrip',
                buttons: [{
                        extend: 'copyHtml5',
                        exportOptions: {
                            columns: [':visible']
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [':visible']
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [':visible']
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [':visible']
                        }
                    },
                    {
                        extend: 'colvis',
                        text: "Hide / Show",
                        postfixButtons: ['colvisRestore']
                    }
                ],


            });
        });
    </script>
@endpush
