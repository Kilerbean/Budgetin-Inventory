@extends('templates.dasar')
@php
  $title = 'Edit Quantity Material';
  $pretitle = 'COST-QC LAB';

@endphp 

@push('page-action')
  <a href="{{ route('Barang.show',$barang->id) }}" class="btn btn-primary btn-sm">Back</a>
  
  @endpush




  
@section('coba')
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif



<div class="card ">
 
    <div class="card-body ">
       <form action="{{ route('edit.quantity',$income->id) }}" class=""  method="post">

           @csrf
         @method('PUT')
   

         <label class="form-label"> Catalog Number : {{ $income->Catalog_Number }} </label>

         <label class="form-label"> Name Materials : {{ $income->Name_of_Material }} </label>

         <label class="form-label"> Type of Material : {{ $income->Type_of_Material }} </label>

         <label class="form-label"> Type of Budget : {{ $barang->Type_of_Budget }} </label>

         <label class="form-label"> Batch Number : {{ $income->no_batch }} </label>

         <label class="form-label"> Quantity : {{ $income->Quantity }} </label>
         <br>

         <div class="mb-3">
            <label for="Quantity" class="form-label" >Adjusting Quantity </label>
            <input type="number" class="form-control" name="Quantity" 
            placeholder="0" min=0 value="{{ $income->Quantity }}"> 
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <label for="reason" class="form-label" >Reason </label>
                  <input class="form-control" name="reason" placeholder="Reason" value="{{ $income->reason }}">
              </div>
          </div>
            
          <br>
      
            <div class="mb-3">
                <input type="submit" value="Save" class="btn btn-primary">
            </div>
      </div>
</form>

</div>
</div>
          
@endsection