@extends('layouts.master')
@section('css')

@endsection
@section('title')
    {{ trans('Dparent.Attendance_and_absence_report') }}
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
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="post" action="{{route('attendanceSearch')}}" autocomplete="off">
                            @csrf
                            <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{ trans('Dparent.Search_information') }}</h6><br>
                            <div class="row">
                                 <div class="col-md-4">
                                <div class="form-group">
                                    <label for="student">{{ trans('DTeacher.Students') }}</label>
                                    <select class="form-control" name="student_id">
                                        <option value="0">{{ trans('DTeacher.all') }}</option>
                                        @foreach ($students as $student)
                                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="student">{{ trans('DTeacher.FromDate') }}</label>
                                        <input type="date" class="form-control " required name="from">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="student">{{ trans('DTeacher.ToDate') }}</label>
                                        <input type="date" class="form-control " required name="to">
                                    </div>
                                </div>

                            </div>
                                 <button class="btn btn-block btn-success-gradient py-0 nextBtn btn-lg pull-right"
                            type="submit">{{ trans('Dparent.search') }}</button>
                    </form>
                </div>
                <div class="card-body">
                    @isset($Students)
                        <div class="table-responsive">
                            <table id="example1" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                                style="text-align: center">
                                <thead>
                                    <tr>
                                        <th class="alert-success">#</th>
                                        <th class="alert-success">{{ trans('Students_trans.name') }}</th>
                                        <th class="alert-success">{{ trans('Students_trans.Grade') }}</th>
                                        <th class="alert-success">{{ trans('Students_trans.section') }}</th>
                                        <th class="alert-success">التاريخ</th>
                                        <th class="alert-warning">الحالة</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Students as $student)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $student->students->name }}</td>
                                            <td>{{ $student->grade->Name }}</td>
                                            <td>{{ $student->section->Name }}</td>
                                            <td>{{ $student->attendence_date }}</td>
                                            <td>

                                                @if ($student->attendence_status == 0)
                                                    <span class="text-danger">{{ trans('DTeacher.absence') }}</span>
                                                @else
                                                    <span class="text-success">{{ trans('DTeacher.Presence') }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                            </table>
                        </div>
                    @endisset
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
