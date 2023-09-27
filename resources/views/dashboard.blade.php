@extends('layouts.master')
@php
    $title = 'HOME';
    $pages = $title;
    $pretitle = 'QC LAB';
    
@endphp
@section('title', $pages)
@push('css')
    <style>
        .collapsed {
            transition: none;
        }
    </style>
@endpush
@section('content')
    <div class="container-fluid p-0">
        <h1><img {{-- class="slide-fwd-top" --}} src="https://img.icons8.com/color/96/company.png" alt="Unsplash" style="width: 50px">
            <span {{-- class="slide-left" --}} style="display: inline-block"> Welcome to <strong>QC LAB</strong></span>
        </h1>
    </div>

    <div class="row">
        <div class="col-md-4" style="background-color: rgb(230, 229, 229);">
            <div class="card">
                <div class="card-header text-center">
                    <img class="card-img-top" src="icon/quality-control.png" alt="Unsplash" style="width: 15%">
                </div>
                <div class="text-center mb-2">
                    <h5 class="card-title mb-0">COST</h5>
                    <p class="card-text">QC-LAB</p>
                    <a href="{{ route('Dashboards') }}" class="btn btn-primary" title="Dashboard COST QC"><i
                            class="fa fa-house"></i></a>
                    <a href="{{ route('Barang.index') }}" class="btn btn-info" title="List of All Material"><i
                            class="fa-solid fa-boxes-stacked"></i></a>
                    <a href="{{ route('income.create') }}" class="btn btn-warning" title="Purchasing Material"><i
                            class="fa-solid fa-cart-shopping"></i></a>
                    <a href="{{ route('usage.create') }}" class="btn btn-success" title="Material Usage"><i
                            class="fa-solid fa-bag-shopping"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4" style="background-color: rgb(230, 229, 229);">
            <div class="card" >
                <div class="card-header text-center">
                    <img class="card-img-top" src="icon/clipboard.png" alt="Unsplash" style="width: 15%">
                </div>
                <div class="text-center mb-2">
                    <h5 class="card-title mb-0">Callibration</h5>
                    <p class="card-text">QC-LAB</p>
                    <a href="{{ route('Dashboards') }}" class="btn btn-primary" title="Dashboard COST QC"><i
                            class="fa fa-house"></i></a>
                    <a href="{{ route('Barang.index') }}" class="btn btn-info" title="List of All Material"><i
                            class="fa-solid fa-boxes-stacked"></i></a>
                    <a href="{{ route('income.create') }}" class="btn btn-warning" title="Purchasing Material"><i
                            class="fa-solid fa-cart-shopping"></i></a>
                    <a href="{{ route('usage.create') }}" class="btn btn-success" title="Material Usage"><i
                            class="fa-solid fa-bag-shopping"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4" style="background-color: rgb(230, 229, 229);">
            <div class="card" >
                <div class="card-header text-center">
                    <img class="card-img-top" src="icon/sparta-icon.png" alt="Unsplash" style="width: 15%">
                </div>
                <div class="text-center mb-2">
                    <h5 class="card-title mb-0">LIMS</h5>
                    <p class="card-text">EMPOWERING LAB</p>
                    <a href="{{ route('Dashboards') }}" class="btn btn-primary" title="Dashboard COST QC"><i
                            class="fa fa-house"></i></a>
                    {{-- <a href="{{ route('Barang.index') }}" class="btn btn-info" title="List of All Material"><i
                            class="fa-solid fa-boxes-stacked"></i></a>
                    <a href="{{ route('income.create') }}" class="btn btn-warning" title="Purchasing Material"><i
                            class="fa-solid fa-cart-shopping"></i></a>
                    <a href="{{ route('usage.create') }}" class="btn btn-success" title="Material Usage"><i
                            class="fa-solid fa-bag-shopping"></i> --}}
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4" style="background-color: rgb(230, 229, 229);">
            <div class="card" >
                <div class="card-header text-center">
                    <img class="card-img-top" src="icon/sparta-icon.png" alt="Unsplash" style="width: 10%">
                </div>
                <div class="text-center mb-2">
                    <h5 class="card-title mb-0">ICCS</h5>
                    <p class="card-text"></p>
                    <a href="{{ route('Dashboards') }}" class="btn btn-primary" title="Dashboard COST QC"><i
                            class="fa fa-house"></i></a>
                    {{-- <a href="{{ route('Barang.index') }}" class="btn btn-info" title="List of All Material"><i
                            class="fa-solid fa-boxes-stacked"></i></a>
                    <a href="{{ route('income.create') }}" class="btn btn-warning" title="Purchasing Material"><i
                            class="fa-solid fa-cart-shopping"></i></a>
                    <a href="{{ route('usage.create') }}" class="btn btn-success" title="Material Usage"><i
                            class="fa-solid fa-bag-shopping"></i> --}}
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4" style="background-color: rgb(230, 229, 229);">
            <div class="card" >
                <div class="card-header text-center">
                    <img class="card-img-top" src="icon/sparta-icon.png" alt="Unsplash" style="width: 10%">
                </div>
                <div class="text-center mb-2">
                    <h5 class="card-title mb-0">SMD</h5>
                    <p class="card-text"></p>
                    <a href="{{ route('Dashboards') }}" class="btn btn-primary" title="Dashboard COST QC"><i
                            class="fa fa-house"></i></a>
                    {{-- <a href="{{ route('Barang.index') }}" class="btn btn-info" title="List of All Material"><i
                            class="fa-solid fa-boxes-stacked"></i></a>
                    <a href="{{ route('income.create') }}" class="btn btn-warning" title="Purchasing Material"><i
                            class="fa-solid fa-cart-shopping"></i></a>
                    <a href="{{ route('usage.create') }}" class="btn btn-success" title="Material Usage"><i
                            class="fa-solid fa-bag-shopping"></i> --}}
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4" style="background-color: rgb(230, 229, 229);">
            <div class="card" >
                <div class="card-header text-center">
                    <img class="card-img-top" src="icon/sparta-icon.png" alt="Unsplash" style="width: 10%">
                </div>
                <div class="text-center mb-2">
                    <h5 class="card-title mb-0">Lumens</h5>
                    <p class="card-text"></p>
                    <a href="{{ route('Dashboards') }}" class="btn btn-primary" title="Dashboard COST QC"><i
                            class="fa fa-house"></i></a>
                    {{-- <a href="{{ route('Barang.index') }}" class="btn btn-info" title="List of All Material"><i
                            class="fa-solid fa-boxes-stacked"></i></a>
                    <a href="{{ route('income.create') }}" class="btn btn-warning" title="Purchasing Material"><i
                            class="fa-solid fa-cart-shopping"></i></a>
                    <a href="{{ route('usage.create') }}" class="btn btn-success" title="Material Usage"><i
                            class="fa-solid fa-bag-shopping"></i> --}}
                    </a>
                </div>
            </div>
        </div>
    </div>






    
@stop
@push('js')
    <script>
        $(document).ready(function() {
            var sidebar = document.getElementById("sidebar");
            sidebar.classList.add("collapsed");
        });
    </script>
@endpush
