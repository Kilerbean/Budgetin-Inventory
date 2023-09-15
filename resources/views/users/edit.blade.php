@extends('templates.dasar')

@php
$title = 'List Employee';
$pretitle = 'Karyawan';
@endphp


@section('coba')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div>
            <h2>Edit Employee</h2>
        </div>
        <div>
            <a class="btn btn-primary" href="{{ route('karyawan') }}"> Back</a>
        </div>
    </div>
  </div>
   
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
   
  <form action="{{ route('karyawan.edit',$user->id) }}" method="POST">
    @csrf
    @method('PUT')
  
     <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong>Employe Name</strong>
              <input class="form-control" name="name" placeholder="Nama" value="{{ $user->name}}" @readonly(true)>
          </div>
      </div>
        
        {{-- <div class="col-md-4">
            <div class="form-group">
                <strong>Accses Level</strong>
                <input class="form-control" name="leveluser"  value="{{ \App\Http\Controllers\UserController::getLevelUserText($users->leveluser) }}" @readonly(true) >
            </div>
        </div>
       
        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
            <button type="submit" class="btn btn-success">Submit</button>
        </div> --}}
    </div>
</form>
    <br>
<div
class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom border-danger">
</div>
    <div class="col-12 mt-4">
                <label class="form-label">Access Level Sparta :
                    {{ $user->leveluser== 1 ? 'User' : ($user->leveluser== 2 ? 'Staff' : ($user->leveluser== 3 ? 'SuperVisor' : ($user->leveluser== 4 ? 'Manager' :($user->leveluser== 5 ? 'Admin' : '') ))) }}
                </label><br>
               @if ($user->leveluser <2)
               <a href="{{ route('karyawan.edit.staff', $user->id) }}" class="btn btn-primary">turn into Staff</a>
               <a href="{{ route('karyawan.edit.spv', $user->id) }}" class="btn btn-primary">turn into SuperVisor</a>
                <a href="{{ route('karyawan.edit.manager', $user->id) }}" class="btn btn-primary">turn into Manager</a>
                @elseif ($user->leveluser <3)
                <a href="{{ route('karyawan.edit.spv', $user->id) }}" class="btn btn-primary">turn into SuperVisor</a>
                <a href="{{ route('karyawan.edit.manager', $user->id) }}" class="btn btn-primary">turn into Manager</a>
                @elseif ($user->leveluser <4)
                <a href="{{ route('karyawan.edit.staff', $user->id) }}" class="btn btn-primary">turn into Staff</a>
                <a href="{{ route('karyawan.edit.manager', $user->id) }}" class="btn btn-primary">turn into Manager</a>
                @elseif ($user->leveluser <5)
                <a href="{{ route('karyawan.edit.spv', $user->id) }}" class="btn btn-primary">turn into SuperVisor</a>
                {{-- <a href="{{ route('karyawan.edit.admin', $user->id) }}" class="btn btn-primary">turn into Admin</a> --}}
                @elseif ($user->leveluser <6)
                <a href="{{ route('karyawan.edit.staff', $user->id) }}" class="btn btn-primary">turn into Staff</a>
                <a href="{{ route('karyawan.edit.spv', $user->id) }}" class="btn btn-primary">turn into SuperVisor</a>
                <a href="{{ route('karyawan.edit.manager', $user->id) }}" class="btn btn-primary">turn into Manager</a>
               @endif

                {{-- @if (Auth::user()->level_sparta > 1)
                    <a href="{{ route('employees.updatespartauser', $employee->users->id) }}" class="btn btn-primary">Make
                        Sparta User</a>
                    <a href="{{ route('employees.updatespartaadmin', $employee->users->id) }}" class="btn btn-primary">Make
                        Sparta Administrator</a>
                @elseif (Auth::user()->level_sparta > 2)
                    <a href="{{ route('employees.updatespartasuper', $employee->users->id) }}" class="btn btn-primary">Make
                        Sparta Super User</a>
                @endif --}}
            </div>








@endsection