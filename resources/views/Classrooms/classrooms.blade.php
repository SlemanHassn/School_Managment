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
    {{ trans('side.class_Room') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('side.class_Room') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('side.class_list') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
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
                    <div class="d-flex">
                        <a class="modal-effect  btn btn-primary-gradient" data-effect="effect-flip-horizontal"
                            data-toggle="modal" href="#modaldemo8">{{ trans('classroom.Add') }}</a>
                        <button class="modal-effect mr-2 ml-2 btn btn-danger-gradient" disabled
                            id="btn_delete_all">{{ trans('classroom.delete_row_selected') }}</button>

                        <div class="form-group  mg-b-0">
                            <form action="{{ route('Filter_Classes', 'text') }}" @csrf <select name="Grade_id"
                                class="form-control" onchange="this.form.submit()">
                                @if (isset($grade_S))
                                    <option disabled>بحث باسم المرحلة</option>
                                    <option value="all">الكل</option>
                                    @foreach ($grades as $grade)
                                        <option value="{{ $grade->id }}"
                                            {{ $grade_S->id == $grade->id ? 'selected' : '' }}>
                                            {{ $grade->Name }}
                                        </option>
                                    @endforeach
                                @else
                                    <option disabled selected>{{ trans('classroom.search') }}</option>
                                    @foreach ($grades as $grade)
                                        <option value="{{ $grade->id }}">
                                            {{ $grade->Name }}
                                        </option>
                                    @endforeach
                                @endif

                                </select>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-md-nowrap text-center" id="example1">
                                <thead>
                                    <tr>
                                        <td>
                                            <input name="select_all" class="ml-3" id="example-select-all" type="checkbox"
                                                onclick="CheckAll('box1', this)" />
                                        </td>
                                        <th class="wd-5px border-bottom-0">
                                            #
                                        </th>
                                        <th class="wd-15p border-bottom-0">{{ trans('classroom.Name') }}</th>
                                        <th class="wd-15p border-bottom-0">{{ trans('classroom.Grade_N') }}</th>
                                        <th class="wd-15p border-bottom-0">{{ trans('classroom.created_at') }}</th>
                                        <th class="wd-15p border-bottom-0">{{ trans('classroom.updated_at') }}</th>
                                        <th class="wd-15p border-bottom-0">{{ trans('classroom.Processes') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($classrooms as $classroom)
                                        {{ $i++ }}
                                        <tr>
                                            <td><input type="checkbox" value="{{ $classroom->id }}" class="box1"></td>
                                            <td>{{ $i }}</td>
                                            <td>{{ $classroom->Name }}</td>
                                            <td>{{ $classroom->Grade->Name }}</td>
                                            <td>{{ $classroom->created_at }}</td>
                                            <td>{{ $classroom->updated_at }}</td>
                                            <td>
                                                <button class="btn btn-success-gradient btn-sm" data-toggle="modal"
                                                    data-target="#edit{{ $classroom->id }}"
                                                    data-effect="effect-flip-horizontal"><i class="fa fa-edit"></i></button>
                                                <button class="btn btn-danger-gradient btn-sm" data-toggle="modal"
                                                    data-target="#delete{{ $classroom->id }}"
                                                    data-effect="effect-flip-horizontal"><i
                                                        class="fa fa-trash"></i></button>

                                            </td>
                                        </tr>
                                        {{-- تعديل --}}
                                        <div class="modal" id="edit{{ $classroom->id }}">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content modal-content-demo">
                                                    <div class="modal-header">
                                                        <h6 class="modal-title">{{ trans('classroom.Edit_G') }}</h6>
                                                        <button aria-label="Close" class="close" data-dismiss="modal"
                                                            type="button"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <form method="POST" action="{{ route('classroom.update', 'text') }}">
                                                        <div class="modal-body">
                                                            @csrf
                                                            @method('Put')
                                                            <div class="row row-sm ">
                                                                <div class="col-lg-6 needs-validation was-validated">
                                                                    <div class="form-group has-success mg-b-0">
                                                                        <label
                                                                            class="main-content-label tx-11 tx-medium tx-gray-600">
                                                                            {{ trans('classroom.Name_ar') }}</label>
                                                                        <input class="form-control" name="Name_ar"
                                                                            value="{{ $classroom->getTranslation('Name', 'ar') }}"
                                                                            required="" type="text">
                                                                        <input type="hidden"
                                                                            value="{{ $classroom->id }}" name="id">
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="col-lg-6 mg-t-20 mg-lg-t-0 needs-validation was-validated">
                                                                    <div class="form-group has-danger mg-b-0">
                                                                        <label
                                                                            class="main-content-label tx-11 tx-medium tx-gray-600">{{ trans('classroom.Name_en') }}
                                                                        </label>
                                                                        <input class="form-control" name="Name"
                                                                            required="" type="text"
                                                                            value="{{ $classroom->getTranslation('Name', 'en') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 mt-2 mg-t-20 mg-lg-t-0">
                                                                    <div class="form-group  mg-b-0">
                                                                        <label
                                                                            class="main-content-label tx-11 tx-medium tx-gray-600">
                                                                            {{ trans('classroom.Grade_N') }}</label>
                                                                        <select name="Grade_id" class="form-control">
                                                                            @foreach ($grades as $grade)
                                                                                <option value="{{ $grade->id }}"
                                                                                    {{ $classroom->Grade_id == $grade->id ? 'selected' : '' }}>
                                                                                    {{ $grade->Name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit"
                                                                class="btn ripple  btn-success-gradient"
                                                                type="button">{{ trans('classroom.Edit') }}</button>
                                                            <button class="btn ripple btn-secondary-gradient"
                                                                data-dismiss="modal"
                                                                type="button">{{ trans('classroom.Close') }}</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- حذف --}}
                                        <div class="modal" id="delete{{ $classroom->id }}">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content modal-content-demo">
                                                    <div class="modal-header">
                                                        <h6 class="modal-title">{{ trans('classroom.Delete_Class') }}</h6>
                                                        <button aria-label="Close" class="close" data-dismiss="modal"
                                                            type="button"><span
                                                                aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <form method="POST"
                                                        action="{{ route('classroom.destroy', 'text') }}">
                                                        <div class="modal-body">
                                                            @csrf
                                                            @method('delete')
                                                            <div class="row row-sm ">
                                                                <div class="col-lg-12 ">
                                                                    <div class="form-group  mg-b-0">
                                                                        <h6 class=''>
                                                                            {{ trans('classroom.Delete_C') }}</h6>
                                                                        <input class="form-control" readonly
                                                                            name="Name" type="text"
                                                                            value="{{ $classroom->Name }}">

                                                                        <input type="hidden" name='id'
                                                                            value="{{ $classroom->id }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn ripple  btn-danger-gradient"
                                                                type="button">{{ trans('classroom.Delete_Class') }}</button>
                                                            <button class="btn ripple btn-secondary-gradient"
                                                                data-dismiss="modal"
                                                                type="button">{{ trans('classroom.Close') }}</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- اضافة --}}
                        <div class="modal " id="modaldemo8">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title">{{ trans('classroom.Add') }}</h6><button
                                            aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                                                aria-hidden="true">&times;</span></button>
                                    </div>

                                    <form class="repeater" method="POST" action="{{ route('classroom.store') }}">
                                        <div class="modal-body">
                                            @csrf
                                            <div class="card-body">
                                                <div>
                                                    <div data-repeater-list="List_Classes">
                                                        <div data-repeater-item>
                                                            <div class="row">

                                                                <div class="col-lg-3 needs-validation was-validated">
                                                                    <div class="form-group has-success mg-b-0">
                                                                        <label
                                                                            class="main-content-label tx-11 tx-medium tx-gray-600">
                                                                            {{ trans('classroom.Name_ar') }}</label>
                                                                        <input class="form-control" name="Name_ar"
                                                                            required="" type="text">
                                                                    </div>
                                                                </div>


                                                                <div
                                                                    class="col-lg-3 mg-t-20 mg-lg-t-0 needs-validation was-validated">
                                                                    <div class="form-group has-danger mg-b-0">
                                                                        <label
                                                                            class="main-content-label tx-11 tx-medium tx-gray-600">{{ trans('classroom.Name_en') }}
                                                                        </label>
                                                                        <input class="form-control" name="Name"
                                                                            required="" type="text">
                                                                    </div>
                                                                </div>


                                                                <div
                                                                    class="col-lg-3 mg-t-20 mg-lg-t-0 needs-validation was-validated">
                                                                    <div class="form-group  mg-b-0">
                                                                        <label
                                                                            class="main-content-label tx-11 tx-medium tx-gray-600">
                                                                            {{ trans('classroom.Grade_N') }}</label>
                                                                        <select name="Grade_id" class="form-control">
                                                                            @foreach ($grades as $grade)
                                                                                <option value="{{ $grade->id }}">
                                                                                    {{ $grade->Name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-3">
                                                                    <label for="Name_en"
                                                                        class="mr-sm-2">{{ trans('grade.Processes') }}
                                                                        :</label>
                                                                    <input class="btn btn-danger btn-block"
                                                                        data-repeater-delete type="button"
                                                                        value="{{ trans('classroom.Delete_Class') }}" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-12">
                                                            <input class="btn btn-danger-gradient" data-repeater-create
                                                                type="button"
                                                                value="{{ trans('classroom.Insert_record') }}" />
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('classroom.Close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-success">{{ trans('classroom.Add') }}</button>
                                                </div>


                                            </div>
                                        </div>
                                    </form>

                                </div>

                            </div>
                        </div>
                        {{-- حذف الصفوف المختارة --}}
                        <div class="modal" id="delete_select">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title">{{ trans('classroom.Delete_Rows') }}</h6>
                                        <button aria-label="Close" class="close" data-dismiss="modal"
                                            type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form method="POST" action="{{ route('Delete_all') }}">
                                        <div class="modal-body">
                                            @csrf
                                            @method('delete')
                                            <div class="row row-sm ">
                                                <div class="col-lg-12 ">
                                                    <div class="form-group  mg-b-0">
                                                        <h6 class=''>
                                                            {{ trans('classroom.Delete_Rows') }}</h6>

                                                        <input type="hidden" name='delete_all_id' id='delete_all_id'
                                                            value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn ripple  btn-danger-gradient"
                                                type="button">{{ trans('classroom.Delete_Classes') }}</button>
                                            <button class="btn ripple btn-secondary-gradient" data-dismiss="modal"
                                                type="button">{{ trans('classroom.Close') }}</button>
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
    <script type="text/javascript">
        $('.repeater').repeater();
        $(document).ready(function() {
            $("#btn_delete_all").click(function() {
                var selected = new Array();
                $("#example1 input[type=checkbox]:checked").each(function() {
                    selected.push(this.value);

                });

                if (selected.length > 0) {
                    $('#delete_select').modal('show')
                    $('input[id="delete_all_id"]').val(selected);
                }
            });

            $("input[type='checkbox']").change(function() {
                if ($(".box1:checked").length > 0) {
                    $("#btn_delete_all").prop("disabled", false);

                } else {
                    $("#btn_delete_all").prop("disabled", true);
                }
            });

        });
    </script>
@endsection
