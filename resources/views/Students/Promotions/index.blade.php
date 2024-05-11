@extends('layouts.master')
@section('css')

@endsection
@section('title')
    {{ trans('Students_trans.Students_Promotions') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('side.Students') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/{{ trans('Students_trans.Students_Promotions') }}</span>
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
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-solid-danger rounded mb-2 mg-b-0" role="alert">
                                <button aria-label="Close" class="close " data-dismiss="alert" type="button">
                                    <span aria-hidden="true">&times;</span></button>
                                <strong> {{ $error }}</li></strong>
                            </div>
                        @endforeach
                    @endif
                    @if (Session::has('error_promotions'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ Session::get('error_promotions') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
                <div class="card-body pt-0">


                    <h6 style="font-family: Cairo ; font-size:20px; font-style:italic">
                        {{ trans('Students_trans.oldGrade') }}
                    </h6><br>

                    <form method="post" action="{{ route('Promotions.store') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputState">{{ trans('Students_trans.Grade') }}</label>
                                <select class="custom-select mr-sm-2" name="Grade_id" required>
                                    <option selected disabled>{{ trans('myPArents.Choose') }}...</option>
                                    @foreach ($Grades as $Grade)
                                        <option value="{{ $Grade->id }}">{{ $Grade->Name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="Classroom_id">{{ trans('Students_trans.classrooms') }} :</label>
                                <select class="custom-select mr-sm-2" name="Classroom_id" required>

                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="section_id">{{ trans('Students_trans.section') }} : </label>
                                <select class="custom-select mr-sm-2" name="section_id" required>

                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="academic_year">{{ trans('Students_trans.academic_year') }} : </label>
                                <select class="custom-select mr-sm-2" name="academic_year">
                                    <option selected disabled>{{ trans('myPArents.Choose') }}...</option>
                                    @php
                                        $current_year = date('Y');
                                    @endphp
                                    @for ($year = $current_year; $year <= $current_year + 1; $year++)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                                @error('academic_year')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <h6 style="font-family: Cairo ; font-size:20px;font-style:italic">
                            {{ trans('Students_trans.newGrade') }}
                        </h6><br>

                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputState">{{ trans('Students_trans.Grade') }}</label>
                                <select class="custom-select mr-sm-2" name="Grade_id_new">
                                    <option selected disabled>{{ trans('myPArents.Choose') }}...</option>
                                    @foreach ($Grades as $Grade)
                                        <option value="{{ $Grade->id }}">{{ $Grade->Name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="Classroom_id">{{ trans('Students_trans.classrooms') }}: </label>
                                <select class="custom-select mr-sm-2" name="Classroom_id_new">

                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="section_id">:{{ trans('Students_trans.section') }} </label>
                                <select class="custom-select mr-sm-2" name="section_id_new">

                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="academic_year_new">{{ trans('Students_trans.academic_year') }} : </label>
                                <select class="custom-select mr-sm-2 " name="academic_year_new">
                                    <option selected disabled>{{ trans('myPArents.Choose') }}...</option>
                                    @php
                                        $current_year = date('Y');
                                    @endphp
                                    @for ($year = $current_year; $year <= $current_year + 1; $year++)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                                @error('academic_year_new')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit"
                            class="btn btn-success-gradient">{{ trans('Students_trans.submit_s') }}</button>
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
