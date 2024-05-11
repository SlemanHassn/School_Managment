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
    {{ trans('side.sections') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('side.sections') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('side.List_sections') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12">

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card overflow-hidden">
                        <div class="card-header pb-0">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-solid-danger rounded mb-2 mg-b-0" role="alert">
                                        <button aria-label="Close" class="close " data-dismiss="alert" type="button">
                                            <span aria-hidden="true">&times;</span></button>
                                        <strong> {{ $error }}</li></strong>
                                    </div>
                                @endforeach
                            @endif

                            <div class="d-flex justify-content-between">
                                <a class="modal-effect btn btn-primary-gradient" data-effect="effect-flip-horizontal"
                                    data-toggle="modal" href="#modaldemo8">{{ trans('Sections.add_section') }}</a>
                            </div>
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
                                        <div id="collapseFour1{{ $Grade->id }}" class="panel-collapse collapse"
                                            role="tabpanel" aria-expanded="false">
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
                                                                        <button class="btn btn-success-gradient btn-sm"
                                                                            data-toggle="modal"
                                                                            data-target="#edit{{ $grade->id }}"
                                                                            data-effect="effect-flip-horizontal"><i
                                                                                class="fa fa-edit"></i></button>
                                                                        <button class="btn btn-danger-gradient btn-sm"
                                                                            data-toggle="modal"
                                                                            data-target="#delete{{ $grade->id }}"
                                                                            data-effect="effect-flip-horizontal"><i
                                                                                class="fa fa-trash"></i></button>
                                                </div>

                                                </td>
                                                </tr>
                                                {{--  تعديل القسم --}}
                                                <div class="modal" id="edit{{ $grade->id }}">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content modal-content-demo">
                                                            <div class="modal-header">
                                                                <h6 class="modal-title">
                                                                    {{ trans('grade.Edit_G') }}</h6>
                                                                <button aria-label="Close" class="close"
                                                                    data-dismiss="modal" type="button"><span
                                                                        aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <form method="POST"
                                                                action="{{ route('section.update', 'text') }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-body">
                                                                    @csrf
                                                                    <div class="row row-sm ">
                                                                        <div
                                                                            class="col-lg-6 needs-validation was-validated">
                                                                            <div class="form-group has-success mg-b-0">
                                                                                <label
                                                                                    class="main-content-label tx-11 tx-medium tx-gray-600">

                                                                                    {{ trans('Sections.Section_name_ar') }}</label>
                                                                                <input class="form-control" name="Name_ar"
                                                                                    required="" type="text"
                                                                                    value="{{ $grade->getTranslation('Name', 'ar') }}">
                                                                                <input type="hidden" name="id"
                                                                                    value="{{ $grade->id }}">
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="col-lg-6 mg-t-20 mg-lg-t-0 needs-validation was-validated">
                                                                            <div class="form-group has-danger mg-b-0">
                                                                                <label
                                                                                    class="main-content-label tx-11 tx-medium tx-gray-600">{{ trans('Sections.Section_name_en') }}
                                                                                </label>
                                                                                <input class="form-control" name="Name"
                                                                                    required=""
                                                                                    value="{{ $grade->getTranslation('Name', 'en') }}"
                                                                                    type="text">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12 mt-2 mg-t-20 mg-lg-t-0">
                                                                            <div class="form-group  mg-b-0">
                                                                                <label
                                                                                    class="main-content-label tx-11 tx-medium tx-gray-600">
                                                                                    {{ trans('classroom.Grade_N') }}</label>
                                                                                <select name="Grade_id"
                                                                                    class="form-control">

                                                                                    @foreach ($List_grades as $grade_list)
                                                                                        <option
                                                                                            value="{{ $grade_list->id }}"
                                                                                            {{ $grade->Grade_id == $grade_list->id ? 'selected' : '' }}>
                                                                                            {{ $grade_list->Name }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12 mt-2 mg-t-20 mg-lg-t-0">
                                                                            <div class="form-group  mg-b-0">
                                                                                <label
                                                                                    class="main-content-label tx-11 tx-medium tx-gray-600">
                                                                                    {{ trans('Sections.Name_Class') }}</label>
                                                                                <select name="Class_id"
                                                                                    class="form-control">
                                                                                    <option
                                                                                        value="{{ $grade->Classroom->id }}">
                                                                                        {{ $grade->Classroom->Name }}
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div
                                                                            class="form-group mt-2 mb-0 justify-content-end">

                                                                            <label class="ckbox">
                                                                                <input
                                                                                    {{ $grade->Status == 1 ? 'checked' : '' }}
                                                                                    name="Status" type="checkbox">
                                                                                <span class="tx-13">
                                                                                    {{ trans('Sections.Status') }}</span></label>
                                                                        </div>
                                                                        <div class="col-lg-12 mt-2 mg-t-20 mg-lg-t-0">
                                                                            <label for="inputName"
                                                                                class="control-label">{{ trans('Sections.Teachers') }}</label>
                                                                            <select multiple name="teacher_id[]"
                                                                                class="form-control"
                                                                                id="exampleFormControlSelect2">
                                                                                @foreach ($grade->Teachers as $teacher)
                                                                                    <option selected
                                                                                        value="{{ $teacher->id }}">
                                                                                        {{ $teacher->Name }}
                                                                                    </option>
                                                                                @endforeach
                                                                                @foreach ($teachers as $teacher)
                                                                                    <option
                                                                                        {{ $grade->Grade_id == $grade_list->id ? 'selected' : '' }}
                                                                                        value="{{ $teacher->id }}">
                                                                                        {{ $teacher->Name }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit"
                                                                        class="btn ripple  btn-success-gradient"
                                                                        type="button">{{ trans('Sections.Edit_D') }}</button>
                                                                    <button class="btn ripple btn-secondary-gradient"
                                                                        data-dismiss="modal"
                                                                        type="button">{{ trans('grade.Close') }}</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- حذف --}}
                                                <div class="modal" id="delete{{ $grade->id }}">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content modal-content-demo">
                                                            <div class="modal-header">
                                                                <h6 class="modal-title">
                                                                    {{ trans('Sections.Delete') }}</h6>
                                                                <button aria-label="Close" class="close"
                                                                    data-dismiss="modal" type="button"><span
                                                                        aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <form method="POST"
                                                                action="{{ route('section.destroy', 'text') }}">
                                                                <div class="modal-body">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <div class="row row-sm ">
                                                                        <div class="col-lg-12 ">
                                                                            <div class="form-group  mg-b-0">
                                                                                <h6 class=''>
                                                                                    {{ trans('Sections.Warning_Section') }}
                                                                                </h6>
                                                                                <input class="form-control" readonly
                                                                                    name="Name" type="text"
                                                                                    value="{{ $grade->Name }}">

                                                                                <input type="hidden" name='id'
                                                                                    value="{{ $grade->id }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit"
                                                                        class="btn ripple  btn-danger-gradient"
                                                                        type="button">{{ trans('Sections.Delete') }}</button>
                                                                    <button class="btn ripple btn-secondary-gradient"
                                                                        data-dismiss="modal"
                                                                        type="button">{{ trans('grade.Close') }}</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
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
    {{-- إضافة قسم --}}
    <div class="modal" id="modaldemo8">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">{{ trans('Sections.add_section') }}</h6><button aria-label="Close"
                        class="close" data-dismiss="modal" type="button"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <form method="POST" action="{{ route('section.store') }}">
                    <div class="modal-body">
                        @csrf
                        <div class="row row-sm ">
                            <div class="col-lg-6 needs-validation was-validated">
                                <div class="form-group has-success mg-b-0">
                                    <label class="main-content-label tx-11 tx-medium tx-gray-600">

                                        {{ trans('Sections.Section_name_ar') }}</label>
                                    <input class="form-control" name="Name_ar" required="" type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 mg-t-20 mg-lg-t-0 needs-validation was-validated">
                                <div class="form-group has-danger mg-b-0">
                                    <label
                                        class="main-content-label tx-11 tx-medium tx-gray-600">{{ trans('Sections.Section_name_en') }}
                                    </label>
                                    <input class="form-control" name="Name" required="" type="text">
                                </div>
                            </div>
                            <div class="col-lg-12 mt-2 mg-t-20 mg-lg-t-0">
                                <div class="form-group  mg-b-0">
                                    <label class="main-content-label tx-11 tx-medium tx-gray-600">
                                        {{ trans('classroom.Grade_N') }}</label>
                                    <select name="Grade_id" class="form-control">
                                        <option value="" selected disabled>
                                            {{ trans('Sections.Select_Grade') }}
                                        </option>
                                        @foreach ($List_grades as $grade)
                                            <option value="{{ $grade->id }}">
                                                {{ $grade->Name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-2 mg-t-20 mg-lg-t-0">
                                <div class="form-group  mg-b-0">
                                    <label class="main-content-label tx-11 tx-medium tx-gray-600">
                                        {{ trans('Sections.Name_Class') }}</label>
                                    <select name="Class_id" class="form-control">

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-2 mg-t-20 mg-lg-t-0">
                                <label for="inputName" class="control-label">{{ trans('Sections.Teachers') }}</label>
                                <select multiple name="teacher_id[]" class="form-control" id="exampleFormControlSelect2">
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->Name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn ripple  btn-primary-gradient"
                            type="button">{{ trans('Sections.add_section') }}</button>
                        <button class="btn ripple btn-secondary-gradient" data-dismiss="modal"
                            type="button">{{ trans('grade.Close') }}</button>
                    </div>
                </form>
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
