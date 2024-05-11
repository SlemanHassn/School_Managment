@extends('layouts.master')
@section('css')

@endsection
@section('title')
    {{ trans('side.list_Graduate') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('side.Students') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('side.list_Graduate') }}</span>
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

                    <a type="button" class="btn btn-primary-gradient" href='{{ route('Graduates.create') }}'>
                        {{ trans('side.add_Graduate') }}
                    </a>
                    <br><br>
                    <div class="table-responsive">
                        <table class="table text-md-nowrap text-center" id="example1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('Students_trans.name') }}</th>
                                    <th>{{ trans('Students_trans.email') }}</th>
                                    <th>{{ trans('Students_trans.gender') }}</th>
                                    <th>{{ trans('Students_trans.Grade') }}</th>
                                    <th>{{ trans('Students_trans.classrooms') }}</th>
                                    <th>{{ trans('Students_trans.section') }}</th>
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
                                        <td>
                                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                                data-target="#Return_Student{{ $student->id }}"
                                                title="{{ trans('Grades_trans.Delete') }}">ارجاع الطالب</button>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#Delete_Student{{ $student->id }}"
                                                title="{{ trans('Grades_trans.Delete') }}">حذف الطالب</button>

                                        </td>
                                    </tr>
                                    @include('Students.Graduated.return')
                                    @include('Students.Graduated.Delete')
                                @endforeach
                            </tbody>
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
