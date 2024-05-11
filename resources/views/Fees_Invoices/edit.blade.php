@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <!---Internal  Multislider css-->
    <link href="{{ URL::asset('assets/plugins/multislider/multislider.css') }}" rel="stylesheet">
    <!--- Select2 css -->
    <link href="{{ URL::asset('assets/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
@endsection
@section('title')
    {{ trans('Fees_Invoices.Fee_invoices_Edit') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('Fees.Accounts') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('Fees_Invoices.Fee_invoices_Edit') }}</span>
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

                    <form action="{{ route('FeeInvoices.update', 'test') }}" method="post" autocomplete="off">
                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputEmail4">{{ trans('Fees_Invoices.student_name') }}</label>
                                <input type="text" value="{{ $fee_invoices->student->name }}" readonly name="title_ar"
                                    class="form-control">
                                <input type="hidden" value="{{ $fee_invoices->id }}" name="id" class="form-control">
                            </div>


                            <div class="form-group col">
                                <label for="inputEmail4">{{ trans('Fees_Invoices.Amount') }}</label>
                                <input type="number" value="{{ $fee_invoices->amount }}" name="amount"
                                    class="form-control">
                            </div>

                        </div>


                        <div class="form-row">

                            <div class="form-group col">
                                <label for="inputZip">{{ trans('Fees_Invoices.Type_of_fees') }}</label>
                                <select class="form-control " name="fee_id">
                                    @foreach ($fees as $fee)
                                        <option value="{{ $fee->id }}"
                                            {{ $fee->id == $fee_invoices->fee_id ? 'selected' : '' }}>{{ $fee->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="inputAddress">{{ trans('Fees_Invoices.Statement') }}</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="4">{{ $fee_invoices->description }}</textarea>
                        </div>
                        <br>

                        <button type="submit"
                            class="btn btn-success-gradient">{{ trans('Students_trans.update') }}</button>
                        <a href="{{ route('FeeInvoices.index') }}"
                            class="btn btn-danger-gradient">{{ trans('Students_trans.Close') }}</a>

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
    <script type="text/javascript">
        $('.repeater').repeater();
    </script>
@endsection
