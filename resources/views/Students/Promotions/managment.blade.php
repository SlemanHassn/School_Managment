@extends('layouts.master')
@section('css')

@endsection
@section('title')
    {{ trans('Students_trans.Manag_Promotions') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('side.Students') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('Students_trans.Manag_Promotions') }}</span>
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

                    <button type="button" class="btn btn-primary-gradient" data-toggle="modal" data-target="#Delete_all">
                        {{ trans('Students_trans.back_all') }}
                    </button>
                    <br><br>

                    <div class="table-responsive">
                        <table class="table text-md-nowrap text-center" id="example1">
                            <thead>
                                <tr>
                                    <th>{{ trans('Students_trans.name') }}</th>
                                    <th>{{ trans('Students_trans.last') }}</th>
                                    <th>{{ trans('Students_trans.academic_year') }}</th>
                                    <th>{{ trans('Students_trans.last_c') }}</th>
                                    <th>{{ trans('Students_trans.last_s') }}</th>

                                    <th>{{ trans('Students_trans.next') }}</th>
                                    <th>{{ trans('Students_trans.academic_year_next') }}</th>
                                    <th>{{ trans('Students_trans.next_c') }}</th>
                                    <th>{{ trans('Students_trans.next_s') }}</th>
                                    <th>{{ trans('Students_trans.Processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>


                                @foreach ($promotions as $promotion)
                                    @php
                                        $acc = $promotion->student->name ?? 'none';
                                    @endphp
                                    @if ($acc !== 'none')
                                        <tr>

                                            <td>{{ $promotion->student->name }}</td>
                                            <td>{{ $promotion->f_grade->Name }}</td>
                                            <td>{{ $promotion->academic_year }}</td>
                                            <td>{{ $promotion->f_classroom->Name }}</td>
                                            <td>{{ $promotion->f_section->Name }}</td>
                                            <td>{{ $promotion->t_grade->Name }}</td>
                                            <td>{{ $promotion->academic_year_new }}</td>
                                            <td>{{ $promotion->t_classroom->Name }}</td>
                                            <td>{{ $promotion->t_section->Name }}</td>
                                            <td>
                                                <button type="button" class="btn btn-danger-gradient btn-sm"
                                                    data-toggle="modal" data-target="#Delete_one{{ $promotion->id }}"
                                                    title="{{ trans('Grades_trans.Delete') }}"><i
                                                        class="fa fa-undo"></i></button>
                                                <button class="btn btn-sm btn-primary-gradient " data-toggle="modal"
                                                    data-target="#graduate_Student{{ $promotion->student->id }}"
                                                    title="{{ trans('Grades_trans.Delete') }}"> <i
                                                        class="fe fe-log-out "></i></button>
                                            </td>
                                        </tr>
                                        @include('Students.promotions.Delete_all')
                                        @include('Students.promotions.Delete_one')
                                        @include('Students.promotions.graduateStudent')
                                    @endif
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
