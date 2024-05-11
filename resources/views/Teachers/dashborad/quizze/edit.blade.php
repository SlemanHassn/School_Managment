@extends('layouts.master')
@section('css')

@endsection
@section('title')
    {{ trans('tests.Edit_test') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('tests.Tests') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('tests.Edit_test') }}
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

                    <form action="{{ route('Tquizze.update', 'test') }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-row">

                            <div class="col">
                                <label for="title">{{ trans('tests.Test_name_ar') }}</label>
                                <input type="text" name="Name_ar" value="{{ $quizz->getTranslation('name', 'ar') }}"
                                    class="form-control">
                                <input type="hidden" name="id" value="{{ $quizz->id }}">
                            </div>

                            <div class="col">
                                <label for="title">{{ trans('tests.Test_name_en') }}</label>
                                <input type="text" name="Name_en" value="{{ $quizz->getTranslation('name', 'en') }}"
                                    class="form-control">
                            </div>
                        </div>
                        <br>

                        <div class="form-row">

                            <div class="col">
                                <div class="form-group">
                                    <label for="Grade_id">{{ trans('tests.Subject') }}</label>
                                    <select class="form-control" name="subject_id">
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}"
                                                {{ $subject->id == $quizz->subject_id ? 'selected' : '' }}>
                                                {{ $subject->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                        </div>

                        <div class="form-row">

                            <div class="col">
                                <div class="form-group">
                                    <label for="Grade_id">{{ trans('Students_trans.Grade') }} :</label>
                                    <select class="form-control" name="Grade_id">
                                        @foreach ($grades as $grade)
                                            <option value="{{ $grade->id }}"
                                                {{ $grade->id == $quizz->grade_id ? 'selected' : '' }}>{{ $grade->Name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="Classroom_id">{{ trans('Students_trans.classrooms') }} :</label>
                                    <select class="form-control" name="Classroom_id">
                                        <option value="{{ $quizz->classroom_id }}">{{ $quizz->classroom->Name }}
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="section_id">{{ trans('Students_trans.section') }} : </label>
                                    <select class="form-control" name="section_id">
                                        <option value="{{ $quizz->section_id }}">{{ $quizz->section->Name }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div><br>
                        <button class="btn btn-success-gradient py-0 nextBtn btn-lg pull-right" type="submit">
                            {{ trans('tests.U_data') }}
                        </button>
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
    <script>
        $(document).ready(function() {
            $('select[name="Grade_id"]').on('change', function() {
                var Grade_id = $(this).val();
                if (Grade_id) {
                    $.ajax({
                        url: "{{ URL::to('classes') }}/" + Grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="Class_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="Class_id"]').append('<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
@endsection
