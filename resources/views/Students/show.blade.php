@extends('layouts.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
@endsection
@section('title')
    {{ trans('Students_trans.Details') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('side.Students') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('Students_trans.Details') }}</span>
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
                    <div class="tab nav-border">
                        <ul class="nav nav-tabs mb-3" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link btn-success-gradient  text-white rounded  active show" id="Students-1"
                                    data-toggle="tab" href="#Students" role="tab" aria-controls="Students"
                                    aria-selected="true">{{ trans('Students_trans.Student_details') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  text-white rounded btn-primary-gradient" id="Attachments-1"
                                    data-toggle="tab" href="#Attachments" role="tab" aria-controls="Attachments"
                                    aria-selected="false">{{ trans('Students_trans.Attachments') }}</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane  fade active show" id="Students" role="tabpanel"
                                aria-labelledby="Students">
                                <table class="table table-striped table-hover" style="text-align:center">
                                    <tbody>
                                        <tr>
                                            <th scope="row">{{ trans('Students_trans.name') }}</th>
                                            <td>{{ $Student->name }}</td>
                                            <th scope="row">{{ trans('Students_trans.email') }}</th>
                                            <td>{{ $Student->email }}</td>
                                            <th scope="row">{{ trans('Students_trans.gender') }}</th>
                                            <td>{{ $Student->gender->Name }}</td>
                                            <th scope="row">{{ trans('Students_trans.Nationality') }}</th>
                                            <td>{{ $Student->Nationality->Name }}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">{{ trans('Students_trans.Grade') }}</th>
                                            <td>{{ $Student->grade->Name }}</td>
                                            <th scope="row">{{ trans('Students_trans.classrooms') }}</th>
                                            <td>{{ $Student->classroom->Name }}</td>
                                            <th scope="row">{{ trans('Students_trans.section') }}</th>
                                            <td>{{ $Student->section->Name }}</td>
                                            <th scope="row">{{ trans('Students_trans.Date_of_Birth') }}</th>
                                            <td>{{ $Student->Date_Birth }}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">{{ trans('myParents.Name_F') }}</th>
                                            <td>{{ $Student->myparent->Name_Father }}</td>
                                            <th scope="row">{{ trans('myParents.Name_M') }}</th>
                                            <td>{{ $Student->myparent->Name_Mother }}</td>
                                            <th scope="row">{{ trans('Students_trans.academic_year') }}</th>
                                            <td>{{ $Student->academic_year }}</td>
                                            <th scope="row">{{ trans('Students_trans.blood_type') }}</th>
                                            <td>{{ $Student->blood->Name }}</td>


                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane fade" id="Attachments" role="tabpanel" aria-labelledby="Attachments">
                                <form method="post" action="{{ route('Upload_attachment') }}"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div>
                                                <h6 class="card-title mb-1">
                                                    {{ trans('Students_trans.Attachments') }}</h6>
                                            </div>
                                            <div>
                                                <input type="hidden" name="student_name" value="{{ $Student->name }}">
                                                <input type="hidden" name="student_id" value="{{ $Student->id }}">
                                                <input type="file" name="photos[]" multiple class="dropify"
                                                    data-height="80" />
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success-gradient my-1 btn-block ">
                                            {{ trans('Students_trans.submit') }}
                                        </button>
                                    </div>
                                </form>
                                <div class="table-responsive">
                                    <table class="table text-md-nowrap"style="text-align:center" id="example1">
                                        <thead>
                                            <tr class="">
                                                <th class=" wd-5p border-bottom-0" scope="col">#</th>
                                                <th class=" wd-20p border-bottom-0" scope="col">
                                                    {{ trans('Students_trans.filename') }}</th>
                                                <th class=" wd-15p border-bottom-0" scope="col">
                                                    {{ trans('Students_trans.created_at') }}
                                                </th>
                                                <th class=" wd-15p border-bottom-0" scope="col">
                                                    {{ trans('Students_trans.Processes') }}
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($Student->image as $attachment)
                                                <tr style='text-align:center;vertical-align:middle'>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $attachment->filename }}</td>
                                                    <td>{{ $attachment->created_at->diffForHumans() }}</td>
                                                    <td colspan="2">
                                                        <a class="btn btn-info-gradient btn-sm"
                                                            href="{{ route('Download_attachment', [$attachment->imageable->name, $attachment->filename]) }}"
                                                            role="button"><i class="fas fa-download"></i>&nbsp;
                                                            {{ trans('Students_trans.Download') }}</a>

                                                        <button type="button" class="btn btn-danger-gradient btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#Delete_img{{ $attachment->id }}"
                                                            title="{{ trans('Grades_trans.Delete') }}">{{ trans('Students_trans.delete') }}
                                                        </button>
                                                    </td>
                                                </tr>
                                                @include('Students.Delete_img')
                                            @endforeach
                                        </tbody>
                                        </tbody>

                                    </table>
                                    <br>
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
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!-- Internal TelephoneInput js-->
    <script src="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/telephoneinput/inttelephoneinput.js') }}"></script>
@endsection
