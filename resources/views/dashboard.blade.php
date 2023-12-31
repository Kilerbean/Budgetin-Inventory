@extends('layouts.master')
@php
    $title = 'Q-LIS | HOME ';
    $pages = $title;
    $pretitle = 'Q-LIS';
    
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

{{-- <div class="main" style="background-image: url('icon/asdf.png');background-position: center;
background-repeat: no-repeat; background-size: cover"> --}}

    <div class="container-fluid p-0">
        <h1>{{-- class="slide-fwd-top" --}} 
            <img src="{{ asset('icon/QLIS_logo.png') }}" alt="Unsplash" style="width: 50px">
            <span {{-- class="slide-left" --}} style="display: inline-block"> Welcome to <strong>Q-LIS</strong></span>
        </h1>
    </div>

    {{-- style="background-color: rgb(230, 225, 225)" --}}

    <div class="row ">
        <div class="card transparent-card  " ></div>
        <div class="col-md-4 " style=" padding-left:20px;">
                <div class="card" style="border-radius:20px" >
                    <div class="card-header text-center" style="border-radius:20px;height: 85px">
                        <img class="card-img-top" src="icon/Cost_lab-removebg-preview.png" alt="Unsplash"
                            style="width: 15%">
                    </div>
                    <div class="text-center mb-2">
                        <h5 class="card-title mb-0">EXPENSE</h5>
                        <p class="card-text">Q-LIS</p>
                        <a href="{{ route('Dashboards') }}" class="btn btn-primary" title="Dashboard EXPENSE QC"><i
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

        <div class="col-md-4" >
            <div class="card" style="border-radius:20px">
                <div class="card-header text-center" style="border-radius:20px;height: 85px">
                    <img class="card-img-top" src="icon/laboratory.png" alt="Unsplash" style="width: 15%">
                </div>
                <div class="text-center mb-2">
                    <h5 class="card-title mb-0">Callibration</h5>
                    <p class="card-text">Q-LIS</p>
                    <a href="{{ route('dashboard.kalibrasi') }}" class="btn btn-primary" title="Dashboard Calibration"><i
                            class="fa fa-house"></i></a>
                    <a href="{{ route('listKalibrasi') }}" class="btn btn-info" title="List of All Instrument"><i
                            class="fa-solid fa-boxes-stacked"></i></a>
                    <a href="{{ route('index.workorderlist') }}" class="btn btn-secondary" title="Work Order List"><i class="fa fa-clipboard-list"></i></a>

                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4" style="padding-right:20px;">
            <div class="card" style="border-radius:20px;">
                <div class="card-header text-center" style="border-radius:20px;height: 85px">
                    <img class="card-img-top" src="https://lims.sohoglobalhealth.com/assets/images/brand/logo-3.png"
                        alt="Unsplash" style="width: 40%">
                </div>
                <div class="text-center mb-2">
                    <h5 class="card-title mb-0">LIMS</h5>
                    <p class="card-text">EMPOWERING LAB</p>
                    <a href="https://lims.sohoglobalhealth.com" class="btn btn-primary" title="Dashboard EXPENSE QC"><i
                            class="fa fa-house"></i></a>

                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4 transparent-card" style="padding-top:30px;padding-left:20px;">
            <div class="card transparent-card" style="border-radius:20px">
                <div class="card-header text-center transparent-card" style="border-radius:20px;height: 75px">
                    <img class="card-img-top" src="https://iccs.sohoglobalhealth.com/assets/images/logo/logoiccs-light.png"
                        alt="Unsplash" style="width: 10%">
                </div>
                <div class="text-center mb-2">
                    <h5 class="card-title mb-0">ICCS</h5>
                    <p class="card-text"></p>
                    <a href="https://iccs.sohoglobalhealth.com" class="btn btn-primary" title="ICCS" ><i
                            class="fa fa-house"></i></a>

                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4" style="padding-top:30px;">
            <div class="card" style="border-radius:20px">
                <div class="card-header text-center" style="border-radius:20px;height: 75px">
                    <img class="card-img-top" src="http://190.191.1.151/smd/img/logo.png" alt="Unsplash" style="width: 50%">
                </div>
                <div class="text-center mb-2">
                    <h5 class="card-title mb-0">SMD</h5>
                    <p class="card-text"></p>
                    <a href="http://190.191.1.151/smd/login.php" class="btn btn-primary" title="SMD"><i
                            class="fa fa-house"></i></a>

                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4" style=";padding-top:30px;padding-right:20px">
            <div class="card" style="border-radius:20px">
                <div class="card-header text-center" style="border-radius:20px;height: 75px">
                    <img class="card-img-top" src="http://172.19.19.39:82/icon/app-icon.png" alt="Unsplash"
                        style="width: 10%">
                </div>
                <div class="text-center mb-2">
                    <h5 class="card-title mb-0">Lumens</h5>
                    <p class="card-text"></p>
                    <a href="http://172.19.19.39:82/login" class="btn btn-primary" title="Lumens"><i
                            class="fa fa-house"></i></a>

                    </a>
                </div>
            </div>
        </div>
       
    </div>


{{-- </div> --}}




@stop
@push('js')
    <script>
        $(document).ready(function() {
            var sidebar = document.getElementById("sidebar");
            sidebar.classList.add("collapsed");
        });
    </script>
@endpush
