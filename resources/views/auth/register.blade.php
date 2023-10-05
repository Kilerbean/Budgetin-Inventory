@extends('auth.master')
@section('title', 'Sign Up')
@section('content')

    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">
                    <div class="text-center mt-4">
                        {{-- <img class="img-fluid" src="{{ asset('icon/register-icon.png') }}" alt="{{ config('app.name') }}"
                            style="height: 100px"> --}}
                    <div class="text-center mt-4">

                        <h1 class="h2" style="padding-top:160px;">Get started</h1>
                        <p class="lead">
                           
                        </p>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-4">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input class="form-control form-control-lg" type="text" name="name"
                                            placeholder="Enter your name" value="{{ old('name') }}" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input class="form-control form-control-lg" type="email" name="email"
                                            placeholder="Enter your email" value="{{ old('email') }}" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input class="form-control form-control-lg" type="password" name="password"
                                            placeholder="Enter password" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Confirm Password</label>
                                        <input class="form-control form-control-lg" type="password"
                                            name="password_confirmation" placeholder="Confirm password" />
                                    </div>
                                    <div class="text-center mt-3">
                                        <button type="submit" class="btn btn-lg btn-primary">Sign up</button>
                                    </div>
                                </form>
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    href="{{ route('login') }}">
                                    {{ __('Already registered?') }}
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@stop
