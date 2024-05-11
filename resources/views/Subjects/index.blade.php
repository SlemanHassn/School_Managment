@extends('layouts.master')
@section('css')

@endsection
@section('title')
    {{ trans('Subjects.LOAS') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('Subjects.Subject') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{ trans('Subjects.LOAS') }}</span>
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
                    <a href="{{ route('subjects.create') }}" class="btn btn-primary-gradient" role="button"
                        aria-pressed="true"> {{ trans('Subjects.Add') }}</a>
                </div>

                <div class="card-body">

                    <div class="table-responsive">
                        <table id="example1" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th> {{ trans('Subjects.Name') }}</th>
                                    <th>{{ trans('Subjects.Grade') }}</th>
                                    <th>{{ trans('Subjects.classroom') }}</th>
                                    <th>{{ trans('Subjects.Name_T') }}</th>
                                    <th>{{ trans('Subjects.Processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subjects as $subject)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $subject->name }}</td>
                                        <td>{{ $subject->grade->Name }}</td>
                                        <td>{{ $subject->classroom->Name }}</td>
                                        <td>{{ $subject->teacher->Name }}</td>
                                        <td>
                                            <a href="{{ route('subjects.edit', $subject->id) }}"
                                                class="btn btn-success-gradient btn-sm" role="button"
                                                aria-pressed="true"><i class="fa fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger-gradient btn-sm"
                                                data-toggle="modal" data-target="#delete_subject{{ $subject->id }}"
                                                title="حذف"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="delete_subject{{ $subject->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form action="{{ route('subjects.destroy', 'test') }}" method="post">
                                                {{ method_field('delete') }}
                                                {{ csrf_field() }}
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                            id="exampleModalLabel">{{ trans('Subjects.Delete_Grade') }}
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p> {{ trans('Subjects.Delete_G') }}
                                                        </p>
                                                        <input type="text" readonly value=" {{ $subject->name }}"
                                                            class="form-control">
                                                        <input type="hidden" name="id" value="{{ $subject->id }}">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit"
                                                            class="btn btn-danger-gradient">{{ trans('Subjects.Delete_Grade') }}</button>
                                                        <button type="button" class="btn btn-secondary-gradient"
                                                            data-dismiss="modal">{{ trans('Subjects.Close') }}</button>

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
