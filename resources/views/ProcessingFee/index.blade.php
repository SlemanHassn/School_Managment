@extends('layouts.master')
@section('css')

@endsection
@section('title')
    {{ trans('Fees_Invoices.Fee_processing') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('Fees.Accounts') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{ trans('Fees_Invoices.Fee_processing') }}</span>
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
                        <table id="example1" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr class="">
                                    <th>#</th>
                                    <th>{{ trans('Fees_Invoices.Name') }}</th>
                                    <th>{{ trans('Fees_Invoices.Amount') }}</th>
                                    <th>{{ trans('Fees_Invoices.Statement') }}</th>
                                    <th>{{ trans('Fees_Invoices.Processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ProcessingFees as $ProcessingFee)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $ProcessingFee->student->name }}</td>
                                        <td>{{ number_format($ProcessingFee->amount, 2) }}</td>
                                        <td>{{ $ProcessingFee->description }}</td>
                                        <td>
                                            <a href="{{ route('ProcessingFee.edit', $ProcessingFee->id) }}"
                                                class="btn btn-success-gradient btn-sm" role="button"
                                                aria-pressed="true"><i class="fa fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger-gradient btn-sm"
                                                data-toggle="modal"
                                                data-target="#Delete_receipt{{ $ProcessingFee->id }}"><i
                                                    class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    @include('ProcessingFee.Delete')
                                @endforeach
                            </tbody>
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
