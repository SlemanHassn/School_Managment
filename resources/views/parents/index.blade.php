@extends('layouts.master')
@section('css')
    @livewireStyles
    <!--  Owl-carousel css-->
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
    <!-- Maps css -->
    <link href="{{ URL::asset('assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">
@endsection
@section('title')
    {{ trans('Dparent.Dash') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">{{ trans('Dparent.Dash') }} {{auth()->user()->Name_Father}}</h2>
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')
    <!-- row -->

    <!-- row closed -->

    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-md-12 col-lg-12">
            <section style="background-color: #eee;">
                <div class="row justify-content-center">
                    @foreach ($sons as $son)
                        <div class="col-md-8 col-lg-6 col-xl-4">
                            <a class="text-black" style="color: black !important" href="">
                                <div class="card ">
                                    <img src="{{ URL::asset('assets/img/my_son.png') }}" />
                                    <div class="card-body">
                                        <div class="text-center">
                                            <h5 style="font-family: 'Cairo', sans-serif; font-style:italic" class="card-title">
                                                {{ $son->name }}</h5>
                                                <hr>
                                            <p class="text-muted mb-2">{{ trans('Dparent.Student_information') }} </p>
                                        </div>
                                        <div>
                                            <div class="d-flex justify-content-between">
                                                <span>{{ trans('Dparent.Grade') }}</span><span>{{ $son->grade->Name }}</span>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <span>{{ trans('Dparent.classroom') }}</span><span>{{ $son->classroom->Name }}</span>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <span>{{ trans('Dparent.section') }}</span><span>{{ $son->section->Name }}</span>
                                            </div>

                                            <div class="d-flex justify-content-between">
                                                @if (\App\Models\Degree::where('student_id', $son->id)->count() == 0)
                                                    <span>{{ trans('Dparent.test_number') }}</span><span
                                                        class="text-danger">{{ \App\Models\Degree::where('student_id', $son->id)->count() }}</span>
                                                @else
                                                    <span>{{ trans('Dparent.test_number') }}</span><span
                                                        class="text-success">{{ \App\Models\Degree::where('student_id', $son->id)->count() }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
    </div>
    </div>
    <!-- Container closed -->
@endsection
@section('js')
    <!--Internal  Chart.bundle js -->
    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- Moment js -->
    <script src="{{ URL::asset('assets/plugins/raphael/raphael.min.js') }}"></script>
    <!--Internal  Flot js-->
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ URL::asset('assets/js/dashboard.sampledata.js') }}"></script>
    <script src="{{ URL::asset('assets/js/chart.flot.sampledata.js') }}"></script>
    <!--Internal Apexchart js-->
    <script src="{{ URL::asset('assets/js/apexcharts.js') }}"></script>
    <!-- Internal Map -->
    <script src="{{ URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <script src="{{ URL::asset('assets/js/modal-popup.js') }}"></script>
    <!--Internal  index js -->
    <script src="{{ URL::asset('assets/js/index.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.vmap.sampledata.js') }}"></script>
    @livewireScripts
    @stack('scripts')
@endsection
