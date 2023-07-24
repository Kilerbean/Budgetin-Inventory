@extends('templates.dasar')
@php
  $title = 'Tambah Material';
  $pretitle = 'LIMS';

@endphp 
@section('coba')
<div class="row">
  <div class="col-lg-12 margin-tb">
      <div>
          <h2> Show student</h2>
      </div>
      <div>
          <a class="btn btn-primary" href="{{ route('income.index') }}"> Back</a>
      </div>
  </div>
</div>

<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
          <strong>Name:</strong>
          {{ $income->name }}
      </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
          <strong>Kelas:</strong>
          {{ $income->Catalog_Number }}
      </div>
  </div>
</div>


@endsection