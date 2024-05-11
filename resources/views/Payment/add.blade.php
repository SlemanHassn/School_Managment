{{-- --}}

@extends('layouts.master')
@section('css')

@endsection
@section('title')
    اضافة سند صرف
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('Fees.Accounts') }}</h4><span
                    class="mt-1 text-danger  mr-2 mb-0">/ سند صرف {{ $student->name }}</span>
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
                    <form method="post" action="{{ route('Payment.store') }}" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>المبلغ : </label>
                                    <input class="form-control" name="Debit" type="number">
                                    <input type="hidden" name="student_id" value="{{ $student->id }}"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>رصيد الطالب : </label>
                                    <input class="form-control" name="final_balance"
                                        value="{{ number_format($student->student_account->sum('Debit') - $student->student_account->sum('credit'), 2) }}"
                                        type="text" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>البيان : </label>
                                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success-gradient py-0 nextBtn btn-lg pull-right"
                            type="submit">{{ trans('Students_trans.submit') }}</button>
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
