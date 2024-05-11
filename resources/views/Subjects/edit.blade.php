@extends('layouts.master')
@section('css')

@endsection
@section('title')
    {{ trans('Subjects.Edit_G') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('Subjects.Subject') }}</h4><span
                    class="mt-1 text-danger  mr-2 mb-0">/ {{ trans('Subjects.Edit_G') }}
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

                    <form action="{{ route('subjects.update', 'test') }}" method="post" autocomplete="off">
                        {{ method_field('patch') }}
                        @csrf
                        <div class="form-row">
                            <div class="col">
                                <label for="title">{{ trans('Subjects.Name_ar') }}</label>
                                <input type="text" name="Name_ar" value="{{ $subject->getTranslation('name', 'ar') }}"
                                    class="form-control">
                                <input type="hidden" name="id" value="{{ $subject->id }}">
                            </div>
                            <div class="col">
                                <label for="title">{{ trans('Subjects.Name_en') }}</label>
                                <input type="text" name="Name_en" value="{{ $subject->getTranslation('name', 'en') }}"
                                    class="form-control">
                            </div>
                        </div>
                        <br>

                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputState">{{ trans('Subjects.Grade') }}</label>
                                <select class="form-control " name="Grade_id">
                                    <option selected disabled>{{ trans('Parent_trans.Choose') }}...</option>
                                    @foreach ($grades as $grade)
                                        <option value="{{ $grade->id }}"
                                            {{ $grade->id == $subject->grade_id ? 'selected' : '' }}>
                                            {{ $grade->Name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="inputState">{{ trans('Subjects.classroom') }}</label>
                                <select name="Class_id" class="form-control">
                                    <option value="{{ $subject->classroom->id }}">{{ $subject->classroom->Name_Class }}
                                    </option>
                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="inputState">{{ trans('Subjects.Name_T') }}</label>
                                <select class="form-control " name="teacher_id">
                                    <option selected disabled>{{ trans('Parent_trans.Choose') }}...</option>
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}"
                                            {{ $teacher->id == $subject->teacher_id ? 'selected' : '' }}>
                                            {{ $teacher->Name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-success-gradient py-0 nextBtn btn-lg pull-right" type="submit">حفظ
                            البيانات
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
