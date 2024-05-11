@extends('layouts.master')
@section('css')

@endsection
@section('title')
    {{ trans('Fees_Invoices.Amending_the_receipt_voucher') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('Fees.Accounts') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{ trans('Fees_Invoices.Amending_the_receipt_voucher') }}</span>
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
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('Receipts.update', 'test') }}" method="post" autocomplete="off">
                        @method('PUT')
                        @csrf
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> {{ trans('Fees_Invoices.Amount') }} : </label>
                                    <input class="form-control" name="Debit" value="{{ $receipt_student->Debit }}"
                                        type="number">
                                    <input type="hidden" name="student_id" value="{{ $receipt_student->student->id }}"
                                        class="form-control">
                                    <input type="hidden" name="id" value="{{ $receipt_student->id }}"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> {{ trans('Fees_Invoices.Statement') }} : </label>
                                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{ $receipt_student->description }}</textarea>
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
