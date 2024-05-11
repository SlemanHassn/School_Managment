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
                <div class="card-header pb-0">
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

                    @if (session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">


                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="{{ route('Teachers.store') }}" method="post">
                                @csrf
                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">{{ trans('Teacher_trans.Email') }}</label>
                                        <input type="email" name="email" class="form-control">
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="title">{{ trans('Teacher_trans.Password') }}</label>
                                        <input type="password" name="password" class="form-control">
                                        @error('password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>


                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">{{ trans('Teacher_trans.Name_ar') }}</label>
                                        <input type="text" name="Name_ar" class="form-control">
                                        @error('Name_ar')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="title">{{ trans('Teacher_trans.Name_en') }}</label>
                                        <input type="text" name="Name_en" class="form-control">
                                        @error('Name_en')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="inputCity">{{ trans('Teacher_trans.specialization') }}</label>
                                        <select class="form-control" name="Specialization_id">
                                            <option selected disabled>{{ trans('myParents.Choose') }}...</option>
                                            @foreach ($specializations as $specialization)
                                                <option value="{{ $specialization->id }}">{{ $specialization->Name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('Specialization_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col">
                                        <label for="inputState">{{ trans('Teacher_trans.Gender') }}</label>
                                        <select class="form-control" name="Gender_id">
                                            <option selected disabled>{{ trans('myParents.Choose') }}...</option>
                                            @foreach ($genders as $gender)
                                                <option value="{{ $gender->id }}">{{ $gender->Name }}</option>
                                            @endforeach
                                        </select>
                                        @error('Gender_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col">
                                        <label for="title">{{ trans('Teacher_trans.Joining_Date') }}</label>
                                        <div class='input-group date'>
                                            <input class="form-control fc-datepicker" type="date" id="datepicker-action"
                                                name="Joining_Date" data-date-format="yyyy-mm-dd" required>
                                        </div>
                                        @error('Joining_Date')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">{{ trans('Teacher_trans.Address') }}</label>
                                    <textarea class="form-control" name="Address" id="exampleFormControlTextarea1" rows="4"></textarea>
                                    @error('Address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button class="btn btn-success-gradient py-0 nextBtn btn-lg pull-right"
                                    type="submit">{{ trans('Teacher_trans.Add_Teacher') }}</button>
                            </form>
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
