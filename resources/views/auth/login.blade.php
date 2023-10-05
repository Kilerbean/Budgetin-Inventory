@extends('auth.master')
@section('title', 'Sign In')
@section('content')   
    <main class="d-flex w-100" >
        <div class="container d-flex flex-column" >
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100" style="padding-top:80px;">
                    <div class="d-table-cell align-middle">                        
                        <div class="text-center mt-4" >
                            {{-- <img class="img-fluid" src="{{ asset('icon/login-icon.png') }}" alt="{{ config('app.name') }}"
                                style="height: 100px">
                            <h1 class="h2"> Stock Management </h1> --}}
                  
                            <p class="lead">
                                Sign in to your account to continue
                            </p>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input class="form-control form-control-lg" type="email" name="email"
                                                placeholder="Enter your email" autocomplete="true"
                                                value="{{ old('email', '') }}" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input class="form-control form-control-lg" type="password" name="password"
                                                placeholder="Enter your password" />
                                            <small>
                                                <a href="/forgot-password">Forgot password?</a>
                                            </small>
                                        </div>
                                        {{-- <div>
                                            <label class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" checked>
                                                <span class="form-check-label">
                                                    Remember me next time
                                                </span>
                                            </label>
                                        </div> --}}
                                        <div class="text-center mt-3">
                                            <button type="submit" class="btn btn-lg btn-primary">Sign in</button>
                                        </div>
                                    </form>
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
										{{ __('Dont have an account ?') }}
									</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
@stop
