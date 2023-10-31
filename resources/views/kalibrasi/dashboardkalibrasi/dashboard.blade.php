@extends('layouts.master')
@php
    $title = 'Q-LIS |Callibration | Dashboard ';
    $pretitle = 'Callibration | Q-LIS';
    $pages = $title;
@endphp
@section('title', $pages)
@section('content')
<div class="container-fluid p-0">
    <h1><img {{-- class="slide-fwd-top" --}} src="{{asset('icon/laboratory.png')}}" alt="Unsplash" style="width: 50px">
    <span {{-- class="slide-left" --}} style="display: inline-block">   Welcome to <strong>{{$pretitle}}</strong></span></h1>        
</div> 
<a href="{{ route('listkalibrasi.create') }}" class="btn btn-danger btn-sm"><i class="fa fa-check-to-slot"></i> List Need Approved</a>
<a href="{{ route('listkalibrasi.create') }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-circle-plus"></i> Create New Instrument</a>
<a href="{{ route('listKalibrasi') }}" class="btn btn-info btn-sm"><i class="fa-solid fa-file-lines"></i> List Instrument</a>

<a href="{{ route('kalibrasi.addbreakdown') }}" class="btn btn-warning btn-sm">Instrument Breakdowns</a>
<a href="{{ route('jadwal') }}" class="btn btn-success btn-sm">Add Calibration Schedule</a>
<a href="{{ route('index.workorderlist') }}" class="btn btn-dark btn-sm"><i class="fa fa-file-invoice"></i> Work Order List</a>



<div
    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-0 pb-2 mb-1 border-bottom border-danger">
</div>

@include('kalibrasi.dashboardkalibrasi.nearcalibration')
<br>
<div
    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom border-danger">
</div>
<br>

@include('kalibrasi.dashboardkalibrasi.overduecalibration')
<br>
<div  class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom border-danger"></div>

@include('kalibrasi.dashboardkalibrasi.kalibrasi')
<br>
<div  class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom border-danger"></div>

@include('kalibrasi.dashboardkalibrasi.breakdown')
<br>
<div  class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom border-danger"></div>



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
