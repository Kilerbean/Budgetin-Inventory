@extends('templates.dasar')
@php
  $title = 'DASHBOARD';
  $pretitle = 'COST-QC LAB';

@endphp 
@section('coba')

@push('page-action')
  <a href="{{ route('Barang.Create') }}" class="btn btn-success btn-sm">     <i class="fa fa-folder-plus"></i>    Add New Material </a>
  <a class="btn btn-success btn-sm" href="{{ route('income.create') }}"> <i class="fa fa-cart-plus"></i>  Add New Purchasing Material</a>
  <a class="btn btn-success btn-sm" href="{{ route('usage.create') }}"><i class="fa fa-plus"></i> New Material Usage</a>
  <a class="btn btn-info btn-sm" href="{{ route('income.index') }}"><i class="fa fa-clipboard-list"></i><i class="fa fa-turn-up"></i> List of Incoming Material</a>

  <a class="btn btn-info btn-sm" href="{{ route('usage.index') }}"> <i class="fa fa-clipboard-list"></i><i class="fa fa-turn-down"></i> List Material Usage</a>
  <a class="btn btn-info btn-sm"  href="{{ route('Barang.index') }}"> <i class="fa fa-book"></i>  List of All Material </a>
  @if (auth()->user()->leveluser >2)
  <a class="btn btn-secondary btn-sm"  href="{{ route('laporanincome') }}"><i class="fa fa-file-arrow-up"></i>  Incoming Material Report </a>
  <a class="btn btn-secondary btn-sm"  href="{{ route('laporanusage') }}"> <i class="fa fa-file-arrow-down"></i>  Material Usage  Report</a>
 
  @endif

  @endpush
  
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

<div class="row">
  <div class="col-md-3">
      <div class="card">
          <div class="card-header">
              <p class="card-text" style="font-size: 15px;">Maintenance
              </p>
          </div>
          <div class="text-center">
              <img class="card-img-top" src="icon/maintenance.png" alt="Lumens Icon" style="width: 60px"><br> <strong class="h6">
                Actual:IDR {{ number_format($totalactual1, 2, '.', ',') }}</strong><br>
     
         <span class="{{ $colorClass1 }}"> Budget: IDR {{ number_format($totalbudget1, 2, '.', ',') }} </span> </div><a class="btn btn-info btn-sm" href="{{ route('Maintenance') }}"><i class="fa fa-calendar-days"></i> Detail Budget</a></div>
       
         
  </div>

  <div class="col-md-3">
      <div class="card">
          <div class="card-header">
            <p class="card-text" style="font-size: 12px;">Product Research and Development</p>
          </div>
          <div class="text-center">
              <img  class="card-img-top" src="icon/research-and-development.png" alt="Lumens Icon" style="width: 60px"><br> <span class="h6">
                Actual:IDR {{ number_format($totalactual2, 2, '.', ',') }} 
               
          
          <br><span class="{{ $colorClass2 }}"> Budget:IDR {{ number_format($totalbudget2, 2, '.', ',') }} </span></div>
          <a class="btn btn-info btn-sm" href="{{ route('Product') }}"> <i class="fa fa-calendar-days"></i> Detail Budget</a></div>
  </div>
  <div class="col-md-3">
    <div class="card">
        <div class="card-header">
            <p class="card-text"style="font-size: 15px;">Supporting Material
            </p>
        </div>
        <div class="text-center">
            <img class="card-img-top" src="icon/material-management.png" alt="Lumens Icon" style="width: 60px"> <br><strong class="h6">
              Actual:IDR {{ number_format($totalactual3, 2, '.', ',') }}
               </strong>
        <br>
        <span class="{{ $colorClass3 }}"> Budget:IDR {{ number_format($totalbudget3, 2, '.', ',') }} </span></div>
        <a class="btn btn-info btn-sm" href="{{ route('Supporting') }}"><i class="fa fa-calendar-days"></i> Detail Budget</a></div>
</div>

<div class="col-md-3">
  <div class="card">
      <div class="card-header">
          <p class="card-text" style="font-size: 15px;">Manufacturing Supply
          </p>
      </div>
      <div class="text-center">
          <img class="card-img-top" src="icon/supply-chain.png" alt="Lumens Icon" style="width: 60px"><br> <strong class="h6">
            Actual: IDR {{ number_format($totalactual4, 2, '.', ',') }}  
           </strong>
      
      <br><span class="{{ $colorClass4 }}"> Budget:IDR {{ number_format($totalbudget4, 2, '.', ',') }} </span></div>
      <a class="btn btn-info btn-sm" href="{{ route('Manufacturing') }}"><i class="fa fa-calendar-days"></i> Detail Budget</a></div>
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
<br>
<div
class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom border-danger">
</div>
<br>
</div>
@include('COST_QC.listmaterial.opname')


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



@endsection

