  @extends('layouts.master')
  @php
      $titles = 'QC - List of Material';
      $title = 'Edit Karyawan';
      $pretitle = 'EDIT';
      $pages = $title;
  @endphp
  @section('title', $pages)
  @section('content')
      <div class="row">
          <div class="col">
              <a class="btn btn-primary" href="{{ route('karyawan') }}"> Back</a>
          </div>
      </div>
      <div class="mx-2 mt-2">
          <h4 class="mb-2">Edit Employee</h4>
      </div>

      <form action="{{ route('karyawan.edit', $user->id) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Employe Name</strong>
                      <input class="form-control bg-secondary text-white" name="name" placeholder="Nama"
                          value="{{ $user->name }}" @readonly(true)>
                  </div>
              </div>
          </div>
      </form>
      <br>
      <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom border-danger">
      </div>
      <div class="col-12 mt-4">
          <label class="form-label">Access Level :
              {{ $user->leveluser == 1 ? 'User' : ($user->leveluser == 2 ? 'Staff' : ($user->leveluser == 3 ? 'SuperVisor' : ($user->leveluser == 4 ? 'Manager' : ($user->leveluser == 5 ? 'Administrator' : '')))) }}
          </label><br>
          @if ($user->leveluser < 2)
              <a href="{{ route('karyawan.edit.staff', $user->id) }}" class="btn btn-primary">turn into Staff</a>
              <a href="{{ route('karyawan.edit.spv', $user->id) }}" class="btn btn-primary">turn into SuperVisor</a>
              <a href="{{ route('karyawan.edit.manager', $user->id) }}" class="btn btn-primary">turn into Manager</a>
          @elseif ($user->leveluser < 3)
              <a href="{{ route('karyawan.edit.spv', $user->id) }}" class="btn btn-primary">turn into SuperVisor</a>
              <a href="{{ route('karyawan.edit.manager', $user->id) }}" class="btn btn-primary">turn into Manager</a>
          @elseif ($user->leveluser < 4)
              <a href="{{ route('karyawan.edit.staff', $user->id) }}" class="btn btn-primary">turn into Staff</a>
              <a href="{{ route('karyawan.edit.manager', $user->id) }}" class="btn btn-primary">turn into Manager</a>
          @elseif ($user->leveluser < 5)
              <a href="{{ route('karyawan.edit.spv', $user->id) }}" class="btn btn-primary">turn into SuperVisor</a>
              {{-- <a href="{{ route('karyawan.edit.admin', $user->id) }}" class="btn btn-primary">turn into Admin</a> --}}
          @elseif ($user->leveluser < 6)
              <a href="{{ route('karyawan.edit.staff', $user->id) }}" class="btn btn-primary">turn into Staff</a>
              <a href="{{ route('karyawan.edit.spv', $user->id) }}" class="btn btn-primary">turn into SuperVisor</a>
              <a href="{{ route('karyawan.edit.manager', $user->id) }}" class="btn btn-primary">turn into Manager</a>
          @endif
      </div>
  @stop
