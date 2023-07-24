@extends('templates.dasar')
@php
  $title = 'DASHBOARD';
  $pretitle = 'COST-QC LAB';

@endphp 
@section('coba')


<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header text-center" style="display: flex; align-items: center;">
                <img class="card-img-top-middle" src="icon/sparta-icon.png" alt="Unsplash" style="width: 10%">                    
            </div>
            <div class="text-center">
                <h5 class="card-title mb-0">BUDGET</h5>
                <p class="card-text">QC-LAB</p>
                <a href="{{ route('Dashboards') }}" class="btn btn-primary">Go to Dashboard</a>
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





@endsection
