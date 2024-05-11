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
    {{ trans('side.Students') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('side.Students') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('side.List_Students') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-statistics">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <a class="btn btn-primary-gradient"
                            href="{{ route('Students.create') }}">{{ trans('side.Add_Student') }}</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-center text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('Students_trans.name') }}</th>
                                    <th>{{ trans('Students_trans.email') }}</th>
                                    <th>{{ trans('Students_trans.gender') }}</th>
                                    <th>{{ trans('Students_trans.Grade') }}</th>
                                    <th>{{ trans('Students_trans.classrooms') }}</th>
                                    <th>{{ trans('Students_trans.section') }}</th>
                                    <th>{{ trans('Students_trans.academic_year') }}</th>
                                    <th>{{ trans('Students_trans.Processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->gender->Name }}</td>
                                        <td>{{ $student->grade->Name }}</td>
                                        <td>{{ $student->classroom->Name }}</td>
                                        <td>{{ $student->section->Name }}</td>
                                        <td>{{ $student->academic_year }}</td>
                                        <td>


                                            <div class="dropdown show">
                                                <a class="btn btn-primary-gradient btn-sm dropdown-toggle" href="#"
                                                    role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    {{ trans('Students_trans.Processes') }}
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item"
                                                        href="{{ route('Students.show', $student->id) }}"><i
                                                            style="color: #ffc107" class="far fa-eye "></i>&nbsp;
                                                        {{ trans('Students_trans.Student_details') }}</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('Students.edit', $student->id) }}"><i
                                                            style="color:green"
                                                            class="fa fa-edit"></i>&nbsp;{{ trans('Students_trans.Edit_Student') }}</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('FeeInvoices.show', $student->id) }}"><i
                                                            style="color: #0000cc" class="fa fa-edit"></i>&nbsp;
                                                        {{ trans('Fees_Invoices.Fee_invoices_Add') }}
                                                        &nbsp;</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('Receipts.show', $student->id) }}"><i
                                                            style="color: #9dc8e2" class="fas fa-money-bill-alt"></i>&nbsp;
                                                        &nbsp;{{ trans('Fees_Invoices.Catch_Receipt') }}</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('ProcessingFee.show', $student->id) }}"><i
                                                            style="color: #9dc8e2" class="fas fa-money-bill-alt"></i>&nbsp;
                                                        &nbsp; {{ trans('Fees_Invoices.Fee_processing') }} </a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('Payment.show', $student->id) }}"><i
                                                            style="color:goldenrod" class="fas fa-donate"></i>&nbsp;
                                                        &nbsp; {{ trans('Fees_Invoices.Add_a_bill_of_exchange') }}</a>
                                                    <a class="dropdown-item"
                                                        data-target="#Delete_Student{{ $student->id }}"
                                                        data-toggle="modal" href="##Delete_Student{{ $student->id }}"><i
                                                            style="color: red" class="fa fa-trash"></i>&nbsp; {{ trans('Students_trans.Deleted_Student') }}
                                                        </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @include('Students.Delete')
                                    @include('Students.graduateStudent')
                                @endforeach
                        </table>
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
