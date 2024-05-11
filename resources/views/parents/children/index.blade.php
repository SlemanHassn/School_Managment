@extends('layouts.master')
@section('css')

@endsection
@section('title')
    {{ trans('Dparent.children') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">    {{ trans('Dparent.children') }}</h4>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('Students_trans.name') }}</th>
                                    <th>{{ trans('Students_trans.email') }}</th>
                                    <th>{{ trans('Students_trans.gender') }}</th>
                                    <th>{{ trans('Students_trans.Grade') }}</th>
                                    <th>{{ trans('Students_trans.classrooms') }}</th>
                                    <th>{{ trans('Students_trans.section') }}</th>
                                    <th>{{ trans('Students_trans.academic_year') }}</th>
                                    <th>{{ trans('Students_trans.Processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->gender->Name }}</td>
                                        <td>{{ $student->grade->Name }}</td>
                                        <td>{{ $student->classroom->Name }}</td>
                                        <td>{{ $student->section->Name }}</td>
                                        <td>{{ $student->academic_year }}</td>
                                        <td>
                                            <div class="dropdown show">
                                                <a class="btn btn-primary-gradient btn-sm dropdown-toggle" href="#"
                                                    role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    {{ trans('Students_trans.Processes') }}
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item"
                                                        href="{{ route('degrees',$student->id) }}"><i
                                                            style="color: #ffc107" class="far fa-eye "></i>&nbsp;
                                                       {{ trans('Dparent.View_test_results') }}</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>

    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')

@endsection
