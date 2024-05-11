@extends('layouts.master')
@section('css')
@endsection
@section('title')
    {{ trans('Students_trans.List_of_attendance_and_absence') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('Fees.Accounts') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{ trans('Students_trans.List_of_attendance_and_absence') }}</span>
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
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('DTeacher.Grade_N') }}</th>
                                    <th>{{ trans('DTeacher.Section_N') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sections as $section)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $section->Grades->Name }}</td>
                                        <td>{{ $section->Name }}</td>
                                    </tr>
                                @endforeach
                        </table>

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
