@extends('templates.dasar')
@php
  $title = 'DASHBOARD';
  $pretitle = 'COST-QC LAB';

@endphp 
@section('coba')

@push('page-action')
  <a href="{{ route('Barang.Create') }}" class="btn btn-success btn-sm">Add New Material </a>
  <a class="btn btn-success btn-sm" href="{{ route('income.create') }}"> Add New Incoming Material</a>
  <a class="btn btn-success btn-sm" href="{{ route('usage.create') }}"> Add New Material Usage</a>
  <a class="btn btn-info btn-sm" href="{{ route('income.index') }}"> <i class="fas fa-arrow-down"></i>List of Incoming Material</a>
  <a class="btn btn-info btn-sm" href="{{ route('usage.index') }}"> <i class="fa-sharp fa-regular fa-arrow-up"></i>List Material Usage</a>
  <a class="btn btn-info btn-sm"  href="{{ route('Barang.index') }}"> <i class="fa-solid fa-arrow-trend-down"></i>List of All Material </a>
  @if (auth()->user()->leveluser >2)
  <a class="btn btn-secondary btn-sm"  href="{{ route('laporanincome') }}"> <i class="fa-solid fa-arrow-trend-down"></i>Laporan Incoming Material </a>
  <a class="btn btn-secondary btn-sm"  href="{{ route('laporanusage') }}"> <i class="fa-solid fa-arrow-trend-down"></i>Laporan Material Usage </a>
  <a class="btn btn-primary btn-sm"  href="{{ route('karyawan') }}"> <i class="fa-solid fa-arrow-trend-down"></i>List Karyawan </a>
  @endif

  @endpush


<div class="row">
  <div class="col-md-3">
      <div class="card">
          <div class="card-header">
              <p class="card-text">Maintenance
              </p>
          </div>
          <div>
              <img class="card-img-top" src="icon/maintenance.png" alt="Lumens Icon" style="width: 50px"> <strong class="h6">
                Actual:IDR {{ number_format($totalactual1, 2, '.', ',') }}</strong>
          </div>
         <span class="{{ $colorClass1 }}"> Budget: IRD {{ number_format($totalbudget1, 2, '.', ',') }} </span><a class="btn btn-info btn-sm" href="{{ route('Maintenance') }}"> Detail Maintenance</a></div>
         <br>
         
  </div>

  <div class="col-md-3">
      <div class="card">
          <div class="card-header">
              <p class="card-text">Product Research and Development
              </p>
          </div>
          <div>
              <img class="card-img-top" src="icon/product-researc.png" alt="Lumens Icon" style="width: 50px"> <strong>
                Actual:IDR {{ number_format($totalactual2, 2, '.', ',') }} 
               </strong>
          </div>
          <span class="{{ $colorClass2 }}"> Budget:IDR {{ number_format($totalbudget2, 2, '.', ',') }} </span>
          <a class="btn btn-info btn-sm" href="{{ route('Product') }}"> Detail Product</a></div>
  </div>
  <div class="col-md-3">
    <div class="card">
        <div class="card-header">
            <p class="card-text">Supporting Material
            </p>
        </div>
        <div>
            <img class="card-img-top" src="icon/electrical-icon.png" alt="Lumens Icon" style="width: 50px"> <strong>
              Actual:IDR {{ number_format($totalactual3, 2, '.', ',') }}
               </strong>
        </div>
        <span class="{{ $colorClass3 }}"> Budget:IDR {{ number_format($totalbudget3, 2, '.', ',') }} </span>
        <a class="btn btn-info btn-sm" href="{{ route('Supporting') }}"> Detail Supporting Material</a></div>
</div>

<div class="col-md-3">
  <div class="card">
      <div class="card-header">
          <p class="card-text">Manufacturing Supply
          </p>
      </div>
      <div>
          <img class="card-img-top" src="icon/supply-chain.png" alt="Lumens Icon" style="width: 50px"> <strong>
            Actual: IDR {{ number_format($totalactual4, 2, '.', ',') }}  
           </strong>
      </div>
      <span class="{{ $colorClass4 }}"> Budget:IDR {{ number_format($totalbudget4, 2, '.', ',') }} </span>
      <a class="btn btn-info btn-sm" href="{{ route('Manufacturing') }}"> Detail Manufacturing Supply</a></div>
</div>
<br>


<br>
<div
class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom border-danger">
</div>
<br>
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


@endsection

