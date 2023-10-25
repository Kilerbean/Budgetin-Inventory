@extends('layouts.master')
@php
    $titles = 'QC - Work Order List';
    $title = 'Q-LIS |EDIT WORK ORDER LIST ';
    $pretitle = 'Calibration  Q-LIS';
    $pages = $title;
@endphp
@section('title', $pages)
@section('content')

<div class="row">
    <div class="col">
        {{-- <a class="btn btn-info btn-sm" href="{{ route('income.index') }}"><i class="fa fa-clipboard-list"></i><i
                class="fa fa-turn-up"></i> List of Incoming Material</a> --}}
        <a class="btn btn-primary btn-sm" href="{{ route('dashboard.kalibrasi') }}">Back</a>
    </div>
</div>

<div class="mx-2 mt-2">
    <h4 class="mb-2">Edit Work Order List </h4>
</div>


    <div class="col-12">
        <div class="card">
           



        </div>
    </div>

@stop
