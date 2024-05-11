@extends('layouts.master2')
@section('css')
    <link href="{{ URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css') }}"
        rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row " style="background-image: url('{{ asset('assets/img/sativa.png') }}');">
            <div class="col-12 ">
                <div class="login d-flex align-items-center py-2">

                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row justify-content-center no-gutters vertical-align">

                            <div class="col-lg-6 rounded-lg shadow-lg col-md-6 p-5 bg-white">

                                <div class="login-fancy pb-40 clearfix">
                                    @if ($type == 'student')
                                        <h3 style="font-family: 'Cairo', sans-serif" class="text-center mb-5">
                                            {{ trans('auth.Student') }}</h3>
                                    @elseif($type == 'parent')
                                        <h3 style="font-family: 'Cairo', sans-serif" class="text-center mb-5 ">
                                            {{ trans('auth.parent') }}
                                        </h3>
                                    @elseif($type == 'teacher')
                                        <h3 style="font-family: 'Cairo', sans-serif; font-style:italic"
                                            class="text-center mb-5 ">
                                            {{ trans('auth.teacher') }}</h3>
                                    @else
                                        <h3 style="font-family: 'Cairo', sans-serif" class="text-center mb-5 ">
                                            {{ trans('auth.admin') }}
                                        </h3>
                                    @endif

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="row mb-3">
                                            <label for="email"
                                                class="col-md-4 col-form-label text-md-end">{{ trans('auth.email') }}</label>

                                            <div class="col-md-6">

                                                <input type="hidden" value="{{ $type }}" name="type">
                                                <input id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="password"
                                                class="col-md-4 col-form-label text-md-end">{{ trans('auth.password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="current-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>




                                        <div class="row mb-0">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn btn-primary-gradient x">
                                                    {{ trans('auth.log') }}
                                                </button>
                                                <a href="{{ route('selection') }}" class="btn btn-secondary-gradient x">
                                                    {{ trans('auth.back') }}
                                                </a>

                                                @if (Route::has('password.request'))
                                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endsection
