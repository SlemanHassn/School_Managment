@extends('layouts.master')

@section('css')
@endsection
@section('title')
    {{ trans('Teacher_trans.Add_Teacher') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('side.Teachers') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('Teacher_trans.Add_Teacher') }}</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('Fees.update', 'test') }}" method="post" autocomplete="off">
                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputEmail4">{{ trans('Fees.Name_ar') }}</label>
                                <input type="text" value="{{ $fee->getTranslation('title', 'ar') }}" name="title_ar"
                                    class="form-control">
                                <input type="hidden" value="{{ $fee->id }}" name="id" class="form-control">
                            </div>

                            <div class="form-group col">
                                <label for="inputEmail4">{{ trans('Fees.Name_en') }}</label>
                                <input type="text" value="{{ $fee->getTranslation('title', 'en') }}" name="title_en"
                                    class="form-control">
                            </div>


                            <div class="form-group col">
                                <label for="inputEmail4">{{ trans('Fees.Amount') }}</label>
                                <input type="number" value="{{ $fee->amount }}" name="amount" class="form-control">
                            </div>

                        </div>


                        <div class="form-row">

                            <div class="form-group col">
                                <label for="inputState">{{ trans('Students_trans.Grade') }}</label>
                                <select class="custom-select mr-sm-2" name="Grade_id">
                                    @foreach ($Grades as $Grade)
                                        <option value="{{ $Grade->id }}"
                                            {{ $Grade->id == $fee->Grade_id ? 'selected' : '' }}>{{ $Grade->Name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="inputZip">{{ trans('Students_trans.classrooms') }}</label>
                                <select class="custom-select mr-sm-2" name="Classroom_id">
                                    <option value="{{ $fee->Classroom_id }}">{{ $fee->classroom->Name }}</option>
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="inputZip">{{ trans('Students_trans.academic_year') }}</label>
                                <select class="custom-select mr-sm-2" name="year">
                                    @php
                                        $current_year = date('Y');
                                    @endphp
                                    @for ($year = $current_year; $year <= $current_year + 1; $year++)
                                        <option value="{{ $year }}" {{ $year == $fee->year ? 'selected' : ' ' }}>
                                            {{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="inputZip">{{ trans('grade.Type_Fee') }}</label>
                                <select class="custom-select mr-sm-2" name="Type_Fee">
                                    <option disabled>{{ trans('myParents.Choose') }}...</option>
                                    <option {{ $fee->Type_Fee == 1 ? 'selected' : ' ' }} value="1">رسوم دراسية
                                    </option>
                                    <option {{ $fee->Type_Fee == 2 ? 'selected' : ' ' }} value="2">رسوم باص خط واحد
                                    </option>
                                    <option {{ $fee->Type_Fee == 3 ? 'selected' : ' ' }} value="3">رسوم باص خطين
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputAddress">{{ trans('grade.Notes') }}</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="4">{{ $fee->description }}</textarea>
                        </div>
                        <br>

                        <button type="submit" class="btn btn-success-gradient">{{ trans('grade.Edit') }}</button>

                    </form>

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
