@extends('layouts.master')
@section('css')

@endsection
@section('title')
    {{ trans('Fees_Invoices.Fee_invoices') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('Fees.Accounts') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('Fees_Invoices.Fee_invoices') }}</span>
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

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap text-center" id="example1">
                            <thead>
                                <tr class="">
                                    <th>#</th>
                                    <th>{{ trans('Fees_Invoices.Name') }}</th>
                                    <th>{{ trans('Fees_Invoices.Type_of_fees') }}</th>
                                    <th>{{ trans('Fees_Invoices.Amount') }}</th>
                                    <th>{{ trans('Fees_Invoices.Grade_N') }}</th>
                                    <th>{{ trans('Fees_Invoices.Classroom') }}</th>
                                    <th>{{ trans('Fees_Invoices.Statement') }}</th>
                                    <th>{{ trans('Fees_Invoices.Processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Fee_invoices as $Fee_invoice)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $Fee_invoice->student->name }}</td>
                                        <td>{{ $Fee_invoice->fees->title }}</td>
                                        <td>{{ number_format($Fee_invoice->amount, 2) }}</td>
                                        <td>{{ $Fee_invoice->grade->Name }}</td>
                                        <td>{{ $Fee_invoice->classroom->Name }}</td>
                                        <td>{{ $Fee_invoice->description }}</td>
                                        <td>
                                            <a href="{{ route('FeeInvoices.edit', [$Fee_invoice->id]) }}"
                                                class="btn btn-success-gradient btn-sm" role="button"
                                                aria-pressed="true"><i class="fa fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger-gradient btn-sm"
                                                data-toggle="modal"
                                                data-target="#Delete_Fee_invoice{{ $Fee_invoice->id }}"><i
                                                    class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    @include('Fees_Invoices.Delete')
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
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
