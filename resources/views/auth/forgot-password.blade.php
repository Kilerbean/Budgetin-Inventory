@extends('auth.master')
@section('title', 'Forgot Password')
@section('content')    
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">
                        <div class="text-center mt-4">
                            {{-- <img class="img-fluid" src="https://img.icons8.com/color/96/company.png"
                                style="height: 100px"> --}}
                           
                        </div>     
                        <br><br>                   
                        <div class="card transparent-card">
                            <div class="card-body">
                                
                                <div class="m-sm-4">
                                    <h1 class="h2 middle">Q-LIS </h1>
                                    <p class="lead">
                                        Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
                                    </p>
                                    <form method="POST" action="{{ route('password.email') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input class="form-control form-control-lg" type="email" name="email"
                                                placeholder="Enter your email" autocomplete="true" autofocus
                                                value="{{ old('email', 'user@sohoglobalhealth.com') }}" />
                                        </div>                                        
                                        <div class="text-center mt-3">
                                            <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
@stop

