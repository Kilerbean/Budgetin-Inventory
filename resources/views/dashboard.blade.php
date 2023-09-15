@extends('layouts.master')
@php
  $title = 'HOME';
  $pages = $title;
  $pretitle = 'QC LAB';

@endphp 
@section('title', $pages)
@section('content')


<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header text-center">
                <img class="card-img-top" src="icon/sparta-icon.png" alt="Unsplash" style="width: 10%">                    
            </div>
            <div class="text-center mb-2">
                <h5 class="card-title mb-0">COST</h5>
                <p class="card-text">QC-LAB</p>
                <a href="{{ route('Dashboards') }}" class="btn btn-primary" title="Dashboard COST QC"><i class="fa fa-house"></i></a>
                <a href="{{ route('Barang.index') }}" class="btn btn-info" title="List of All Material"><i class="fa-solid fa-boxes-stacked"></i></a>
                <a href="{{ route('income.create') }}" class="btn btn-warning" title="Purchasing Material"><i class="fa-solid fa-cart-shopping"></i></a>
                <a href="{{ route('usage.create') }}" class="btn btn-success" title="Material Usage"><i class="fa-solid fa-bag-shopping"></i>
                </a>
            </div>
        </div>
    </div>
</div>


  {{-- <div class="col-md-4">
      <div class="card">
          <div class="card-header text-center">
              <img class="card-img-top-middle" src="icon/woms-icon.png" alt="Unsplash" style="width: 10%">                    
          </div>
          <div class="text-center">
              <h5 class="card-title mb-0">WOMS</h5>
              <p class="card-text">Work Order Management System</p>
              <a href="/woms" class="btn btn-primary">Go to Dashboard</a>
          </div>
      </div>
  </div>
  <div class="col-md-4">
      <div class="card">
          <div class="card-header text-center">
              <img class="card-img-top" src="icon/sam-icon.png" alt="Unsplash" style="width: 10%">                    
          </div>
          <div class="text-center">
              <h5 class="card-title mb-0">SAM</h5>
              <p class="card-text">SOHO Stoppages Analysis Module</p>
              <a href="http://172.19.19.39:92/sam" class="btn btn-primary">Go to Dashboard</a>
          </div>
      </div>
  </div>
      </div> --}}





@stop
