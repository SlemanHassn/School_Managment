@extends('layouts.master')
@section('css')

@endsection
@section('title')
    {{ trans('side.add_Graduate') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('side.Students') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('side.add_Graduate') }}</span>
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
                    @if (Session::has('error_Graduated'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ Session::get('error_Graduated') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
                <div class="card-body ">
                    <form action="{{ route('Graduates.store') }}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputState">{{ trans('Students_trans.Grade') }}</label>
                                <select class="custom-select " name="Grade_id" required>
                                    <option selected disabled>{{ trans('myParents.Choose') }}...</option>
                                    @foreach ($Grades as $Grade)
                                        <option value="{{ $Grade->id }}">{{ $Grade->Name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="Classroom_id">{{ trans('Students_trans.classrooms') }} :</label>
                                <select class="custom-select " name="Classroom_id" required>

                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="section_id">{{ trans('Students_trans.section') }} : </label>
                                <select class="custom-select " name="section_id" required>

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

                        <button type="submit" class="btn btn-primary">{{ trans('Students_trans.submit_s') }}</button>
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
