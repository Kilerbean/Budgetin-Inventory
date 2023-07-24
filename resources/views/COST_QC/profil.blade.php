@extends('templates.dasar')
@php
  $title = 'Profile';
  $pretitle = 'COST-QC LAB';

@endphp 
@section('coba')

@push('page-action')
  <a class="btn btn-info" href="{{ route('Dashboards') }}"> Back</a>
@endpush

<header>
    <h5 class="text-lg font-medium text-gray-900">
        {{ __('Profile Information') }}
    </h2>

    {{-- <p class="mt-1 text-sm text-gray-600">
        {{ __("Update your account's profile information and email address.") }}
    </p> --}}
</header>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nama </strong>
            <input class="form-control" name="name" placeholder="Nama" value="{{auth()->user()->name}}" @readonly(true)>
        </div>
    </div>

    <div class="col-12 mt-4">
        <label class="form-label">Access Level  :
            {{auth()->user()->leveluser== 1 ? 'User' : (auth()->user()->leveluser== 2 ? 'Staff' : (auth()->user()->leveluser== 3 ? 'SuperVisor' : (auth()->user()->leveluser== 4 ? 'Manager' :(auth()->user()->leveluser== 5 ? 'Admin' : '') ))) }}
        </label><br>
        </div>


@endsection