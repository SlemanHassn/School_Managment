@extends('layouts.master')

@section('css')
@endsection
@section('title')
    {{ trans('side.Teachers') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('side.Teachers') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('side.List_Teachers') }}</span>
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
                        <a class=" btn btn-primary-gradient"
                            href="{{ route('Teachers.create') }}">{{ trans('Teacher_trans.Add_Teacher') }}</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap text-center" id="example1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('Teacher_trans.Name_Teacher') }}</th>
                                    <th>{{ trans('Teacher_trans.Email') }}</th>
                                    <th>{{ trans('Teacher_trans.Gender') }}</th>
                                    <th>{{ trans('Teacher_trans.Joining_Date') }}</th>
                                    <th>{{ trans('Teacher_trans.specialization') }}</th>
                                    <th>{{ trans('Teacher_trans.Address') }}</th>
                                    <th>{{ trans('Teacher_trans.Processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($Teachers as $Teacher)
                                        @php
                                            $i++;
                                        @endphp
                                        <td>{{ $i }}</td>
                                        <td>{{ $Teacher->Name }}</td>
                                        <td>{{ $Teacher->email }}</td>
                                        <td>{{ $Teacher->genders->Name }}</td>
                                        <td>{{ $Teacher->Joining_Date }}</td>
                                        <td>{{ $Teacher->specializations->Name }}</td>
                                        <td>{{ $Teacher->Address }}</td>

                                        <td>
                                            <a class="btn btn-success-gradient btn-sm"
                                                href="{{ route('Teachers.edit', $Teacher->id) }}"><i
                                                    class="fa fa-edit"></i>
                                            </a>
                                            <button class="btn btn-danger-gradient btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $Teacher->id }}"
                                                data-effect="effect-flip-horizontal">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <a href="{{ route('Teachers.show', [$Teacher->id]) }}"
                                                class="btn btn-sm  btn-warning-gradient" role="button">
                                                <i class="far fa-eye">
                                                </i>
                                            </a>
                                        </td>
                                </tr>
                                <div class="modal" id="delete{{ $Teacher->id }}">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content modal-content-demo">
                                            <div class="modal-header">
                                                <h6 class="modal-title">{{ trans('Teacher_trans.Delete_Teacher') }}
                                                </h6>
                                                <button aria-label="Close" class="close" data-dismiss="modal"
                                                    type="button"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <form method="POST" action="{{ route('Teachers.destroy', 'text') }}">
                                                <div class="modal-body">
                                                    @csrf
                                                    @method('delete')
                                                    <div class="row row-sm ">
                                                        <div class="col-lg-12 ">
                                                            <div class="form-group  mg-b-0">
                                                                <h6 class=''>
                                                                    {{ trans('Teacher_trans.Delete_G') }}</h6>
                                                                <input class="form-control" readonly name="Name"
                                                                    type="text" value="{{ $Teacher->Name }}">

                                                                <input type="hidden" name='id'
                                                                    value="{{ $Teacher->id }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn ripple  btn-danger-gradient"
                                                        type="button">{{ trans('Teacher_trans.Delete') }}</button>
                                                    <button class="btn ripple btn-secondary-gradient" data-dismiss="modal"
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
    </div>
    </div>
    </div>
@endsection
@section('js')
@endsection
