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
    {{ trans('side.school_grade') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('side.school_grade') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('side.grades_list') }}</span>
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

                    <div class="d-flex justify-content-between">
                        <a class="modal-effect btn btn-primary-gradient" data-effect="effect-flip-horizontal"
                            data-toggle="modal" href="#modaldemo8">{{ trans('grade.Add') }}</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap text-center" id="example1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('grade.Name') }}</th>
                                    <th>{{ trans('grade.Notes') }}</th>
                                    <th>{{ trans('grade.created_at') }}</th>
                                    <th>{{ trans('grade.updated_at') }}</th>
                                    <th>{{ trans('grade.Processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($grades as $grade)
                                    {{ $i++ }}
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $grade->Name }}</td>
                                        <td>{{ $grade->Notes }}</td>
                                        <td>{{ $grade->created_at }}</td>
                                        <td>{{ $grade->updated_at }}</td>
                                        <td>
                                            <button class="btn btn-success-gradient btn-sm" data-toggle="modal"
                                                data-target="#edit{{ $grade->id }}"
                                                data-effect="effect-flip-horizontal"><i class="fa fa-edit"></i></button>
                                            <button class="btn btn-danger-gradient btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $grade->id }}"
                                                data-effect="effect-flip-horizontal"> <i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    {{-- تعديل --}}
                                    <div class="modal" id="edit{{ $grade->id }}">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content modal-content-demo">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">{{ trans('grade.Edit_G') }}</h6>
                                                    <button aria-label="Close" class="close" data-dismiss="modal"
                                                        type="button"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form method="POST" action="{{ route('grade.update', 'text') }}">
                                                    <div class="modal-body">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row row-sm ">
                                                            <div class="col-lg-6 ">
                                                                <div class="form-group  mg-b-0">
                                                                    <label
                                                                        class="main-content-label tx-11 tx-medium tx-gray-600">
                                                                        {{ trans('grade.Name_ar') }}</label>

                                                                    <input class="form-control" name="Name_ar"
                                                                        type="text"
                                                                        value="{{ $grade->getTranslation('Name', 'ar') }}">

                                                                    <input type="hidden" name='id'
                                                                        value="{{ $grade->id }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mg-t-20 mg-lg-t-0 ">
                                                                <div class="form-group mg-b-0">
                                                                    <label
                                                                        class="main-content-label tx-11 tx-medium tx-gray-600">{{ trans('grade.Name_en') }}
                                                                    </label>
                                                                    <input class="form-control" name="Name"
                                                                        value="{{ $grade->getTranslation('Name', 'en') }}"
                                                                        type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 mt-2 mg-t-20 mg-lg-t-0">
                                                                <div class="form-group  mg-b-0">
                                                                    <label
                                                                        class="main-content-label tx-11 tx-medium tx-gray-600">
                                                                        {{ trans('grade.Notes') }}</label>
                                                                    <textarea rows="4" class="form-control" name="Notes">{{ $grade->Notes }}</textarea>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn ripple  btn-success-gradient"
                                                            type="button">{{ trans('grade.Edit') }}</button>
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
                                                    <h6 class="modal-title">{{ trans('grade.Delete_Grade') }}</h6>
                                                    <button aria-label="Close" class="close" data-dismiss="modal"
                                                        type="button"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form method="POST" action="{{ route('grade.destroy', 'text') }}">
                                                    <div class="modal-body">
                                                        @csrf
                                                        @method('delete')
                                                        <div class="row row-sm ">
                                                            <div class="col-lg-12 ">
                                                                <div class="form-group  mg-b-0">
                                                                    <h6 class=''>
                                                                        {{ trans('grade.Delete_G') }}</h6>
                                                                    <input class="form-control" readonly name="Name"
                                                                        type="text" value="{{ $grade->Name }}">

                                                                    <input type="hidden" name='id'
                                                                        value="{{ $grade->id }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn ripple  btn-danger-gradient"
                                                            type="button">{{ trans('grade.Delete_Grade') }}</button>
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
                    {{-- اضافة --}}
                    <div class="modal" id="modaldemo8">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content modal-content-demo">
                                <div class="modal-header">
                                    <h6 class="modal-title">{{ trans('grade.Add') }}</h6><button aria-label="Close"
                                        class="close" data-dismiss="modal" type="button"><span
                                            aria-hidden="true">&times;</span></button>
                                </div>
                                <form method="POST" action="{{ route('grade.store') }}">
                                    <div class="modal-body">
                                        @csrf
                                        <div class="row row-sm ">
                                            <div class="col-lg-6 needs-validation was-validated">
                                                <div class="form-group has-success mg-b-0">
                                                    <label class="main-content-label tx-11 tx-medium tx-gray-600">

                                                        {{ trans('grade.Name_ar') }}</label>
                                                    <input class="form-control" name="Name_ar" required=""
                                                        type="text">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mg-t-20 mg-lg-t-0 needs-validation was-validated">
                                                <div class="form-group has-danger mg-b-0">
                                                    <label
                                                        class="main-content-label tx-11 tx-medium tx-gray-600">{{ trans('grade.Name_en') }}
                                                    </label>
                                                    <input class="form-control" name="Name" required=""
                                                        type="text">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mt-2 mg-t-20 mg-lg-t-0">
                                                <div class="form-group  mg-b-0">
                                                    <label class="main-content-label tx-11 tx-medium tx-gray-600">
                                                        {{ trans('grade.Notes') }}</label>
                                                    <textarea rows="4" class="form-control" name="Notes"></textarea>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn ripple  btn-primary-gradient"
                                            type="button">{{ trans('grade.Add') }}</button>
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
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')

@endsection
