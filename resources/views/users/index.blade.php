@extends('templates.dasar')

@php
$title = 'List Karyawan';
$pretitle = 'karyawan';
@endphp

@section('coba')
@push('page-action')
  <a class="btn btn-success" href="{{ route('Dashboards') }}"> Back</a>
  @endpush

<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">List of Karyawan</h3>
      </div>
      
      <div class="table-responsive ">
        <table class="table card-table table-bordered  table-vcenter text-nowrap datatable">
          <thead>
            <tr>
        <th class="w-1 ml-1">Action</th>
        <th>No</th>
        <th>Employe Name </th>
        <th>Email</th>
        <th>Level User</th>
        <th>Status</th>
    </tr>
    @foreach ($user as $users)
    <tr>
        <td>
              <a class="btn btn-primary btn-sm" href="{{ route('karyawan.edit',$users->id) }}" >Edit Access level</a>
        </td>
        <td>{{ ++$i }}</td>
        <td>{{ $users ->name }}</td>
        <td>{{ $users->email}}</td>
        <td>{{\App\Http\Controllers\UserController::getLevelUserText($users->leveluser)}}</td>
        <td>{{  $users->Status == 1 ? 'Aktif' : 'InAktif' }}</td>
        
    </tr>
    @endforeach
</table>
</div>






@endsection