@extends('layouts.master')

@section('css')
@endsection
@section('title')
    {{ trans('Fees.study_fees') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('Fees.Accounts') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('Fees.study_fees') }}</span>
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
                <div class="card-header">
                    <a href="{{ route('Fees.create') }}" class="btn btn-primary-gradient" role="button"
                        aria-pressed="true">{{ trans('Fees.Add_new_fees') }}</a>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table text-md-nowrap text-center" id="example1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('Fees.Name') }}</th>
                                    <th>{{ trans('Fees.Amount') }}</th>
                                    <th>{{ trans('Students_trans.Grade') }}</th>
                                    <th>{{ trans('Students_trans.classrooms') }}</th>
                                    <th>{{ trans('Students_trans.academic_year') }}</th>
                                    <th>{{ trans('grade.Type_Fee') }}</th>
                                    <th>{{ trans('grade.Notes') }}</th>
                                    <th>{{ trans('grade.Processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fees as $fee)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $fee->title }}</td>
                                        <td>{{ number_format($fee->amount, 2) }}</td>
                                        <td>{{ $fee->grade->Name }}</td>
                                        <td>{{ $fee->classroom->Name }}</td>
                                        <td>{{ $fee->year }}</td>
                                        <td>
                                            @if ($fee->Type_Fee == 1)
                                                رسوم دراسية
                                            @elseif($fee->Type_Fee == 2)
                                                رسوم باص خط واحد
                                            @else
                                                رسوم باص خطين
                                            @endif
                                        </td>
                                        <td>{{ $fee->description }}</td>
                                        <td>
                                            <a href="{{ route('Fees.edit', $fee->id) }}"
                                                class="btn btn-success-gradient btn-sm" role="button"
                                                aria-pressed="true"><i class="fa fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger-gradient btn-sm"
                                                data-toggle="modal" data-target="#Delete_Fee{{ $fee->id }}"
                                                title="{{ trans('Grades_trans.Delete') }}"><i
                                                    class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    @include('Fees.Delete')
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
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
@endsection
