@extends('layouts.master')
@section('css')
@endsection
@section('title')
    {{ trans('Students_trans.Attendance') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('Fees.Accounts') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{ trans('Students_trans.Attendance') }} </span>
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
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($Grades as $Grade)
                        @php
                            $i++;
                        @endphp
                        <div class="panel-group1" id="accordion11{{ $Grade->id }}">
                            <div class="panel panel-default  mb-4">
                                <div class="panel-heading1 bg-secondary-gradient ">
                                    <h4 class="panel-title1">
                                        <a class="accordion-toggle collapsed" data-toggle="collapse"
                                            data-parent="#accordion11{{ $Grade->id }}"
                                            href="#collapseFour1{{ $Grade->id }}"
                                            aria-expanded="false">{{ $Grade->Name }}</a>
                                    </h4>
                                </div>
                                <div id="collapseFour1{{ $Grade->id }}" class="panel-collapse collapse" role="tabpanel"
                                    aria-expanded="false">
                                    <div class="panel-body border">
                                        <div class="table-responsive">
                                            <table class="table text-center text-md-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-5p border-bottom-0">#</th>
                                                        <th class="wd-15p border-bottom-0">
                                                            {{ trans('Sections.Name_Section') }}</th>
                                                        <th class="wd-20p border-bottom-0">
                                                            {{ trans('Sections.Name_Class') }}</th>

                                                        <th class="wd-20p border-bottom-0">
                                                            {{ trans('Sections.Name_Teacher') }}</th>

                                                        <th class="wd-15p border-bottom-0">
                                                            {{ trans('Sections.Status') }}</th>

                                                        <th class="wd-15p border-bottom-0">
                                                            {{ trans('Sections.Processes') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $i = 0;
                                                    @endphp
                                                    @foreach ($Grade->Sections as $grade)
                                                        {{ $i++ }}
                                                        <tr>
                                                            <td>{{ $i }}</td>
                                                            <td>{{ $grade->Name }}</td>
                                                            <td>{{ $grade->Classroom->Name }}</td>
                                                            <td>
                                                                @foreach ($grade->Teachers as $teacher)
                                                                    {{ $teacher['Name'] }} -
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                @if ($grade->Status == 1)
                                                                    <span
                                                                        class="badge badge-pill badge-success">{{ trans('Sections.Status_Section_AC') }}</span>
                                                                @else
                                                                    <span
                                                                        class="badge badge-pill badge-danger">{{ trans('Sections.Status_Section_No') }}</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('Attendance.show', $grade->id) }}"
                                                                    class="btn btn-warning-gradient btn-sm" role="button"
                                                                    aria-pressed="true">{{ trans('side.List_Students') }}</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
    <script>
        $(document).ready(function() {
            $('select[name="Grade_id"]').on('change', function() {
                var Grade_id = $(this).val();
                if (Grade_id) {
                    $.ajax({
                        url: "{{ URL::to('classes') }}/" + Grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="Class_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="Class_id"]').append('<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
@endsection
