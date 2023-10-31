  @extends('layouts.master')
  @php
      $titles = 'Q-LIS - List of Material';
      $title = 'Q-LIS |Edit Employees';
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

      <form action="{{ route('karyawan.update', $user->id) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <strong>Employe Name</strong>
                      <input class="form-control" name="name" placeholder="Nama" value="{{ $user->name }}">
                  </div>
              </div>

              <div class="col-md-6">
                  <div class="form-group">
                      <strong>Email</strong>
                      <input type="text" name="email" value="{{ old('email', $user->email) }}" class="form-control"
                          placeholder="No">
                  </div>
              </div>
              <div class="col-md-6">
                  <strong>Title</strong>
                  <select class="form-select" name="title">
                      <option value="" {{ old('title', $user->title) == '' ? 'selected' : '' }}>
                          none</option>
                      <option value="QC Support" {{ old('title', $user->title) == 'QC Support' ? 'selected' : '' }}>
                          QC Support</option>
                      <option value="Finished Goods QC Analyst"{{ old('title', $user->title) == 'Finished Goods QC Analyst' ? 'selected' : '' }}>
                          Finished Goods QC Analyst</option>
                      <option value="Material QC Analyst"{{ old('title', $user->title) == 'Material QC Analyst' ? 'selected' : '' }}>
                          Material QC Analyst</option>
                      <option value="Microbiology QC Analyst"{{ old('title', $user->title) == 'Microbiology QC Analyst' ? 'selected' : '' }}>
                          Microbiology QC Analyst</option>
                      <option value="Stability QC Analyst"{{ old('title', $user->title) == 'Stability QC Analyst' ? 'selected' : '' }}>
                          Stability QC Analyst</option>
                      <option value="QC Supervisor"{{ old('title', $user->title) == 'QC Supervisor' ? 'selected' : '' }}>
                          QC Supervisor</option>
                      <option value="QC Jr. Manager"{{ old('title', $user->title) == 'QC Jr. Manager' ? 'selected' : '' }}>
                          QC Jr. Manager</option>
                      <option value="QC Manager" {{ old('title', $user->title) == 'QC Manager' ? 'selected' : '' }}>
                          QC Manager</option>
                      <option value="Quality Operation Director"{{ old('title', $user->title) == 'Quality Operation Director' ? 'selected' : '' }}>
                          Quality Operation Director</option>
                  </select>
              </div>

              <div class="col-md-6">
                  <strong>Status</strong>
                  <select class="form-select" name="Status">
                      <option value=1 {{ old('Status', $user->Status) == 1 ? 'selected' : '' }}>
                          Active</option>
                      <option value=0 {{ old('Status', $user->Status) == 0 ? 'selected' : '' }}>
                          Inactive</option>
                  </select>
              </div>




              <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                  <button type="submit" class="btn btn-success">Save</button>
              </div>
          </div>
      </form>
      <br>
      <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom border-danger">
      </div>
      <div class="col-12 mt-4">
          <label class="form-label">Access Level Expense:
              {{ $user->leveluser == 1 ? 'User' : ($user->leveluser == 2 ? 'Staff' : ($user->leveluser == 3 ? 'SuperVisor' : ($user->leveluser == 4 ? 'Manager' : ($user->leveluser == 5 ? 'Administrator' : '')))) }}
          </label><br>
          @if ($user->leveluser < 2)
              <a href="{{ route('karyawan.edit.staff', $user->id) }}" class="btn btn-primary">Turn into Staff</a>
              <a href="{{ route('karyawan.edit.spv', $user->id) }}" class="btn btn-primary">Turn into Supervisor</a>
              <a href="{{ route('karyawan.edit.manager', $user->id) }}" class="btn btn-primary">Turn into Manager</a>
              <a href="{{ route('karyawan.edit.admin', $user->id) }}" class="btn btn-primary">Turn into Administrator</a>
          @elseif ($user->leveluser < 3)
              <a href="{{ route('karyawan.edit.spv', $user->id) }}" class="btn btn-primary">Turn into Supervisor</a>
              <a href="{{ route('karyawan.edit.manager', $user->id) }}" class="btn btn-primary">Turn into Manager</a>
              <a href="{{ route('karyawan.edit.admin', $user->id) }}" class="btn btn-primary">Turn into Administrator</a>
          @elseif ($user->leveluser < 4)
              <a href="{{ route('karyawan.edit.staff', $user->id) }}" class="btn btn-primary">Turn into Staff</a>
              <a href="{{ route('karyawan.edit.manager', $user->id) }}" class="btn btn-primary">Turn into Manager</a>
              <a href="{{ route('karyawan.edit.admin', $user->id) }}" class="btn btn-primary">Turn into Administrator</a>
          @elseif ($user->leveluser < 5)
              <a href="{{ route('karyawan.edit.staff', $user->id) }}" class="btn btn-primary">Turn into Staff</a>
              <a href="{{ route('karyawan.edit.spv', $user->id) }}" class="btn btn-primary">Turn into Supervisor</a>
              <a href="{{ route('karyawan.edit.admin', $user->id) }}" class="btn btn-primary">Turn into Administrator</a>
          @elseif ($user->leveluser < 7)
              <a href="{{ route('karyawan.edit.staff', $user->id) }}" class="btn btn-primary">Turn into Staff</a>
              <a href="{{ route('karyawan.edit.spv', $user->id) }}" class="btn btn-primary">Turn into Supervisor</a>
              <a href="{{ route('karyawan.edit.manager', $user->id) }}" class="btn btn-primary">Turn into Manager</a>
          @endif
      </div>


      <br>
      <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom border-danger">
      </div>
      <label class="form-label">Access Level Calibration:
    </label><br>
    @if ($user->leveluser < 6)

    <a href="{{ route('karyawan.edit.kalibrasi', $user->id) }}" class="btn btn-primary">Turn into Admin Calibration</a>
    @endif
    
      <br>
      <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom border-danger">
      </div>
      @include('users.audit')

  @stop
  @push('js')
      <script type="text/javascript">
          $(function() {
              var table = $('#listlowss').DataTable({
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
