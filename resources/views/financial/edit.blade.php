@extends('templates.dasar')
@php
  $title = 'Financial';
  $pretitle = 'COST-QC LAB';

@endphp 
@section('coba')

<div class="row">
  <div class="col-lg-12 margin-tb">
      <div>
          <h2>Adjust Budget</h2>
      </div>
      <div>
          <a class="btn btn-primary btn-sm" href="{{ route('Dashboards') }}"> Back</a>
      </div>
  </div>
</div>
<br>
<div class="card ">
  <div class="card-body ">
     <form action="{{ route('financial.update',$financial->id) }}"   method="post">

         @csrf
       @method('PUT')

       {{-- <label class="form-label">Jumlah Stok : {{ $financial->Quantity }} </label> --}}
       <br>
       <div class="  mb-3" >
        <label class="form-label">Bulan dan Tahun</label>
        <input type="text" name="bulan_tahun" class="form-control"  readonly
        name="example-text-input" placeholder="Input" value="{{ $financial->bulan_tahun }}" >
      </div>


      <div class="  mb-3" >
        <label class="form-label">actual</label>
        <input type="text" name="actual" class="form-control" readonly
        name="example-text-input" placeholder="Input placeholder" value="{{ $financial->actual }}" >
      </div>
      
       <div class="mb-3">
        <label for="safety_stok" class="form-label">Budget IDR</label>
        <input type="number" class="form-control" name="budget" 
            min=0 placeholder="0" value="{{ $financial->budget }}"> </div>

        <div class="  mb-3" >
         <label class="form-label">Keterangan</label>
         <input type="text" name="Keterangan" class="form-control" 
         name="example-text-input" placeholder="Input" value="{{ $financial->Keterangan }}" >
       </div>

      
       <div class="mb-3">
        <input type="submit" value="Simpan" class="btn btn-primary">
    </div>

    </form>

  </div>
</div>


@endsection