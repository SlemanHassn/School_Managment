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

                            <div style="border-radius: 15px;" class="col-12 bg-white p-5 shadow-lg">
                                <div class="login-fancy pb-40 clearfix">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h3 style="font-family: 'Cairo', sans-serif" class="mb-30">
                                            {{ trans('auth.select') }} </h3>
                                        <ul class="nav">
                                            <li class="">
                                                <div class="dropdown  nav-itemd-none d-md-flex">
                                                    <a href="#" class="d-flex  nav-item nav-link pl-0 country-flag1"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                        <button
                                                            class="btn btn-primary-gradient btn-sm">{{ Str::upper(App::getLocale()) }}</button>

                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow"
                                                        x-placement="bottom-end">
                                                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                            <a class="dropdown-item d-flex " rel="alternate"
                                                                hreflang="{{ $localeCode }}"
                                                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                                {{ $properties['native'] }}
                                                            </a>
                                                        @endforeach

                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="form-inline">
                                        <a class="btn btn-default col-lg-3" title="student"
                                            href="{{ route('login.show', 'student') }}">
                                            <img alt="user-img" width="100px;"
                                                src="{{ URL::asset('assets/img/student.png') }}">
                                        </a>
                                        <a class="btn btn-default col-lg-3" title="parent"
                                            href="{{ route('login.show', 'parent') }}">
                                            <img alt="user-img" width="100px;"
                                                src="{{ URL::asset('assets/img/parent.png') }}">
                                        </a>
                                        <a class="btn btn-default col-lg-3" title="teacher"
                                            href="{{ route('login.show', 'teacher') }}">
                                            <img alt="user-img" width="100px;"
                                                src="{{ URL::asset('assets/img/teacher.png') }}">
                                        </a>
                                        <a class="btn btn-default col-lg-3" title="admin"
                                            href="{{ route('login.show', 'admin') }}">
                                            <img alt="user-img" width="100px;"
                                                src="{{ URL::asset('assets/img/admin.png') }}">
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End -->
    </div>
    </div>
@endsection
@section('js')
@endsection
