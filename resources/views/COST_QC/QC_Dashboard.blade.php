@extends('layouts.master')
@php
    $title = 'Dashboard';
    $pretitle = 'COST | QC LAB';
    $pages = $title;
@endphp
@section('title', $pages)
@section('content')
<div class="container-fluid p-0">
    <h1><img {{-- class="slide-fwd-top" --}} src="icon/Cost_lab-removebg-preview.png" alt="Unsplash" style="width: 50px">
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




    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header text-center mb-4">
                    <p class="card-text" style="font-size: 15px;">Maintenance
                    </p>
                </div>
                <div class="text-center">
                    <img class="card-img-top" src="icon/maintenance.png" alt="Lumens Icon" style="width: 60px">
                </div>
                <div class="px-4">
                    <strong>Actual <span class="px-1">: IDR {{ number_format($totalactual1,0, '.', ',') }}</span></strong>
                </div>
                <div class="px-4">
                    <span class="{{ $colorClass1 }}"> Budget <span class="px-0">: IDR {{ number_format($totalbudget1,0, '.', ',') }}</span> </span>
                </div>
                <a class="btn btn-info btn-sm" href="{{ route('Maintenance') }}"><i class="fa fa-calendar-days"></i>
                    Detail Budget</a>
            </div>


        </div>

        <div class="col-md-3">
            <div class="card" style="height: ">
                <div class="card-header text-center mb-4">
                    <p class="card-text" style="font-size: 15px;">Research & Development</p>
                </div>                
                <div class="text-center">
                    <img class="card-img-top" src="icon/research-and-development.png" alt="Lumens Icon" style="width: 60px">
                </div>
                <div class="px-4">
                    <strong>Actual <span class="px-1">: IDR {{ number_format($totalactual2,0, '.', ',') }}</span></strong>
                </div>
                <div class="px-4">
                    <span class="{{ $colorClass2 }}"> Budget <span class="px-0">: IDR {{ number_format($totalbudget2,0, '.', ',') }}</span> </span>
                </div>
                <a class="btn btn-info btn-sm" href="{{ route('Product') }}"> <i class="fa fa-calendar-days"></i> Detail
                    Budget</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header text-center mb-4">
                    <p class="card-text"style="font-size: 15px;">Supporting Material
                    </p>
                </div>                
                <div class="text-center">
                    <img class="card-img-top" src="icon/material-management.png" alt="Lumens Icon" style="width: 60px">
                </div>
                <div class="px-4">
                    <strong>Actual <span class="px-1">: IDR {{ number_format($totalactual3,0, '.', ',') }}</span></strong>
                </div>
                <div class="px-4">
                    <span class="{{ $colorClass3 }}"> Budget <span class="px-0">: IDR {{ number_format($totalbudget3,0, '.', ',') }}</span> </span>
                </div>
                <a class="btn btn-info btn-sm" href="{{ route('Supporting') }}"><i class="fa fa-calendar-days"></i> Detail
                    Budget</a>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header text-center mb-4">
                    <p class="card-text" style="font-size: 15px;">Manufacturing Supply
                    </p>
                </div>                
                <div class="text-center">
                    <img class="card-img-top" src="icon/supply-chain.png" alt="Lumens Icon" style="width: 60px">
                </div>
                <div class="px-4">
                    <strong>Actual <span class="px-1">: IDR {{ number_format($totalactual4,0, '.', ',') }}</span></strong>
                </div>
                <div class="px-4">
                    <span class="{{ $colorClass4 }}"> Budget <span class="px-0">: IDR {{ number_format($totalbudget4,0, '.', ',') }}</span> </span>
                </div>
                <a class="btn btn-info btn-sm" href="{{ route('Manufacturing') }}"><i class="fa fa-calendar-days"></i>
                    Detail Budget</a>
            </div>
        </div>

        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-0 pb-2 mb-1 border-bottom border-danger">
        </div>

        @include('COST_QC.listmaterial.listmateriallow')
        <br>
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom border-danger">
        </div>
        <br>
        @include('COST_QC.listmaterial.listmaterialbelumditerima')
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom border-danger">
        </div>
        <br>
        @include('COST_QC.listmaterial.listmaterialmauexpire')
        <br>
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom border-danger">
        </div>
        <br>
    </div>
    @include('COST_QC.listmaterial.opname')






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
