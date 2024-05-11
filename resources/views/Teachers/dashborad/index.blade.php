@extends('layouts.master')
@section('css')
    @livewireStyles
    <!--  Owl-carousel css-->
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
    <!-- Maps css -->
    <link href="{{ URL::asset('assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">
@endsection
@section('title')
    {{ trans('DTeacher.Dash') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">{{ trans('DTeacher.Dash') }} {{ auth()->user()->Name }}
                </h2>
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-6 col-lg-6 col-md-6 col-xm-12 ">
            <div class="card overflow-hidden sales-card bg-primary-gradient ">
                <div class="pl-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 mt-2 tx-20 text-white">Section number</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="">
                            <h4 class="tx-20 font-weight-bold mb-1 text-center text-white">
                                {{ $countSection }}</h4>
                        </div>
                    </div>

                </div>
                <a href="{{ route('sections') }}" class="btn py-0 text-center btn-block w-50  m-auto btn-primary-gradient">
                    Show Details
                </a>
                <span id="compositeline" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-danger-gradient ">
                <div class="pl-3  pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 mt-2 tx-20 text-white">Student Number</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="">
                            <h4 class="tx-20 font-weight-bold mb-1 text-center text-white">
                                {{ $countStudent }}</h4>
                        </div>
                    </div>
                </div>
                <a href="{{ route('Tstudent') }}" class="btn py-0 text-center btn-block w-50  m-auto btn-danger-gradient ">
                    Show Details
                </a>
                <span id="compositeline2" class="pt-1">3,2,4,6,12,14,8,7,14,16,12,7,8,4,3,2,2,5,6,7</span>
            </div>
        </div>

    </div>
    <!-- row closed -->

    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-md-12 col-lg-12">
            <div class="card ">
                <div class="text-wrap">
                    <div class="example">
                        <div class="panel panel-primary tabs-style-2">
                            <div class=" tab-menu-heading">
                                <div class="tabs-menu1 d-flex align-items-center justify-content-between">
                                    <!-- Tabs -->
                                    <ul class="nav panel-tabs main-nav-line">
                                        <li><a href="#tab4" class="nav-link active" data-toggle="tab">Student</a></li>
                                        <li><a href="#tab5" class="nav-link" data-toggle="tab">Teachers</a></li>
                                        <li><a href="#tab6" class="nav-link" data-toggle="tab">Parents</a></li>
                                    </ul>
                                    <div class="mr-3">
                                        {{ trans('DTeacher.Latest') }}
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body tabs-menu-body main-content-body-right border">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab4">
                                        <div class="table-responsive">
                                            <table class="table text-center text-md-nowrap">
                                                <thead class="bg-primary-gradient">
                                                    <tr>
                                                        <th class="p-2 text-white">#</th>
                                                        <th class="p-2 text-white">{{ trans('Students_trans.name') }}</th>
                                                        <th class="p-2 text-white">{{ trans('Students_trans.email') }}</th>
                                                        <th class="p-2 text-white">{{ trans('Students_trans.gender') }}
                                                        </th>
                                                        <th class="p-2 text-white">{{ trans('Students_trans.Grade') }}</th>
                                                        <th class="p-2 text-white">{{ trans('Students_trans.classrooms') }}
                                                        </th>
                                                        <th class="p-2 text-white">{{ trans('Students_trans.section') }}
                                                        </th>
                                                        <th class="p-2 text-white">
                                                            {{ trans('Students_trans.academic_year') }}</th>
                                                        <th class="p-2 text-white">
                                                            {{ trans('Students_trans.created_at') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse(\App\Models\students::latest()->take(5)->get() as $student)
                                                        <tr>
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td>{{ $student->name }}</td>
                                                            <td>{{ $student->email }}</td>
                                                            <td>{{ $student->gender->Name }}</td>
                                                            <td>{{ $student->grade->Name }}</td>
                                                            <td>{{ $student->classroom->Name }}</td>
                                                            <td>{{ $student->section->Name }}</td>
                                                            <td>{{ $student->academic_year }}</td>
                                                            <td>{{ $student->created_at }}</td>
                                                        </tr>
                                                    @empty
                                                        <td class="alert-primary" colspan="8">لاتوجد بيانات</td>
                                                    @endforelse
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab5">
                                        <div class="table-responsive">
                                            <table class="table text-center text-md-nowrap">
                                                <thead class="bg-danger-gradient">
                                                    <tr>
                                                        <th class="p-2 text-white">#</th>
                                                        <th class="p-2 text-white">
                                                            {{ trans('Teacher_trans.Name_Teacher') }}</th>
                                                        <th class="p-2 text-white">{{ trans('Teacher_trans.Email') }}</th>
                                                        <th class="p-2 text-white">{{ trans('Teacher_trans.Gender') }}
                                                        </th>
                                                        <th class="p-2 text-white">
                                                            {{ trans('Teacher_trans.Joining_Date') }}</th>
                                                        <th class="p-2 text-white">
                                                            {{ trans('Teacher_trans.specialization') }}</th>
                                                        <th class="p-2 text-white">
                                                            {{ trans('Students_trans.created_at') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse(\App\Models\teachers::latest()->take(5)->get() as $Teacher)
                                                        <tr>
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td>{{ $Teacher->Name }}</td>
                                                            <td>{{ $Teacher->email }}</td>
                                                            <td>{{ $Teacher->genders->Name }}</td>
                                                            <td>{{ $Teacher->Joining_Date }}</td>
                                                            <td>{{ $Teacher->specializations->Name }}</td>
                                                            <td>{{ $Teacher->created_at }}</td>

                                                        </tr>
                                                    @empty
                                                        <td class="alert-danger" colspan="8">لاتوجد بيانات</td>
                                                    @endforelse

                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab6">
                                        <div class="table-responsive">
                                            <table class="table text-center text-md-nowrap">
                                                <thead class="bg-success-gradient">
                                                    <tr>
                                                        <th class="p-2 text-white">#</th>
                                                        <th class="p-2 text-white">{{ trans('myParents.Email') }}</th>
                                                        <th class="p-2 text-white">{{ trans('myParents.Name_F') }}</th>
                                                        <th class="p-2 text-white">{{ trans('myParents.Name_M') }}</th>
                                                        <th class="p-2 text-white">{{ trans('myParents.Phone_F') }}</th>
                                                        <th class="p-2 text-white">{{ trans('myParents.Phone_M') }}</th>
                                                        <th class="p-2 text-white">
                                                            {{ trans('Students_trans.created_at') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse(\App\Models\myParent::latest()->take(5)->get() as $my_parent)
                                                        <tr>
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td>{{ $my_parent->email }}</td>
                                                            <td>{{ $my_parent->Name_Father }}</td>
                                                            <td>{{ $my_parent->Name_Mother }}</td>
                                                            <td>{{ $my_parent->Phone_Father }}</td>
                                                            <td>{{ $my_parent->Phone_Mother }}</td>
                                                            <td>{{ $my_parent->created_at }}</td>

                                                        </tr>
                                                    @empty
                                                        <td class="alert-success" colspan="8">لاتوجد بيانات</td>
                                                    @endforelse

                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row closed -->

            <!-- row opened -->
            <div class="row row-sm">
                <div class="col-md-12 col-lg-12">
                    <div class="card ">
                        <div class="card-body">
                            <livewire:calendar />
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-12 col-lg-6">

                </div>
                <div class="col-xl-4 col-md-12 col-lg-6">

                </div>
            </div>

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
