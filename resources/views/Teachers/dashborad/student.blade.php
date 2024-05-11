@extends('layouts.master')
@section('css')
@endsection
@section('title')
    {{ trans('Students_trans.List_of_attendance_and_absence') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('Fees.Accounts') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{ trans('Students_trans.List_of_attendance_and_absence') }}</span>
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
                <div class="cadr-header">
                </div>
                <form method="post" action="{{ route('attendance') }}">
                    @csrf
                    <div class="card-body">
                        <button class="btn btn-success-gradient mb-3" type="submit">{{ trans('DTeacher.Submit') }}</button>

                        <h5 class="mb-3" style="font-family: 'Cairo', sans-serif;color: red">
                            {{ trans('Students_trans.today_date') }} :
                            {{ date('Y-m-d') }}</h5>
                        <div class="table-responsive">
                            <table id="example1" class="table  table-hover table-sm table-bordered p-0"
                                data-page-length="50" style="text-align: center">
                                <thead>
                                    <tr>
                                        <th class="alert-success">#</th>
                                        <th class="alert-success">{{ trans('Students_trans.name') }}</th>
                                        <th class="alert-success">{{ trans('Students_trans.email') }}</th>
                                        <th class="alert-success">{{ trans('Students_trans.gender') }}</th>
                                        <th class="alert-success">{{ trans('Students_trans.Grade') }}</th>
                                        <th class="alert-success">{{ trans('Students_trans.classrooms') }}</th>
                                        <th class="alert-success">{{ trans('Students_trans.section') }}</th>
                                        <th class="alert-success">{{ trans('Students_trans.Processes') }}</th>
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
                                            <td>
                                                <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                    <input name="attendences[{{ $student->id }}]"
                                                        @foreach ($student->attendance()->where('attendence_date', date('Y-m-d'))->get() as $attendance)
                                                            {{ $attendance->attendence_status == 1 ? 'checked' : '' }} @endforeach
                                                        class="leading-tight " type="radio" value="presence">
                                                    <span class="text-success">{{ trans('DTeacher.Presence') }}</span>
                                                </label>
                                                <label class="ml-4 block text-gray-500 font-semibold">
                                                    <input name="attendences[{{ $student->id }}]"
                                                        @foreach ($student->attendance()->where('attendence_date', date('Y-m-d'))->get() as $attendance)
                                                            {{ $attendance->attendence_status == 0 ? 'checked' : '' }} @endforeach
                                                        class="leading-tight" type="radio" value="absent">
                                                    <span class="text-danger">{{ trans('DTeacher.absence') }}</span>
                                                </label>
                                                <input type="hidden" name="student_id[]" value="{{ $student->id }}">
                                                <input type="hidden" name="grade_id" value="{{ $student->Grade_id }}">
                                                <input type="hidden" name="classroom_id"
                                                    value="{{ $student->Classroom_id }}">
                                                <input type="hidden" name="section_id" value="{{ $student->section_id }}">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </form>
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
