@extends('layouts.master')
@section('css')

@endsection
@section('title')
    {{ trans('tests.question_add') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('tests.Tests') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{ trans('tests.question_add') }}
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
                <div class="card-head">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-solid-danger rounded mb-2 mg-b-0" role="alert">
                                <button aria-label="Close" class="close " data-dismiss="alert" type="button">
                                    <span aria-hidden="true">&times;</span></button>
                                <strong> {{ $error }}</li></strong>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="card-body">

                    <form action="{{ route('Tquizze.storeQuestions') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="form-row">

                            <div class="col">
                                <label for="title">{{ trans('tests.Question_name_ar') }}</label>
                                <input type="text" name="title_ar" id="input-name" class="form-control " autofocus>
                            </div>
                            <div class="col">
                                <label for="title">{{ trans('tests.Question_name_en') }}</label>
                                <input type="text" name="title_en" id="input-name" class="form-control " autofocus>
                            </div>
                        </div>
                        <br>

                        <div class="form-row">
                            <div class="col">
                                <label for="title">{{ trans('tests.Answers_name_ar') }}</label>
                                <textarea name="answers_ar" class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                            </div>
                            <div class="col">
                                <label for="title">{{ trans('tests.Answers_name_en') }}</label>
                                <textarea name="answers_en" class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                            </div>
                        </div>
                        <br>

                        <div class="form-row">
                            <div class="col">
                                <label for="title">{{ trans('tests.correct_a_ar') }}</label>
                                <input type="text" name="right_answer_ar" id="input-name" class="form-control "
                                    autofocus>
                            </div>
                            <div class="col">
                                <label for="title">{{ trans('tests.correct_a_en') }}</label>
                                <input type="text" name="right_answer_en" id="input-name" class="form-control "
                                    autofocus>
                            </div>
                        </div>
                        <br>

                        <div class="form-row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="Grade_id">{{ trans('tests.Test_name') }}</label>
                                    <select class="form-control" name="quizze_id">
                                        <option selected value="{{ $quizzes->id }}">{{ $quizzes->name }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="Grade_id">{{ trans('tests.Mark') }}</label>
                                    <select class="form-control" name="score">
                                        <option selected disabled>{{ trans('tests.mark_select') }}..</option>
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="15">15</option>
                                        <option value="20">20</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-success-gradient py-0 nextBtn btn-lg pull-right" type="submit">
                            {{ trans('tests.S_data') }}</button>
                    </form>

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
