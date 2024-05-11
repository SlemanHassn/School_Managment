@extends('layouts.master')
@section('css')

@endsection
@section('title')
    {{ trans('tests.List_tests') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('tests.Tests') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{ trans('tests.List_tests') }}</span>
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
                <div class="card-header">
                    <a href="{{ route('Tquizze.create') }}" class="btn btn-primary-gradient" role="button"
                        aria-pressed="true">{{ trans('tests.Add_test') }}</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('tests.Test_name') }}</th>
                                    <th>{{ trans('tests.Grade') }}</th>
                                    <th>{{ trans('tests.classroom') }}</th>
                                    <th>{{ trans('tests.section') }}</th>
                                    <th>{{ trans('tests.Processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($quizzes as $quizze)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $quizze->name }}</td>
                                        <td>{{ $quizze->grade->Name }}</td>
                                        <td>{{ $quizze->classroom->Name }}</td>
                                        <td>{{ $quizze->section->Name }}</td>
                                        <td>
                                            <div class="dropdown show">
                                                <a class="btn btn-primary-gradient btn-sm dropdown-toggle" href="#"
                                                    role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    {{ trans('Students_trans.Processes') }}
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a href="{{ route('Tquizze.edit', $quizze->id) }}"
                                                        title="{{ trans('DTeacher.edit') }}" class="dropdown-item"
                                                        role="button" aria-pressed="true"><i
                                                            class="fa fa-edit text-success"></i>&nbsp;{{ trans('DTeacher.edit') }}</a>
                                                    <button type="button" class="dropdown-item" data-toggle="modal"
                                                        data-target="#delete_exam{{ $quizze->id }}"
                                                        title="{{ trans('DTeacher.Delete') }}"><i
                                                            class="fa fa-trash text-danger"></i>
                                                        &nbsp;{{ trans('DTeacher.Delete') }}
                                                    </button>
                                                    <a href="{{ route('Tquizze.show', $quizze->id) }}"
                                                        class="dropdown-item" role="button"
                                                        title="{{ trans('DTeacher.showquestions') }}"
                                                        aria-pressed="true"><i class="fa fa-eye  text-warning"></i>
                                                        &nbsp; {{ trans('DTeacher.showquestions') }}
                                                    </a>
                                                    <a href="{{ route('Tquizze.showMarks', $quizze->id) }}"
                                                        class="dropdown-item " role="button" aria-pressed="true"><i
                                                            class="fa fa-eye text-info"></i>
                                                        &nbsp; {{ trans('DTeacher.showmarks') }}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="delete_exam{{ $quizze->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form action="{{ route('Tquizze.destroy', 'test') }}" method="post">
                                                {{ method_field('delete') }}
                                                {{ csrf_field() }}
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                            id="exampleModalLabel">{{ trans('tests.D_test') }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p> {{ trans('tests.D_F') }}
                                                            {{ $quizze->name }}</p>
                                                        <input type="hidden" name="id" value="{{ $quizze->id }}">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit"
                                                            class="btn btn-danger-gradient">{{ trans('tests.Delete') }}</button>
                                                        <button type="button" class="btn btn-secondary-gradient"
                                                            data-dismiss="modal">{{ trans('tests.Close') }}</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
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
