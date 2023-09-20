@extends('auth.master')
@section('title', 'Reset Your Password')
@section('content')    
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">
                        <div class="text-center mt-4">
                            <img class="img-fluid" src="https://img.icons8.com/color/96/company.png"
                                style="height: 100px">
                            <h1 class="h2">QC Lab System</h1>
                            <p class="lead">
                               Reset your password 
                            </p>
                        </div>                        
                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <form method="POST" action="{{ route('password.store') }}">
                                        @csrf                                
                                        <!-- Password Reset Token -->
                                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input class="form-control form-control-lg bg-secondary text-white" type="email" name="email"
                                                placeholder="Enter your email" 
                                                value="{{ old('email', $request->email) }}" required  readonly/>
                                        </div>       
                                        <div class="mb-3">
                                            <label class="form-label">New Password</label>
                                            <input class="form-control form-control-lg" type="password" name="password"
                                                placeholder="Enter your new password"
                                                required autofocus/>
                                        </div>    
                                        <div class="mb-3">
                                            <label class="form-label">Confirm Password</label>
                                            <input class="form-control form-control-lg" type="password" name="password_confirmation"
                                                placeholder="Confirm your new password"
                                                required/>
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
