@extends('layouts.master')
@section('css')

@endsection
@section('title')
    {{ trans('Fees_Invoices.Add_a_receipt') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('Fees.Accounts') }}</h4><span
                    class="mt-1 text-danger  mr-2 mb-0">/ {{ trans('Fees_Invoices.Catch_Receipt') }}
                    {{ $student->name }}</span>
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
                    <form method="post" action="{{ route('Receipts.store') }}" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ trans('Fees_Invoices.Amount') }} : </label>
                                    <input class="form-control" name="Debit" type="number">
                                    <input type="hidden" name="student_id" value="{{ $student->id }}"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ trans('Fees_Invoices.Statement') }} : </label>
                                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        @if ($sub > 0)
                            <button class="btn btn-success-gradient nextBtn py-0 btn-lg pull-right  "
                                type="submit">{{ trans('Students_trans.submit') }}</button>
                        @else
                            <a href="{{ route('Receipts.index') }}"
                                class="btn btn-danger-gradient nextBtn py-0 btn-lg pull-right  ">{{ trans('Students_trans.Close') }}</a>
                        @endif
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
