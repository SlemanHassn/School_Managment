@extends('layouts.master')
@section('css')

@endsection
@section('title')
    {{ trans('Dparent.Financial_report') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> {{ trans('Dparent.Financial_report') }}
                </h4>
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
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr class>
                                    <th>#</th>
                                    <th>{{ trans('Dparent.Name') }}</th>
                                    <th>{{ trans('Dparent.Fees_type') }}</th>
                                    <th>{{ trans('Dparent.Amount') }}</th>
                                    <th>{{ trans('Dparent.description') }}</th>
                                    <th>{{ trans('Dparent.Grade') }}</th>
                                    <th>{{ trans('Dparent.classroom') }}</th>
                                    <th>{{ trans('Dparent.Processes') }}</th>
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
                                            <a href="{{ route('sonsReceipt', $Fee_invoice->student_id) }}"
                                                title="{{ trans('Dparent.Payments') }}"
                                                class="btn btn-warning-gradient btn-sm" role="button"
                                                aria-pressed="true"><i class="fa fa-donate"></i></a>
                                        </td>
                                    </tr>
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
