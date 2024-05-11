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
    {{ trans('side.Add_Student') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('side.Students') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('side.Add_Student') }}</span>
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
                <div class="card-head">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-solid-danger rounded mb-2 mg-b-0" role="alert">
                                <button aria-label="Close" class="close " data-dismiss="alert" type="button">
                                    <span aria-hidden="true">&times;</span></button>
                                <strong> {{ $error }}</li></strong>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="card-body">
                    <form class=" row mb-30" action="{{ route('FeeInvoices.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="repeater">
                                <div data-repeater-list="List_Fees">
                                    <div data-repeater-item>
                                        <div class="row">
                                            <div class="col">
                                                <label for="Name" class="">اسم الطالب</label>
                                                <select class="form-control" name="student_id" required>

                                                    @if (isset($students))
                                                        @foreach ($students as $student)
                                                            <option value="{{ $student->id }}">{{ $student->name }}
                                                            </option>
                                                        @endforeach
                                                    @else
                                                        <option selected value="{{ $student->id }}">{{ $student->name }}
                                                        </option>
                                                    @endif
                                                </select>
                                            </div>

                                            <div class="col">
                                                <label for="Name_en" class="">نوع الرسوم</label>
                                                <select class="form-control" name="fee_id" required>
                                                    <option value="">-- اختار من القائمة --</option>
                                                    @foreach ($fees as $fee)
                                                        <option value="{{ $fee->id }}">{{ $fee->title }}</option>
                                                    @endforeach
                                                </select>

                                            </div>

                                            <div class="col">
                                                <label for="Name_en" class="">المبلغ</label>
                                                <select class="form-control" name="amount" required>
                                                    <option value="">-- اختار من القائمة --</option>
                                                    @foreach ($fees as $fee)
                                                        <option value="{{ $fee->amount }}">{{ $fee->amount }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col">
                                                <label for="description" class="">البيان</label>
                                                <input type="text" class="form-control" name="description" required>
                                            </div>

                                            <div class="col">
                                                <label for="Name_en"
                                                    class="">{{ trans('Students_trans.Processes') }}:</label>
                                                <input class="btn btn-danger btn-block" data-repeater-delete type="button"
                                                    value="{{ trans('classroom.Delete_Class') }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-12">
                                        <input class="btn btn-danger-gradient" data-repeater-create type="button"
                                            value="{{ trans('classroom.Insert_record') }}" />
                                    </div>
                                </div><br>
                                <div class="modal-footer">
                                    <input type="hidden" name="Grade_id" value="{{ $student->Grade_id }}">
                                    <input type="hidden" name="Classroom_id" value="{{ $student->Classroom_id }}">

                                    <button type="submit"
                                        class="btn btn-success-gradient">{{ trans('Students_trans.submit_s') }}</button>
                                    <a href="{{ route('FeeInvoices.index') }}"
                                        class="btn btn-danger-gradient">{{ trans('Students_trans.Close') }}</a>
                                </div>
                            </div>
                        </div>
                    </form>
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
    </script>
@endsection
