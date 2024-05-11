@extends('layouts.master')
@section('css')

@endsection
@section('title')
    {{ trans('tests.List_q') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('tests.Tests') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{ trans('tests.List_q') }}
                    <span class="text-danger">{{ $quizze->name }}</span>
                </span>
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
                    <a href="{{ route('Tquizze.addQuestions', $quizze->id) }}" class="btn btn-primary-gradient"
                        role="button" aria-pressed="true">
                        {{ trans('tests.question_add') }}</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{ trans('tests.question') }}</th>
                                    <th scope="col">{{ trans('tests.answers') }}</th>
                                    <th scope="col">{{ trans('tests.correct_a') }}</th>
                                    <th scope="col">{{ trans('tests.Mark') }}</th>
                                    <th scope="col">{{ trans('tests.Test_name') }}</th>
                                    <th scope="col">{{ trans('tests.Processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($questions as $question)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $question->title }}</td>
                                        <td>{{ $question->answers }}</td>
                                        <td>{{ $question->right_answer }}</td>
                                        <td>{{ $question->score }}</td>
                                        <td>{{ $question->quizze->name }}</td>
                                        <td>
                                            <a href="{{ route('Tquizze.editQuestions', $question->id) }}"
                                                class="btn btn-success-gradient btn-sm" role="button"
                                                aria-pressed="true"><i class="fa fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger-gradient btn-sm"
                                                data-toggle="modal" data-target="#delete_exam{{ $question->id }}"
                                                title="حذف"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="delete_exam{{ $question->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form action="{{ route('RQuestions') }}" method="post">
                                                @csrf
                                                {{-- @method('delete') --}}
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                            id="exampleModalLabel">
                                                            {{ trans('tests.D_question') }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p> {{ trans('tests.D_F') }} {{ $question->name }}</p>
                                                        <input type="hidden" name="id" value="{{ $question->id }}">
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
