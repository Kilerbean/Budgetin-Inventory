<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta19
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
  <head>
@include('templates.partials.head')

  </head>


    
    <script src="./dist/js/demo-theme.min.js?1684106062"></script>
    <div class="page">
      <!-- Sidebar -->
      @include('templates.partials.sidebar')
      <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                  {{ $pretitle ?? 'Stock Management' }}
                </div>
                <h2 class="page-title">
                 {{ $title ?? 'Dashboard' }}
                </h2>
              </div>
              <!-- Page title actions -->
              <div class="col-auto ms-auto d-print-none">
              </div> 
            </div>
          </div>
        </div>
       
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                </div>
                <h2 class="page-title">
                </h2>
              </div>
              <!-- Page title actions -->

              <div class="col-auto ms-auto d-print-none">
                @stack('page-action')
              </div> 
            </div>
          </div>
        </div>
        <!-- Page body -->

        <div class="page-body">
          <div class="container-xl">
            @if (session('success'))
                <div class="alert alert-success"> {{ session('success') }}</div>
            @endif
            @if (session('info'))
            <div class="alert alert-info"> {{ session('info') }}</div>
            @endif
            @if (session('danger'))
                <div class="alert alert-danger"> {{ session('danger') }}</div>
            @endif



          @yield('coba')
          </div>
        </div>

        </div><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

      </body>
        </html>
        
