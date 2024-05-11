@extends('layouts.master')
@section('css')

@endsection
@section('title')
    {{ trans('tests.List_L') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('tests.library') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{ trans('tests.List_L') }}</span>
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
                    <a href="{{ route('library.create') }}" class="btn btn-primary-gradient" role="button"
                        aria-pressed="true">{{ trans('tests.book_add') }}</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('tests.book_n') }}</th>
                                    <th>{{ trans('tests.Teacher_name') }}</th>
                                    <th>{{ trans('tests.Grade') }}</th>
                                    <th>{{ trans('tests.classroom') }}</th>
                                    <th>{{ trans('tests.section') }}</th>
                                    <th>{{ trans('tests.Processes') }}</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $book->title }}</td>
                                        <td>{{ $book->teacher->Name }}</td>
                                        <td>{{ $book->grade->Name }}</td>
                                        <td>{{ $book->classroom->Name }}</td>
                                        <td>{{ $book->section->Name }}</td>
                                        <td>
                                            <a href="{{ route('downloadAttachment', $book->file_name) }}"
                                                title="{{ trans('tests.d_book') }}" class="btn btn-info-gradient btn-sm"
                                                role="button" aria-pressed="true"><i class="fas fa-download"></i></a>
                                            <a href="{{ route('library.edit', $book->id) }}"
                                                class="btn btn-success-gradient btn-sm" role="button" aria-pressed="true"
                                                title="{{ trans('tests.Book_Edit') }}"><i class="fa fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger-gradient btn-sm"
                                                data-toggle="modal" data-target="#delete_book{{ $book->id }}"
                                                title="{{ trans('tests.Delete') }}"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>

                                    @include('library.destroy')
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
