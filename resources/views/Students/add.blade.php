@extends('layouts.master')
@section('css')
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
                    <form method="post" action="{{ route('Students.store') }}" autocomplete="off"
                        enctype="multipart/form-data">
                        @csrf

                        <h6 style="font-family: Cairo ; font-size:20px; font-style:italic">
                            {{ trans('Students_trans.personal_information') }}
                        </h6><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ trans('Students_trans.name_ar') }}:</label>
                                    <input type="text" name="name_ar" value="{{ old('name_ar') }}" class="form-control">
                                    @error('name_ar')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ trans('Students_trans.name_en') }} : </label>
                                    <input class="form-control" name="name_en" value="{{ old('name_en') }}" type="text">
                                    @error('name_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ trans('Students_trans.email') }} : </label>
                                    <input type="email" value="{{ old('email') }}" name="email" class="form-control">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ trans('Students_trans.password') }} :</label>
                                    <input type="password" value="{{ old('password') }}" name="password"
                                        class="form-control">
                                    @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="gender">{{ trans('Students_trans.gender') }} : </label>
                                    <select class="form-control " name="gender_id">
                                        <option selected disabled>{{ trans('myPArents.Choose') }}...</option>
                                        @foreach ($Genders as $Gender)
                                            <option value="{{ $Gender->id }}">{{ $Gender->Name }}</option>
                                        @endforeach
                                    </select>
                                    @error('gender_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nal_id">{{ trans('Students_trans.Nationality') }} : </label>
                                    <select class="form-control " name="nationalitie_id">
                                        <option selected disabled>{{ trans('myPArents.Choose') }}...</option>
                                        @foreach ($nationals as $nal)
                                            <option value="{{ $nal->id }}">{{ $nal->Name }}</option>
                                        @endforeach
                                    </select>
                                    @error('nationalitie_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="bg_id">{{ trans('Students_trans.blood_type') }} : </label>
                                    <select class="form-control " name="blood_id">
                                        <option selected disabled>{{ trans('myPArents.Choose') }}...</option>
                                        @foreach ($bloods as $bg)
                                            <option value="{{ $bg->id }}">{{ $bg->Name }}</option>
                                        @endforeach
                                    </select>
                                    @error('blood_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{ trans('Students_trans.Date_of_Birth') }} :</label>
                                    <input value="{{ old('Date_Birth') }}" class="form-control" type="date"
                                        name='Date_Birth'>
                                    @error('Date_Birth')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <h6 style="font-family: Cairo ; font-size:20px; font-style:italic">
                            {{ trans('Students_trans.Student_information') }}
                        </h6><br>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Grade_id">{{ trans('Students_trans.Grade') }} : </label>
                                    <select class="form-control " name="Grade_id">
                                        <option selected disabled>{{ trans('myPArents.Choose') }}...</option>
                                        @foreach ($Grades as $c)
                                            <option value="{{ $c->id }}">{{ $c->Name }}</option>
                                        @endforeach
                                    </select>
                                    @error('Grade_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Classroom_id">{{ trans('Students_trans.classrooms') }} : </label>
                                    <select class="form-control " name="Classroom_id">
                                    </select>
                                    @error('Classroom_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="section_id">{{ trans('Students_trans.section') }} : </label>
                                    <select class="form-control " name="section_id">
                                    </select>
                                    @error('section_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="parent_id">{{ trans('Students_trans.parent') }} : </label>
                                    <select class="form-control " name="parent_id">
                                        <option selected disabled>{{ trans('myPArents.Choose') }}...</option>
                                        @foreach ($parents as $parent)
                                            <option value="{{ $parent->id }}">{{ $parent->Name_Father }}</option>
                                        @endforeach
                                    </select>
                                    @error('parent_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="academic_year">{{ trans('Students_trans.academic_year') }} : </label>
                                    <select class="form-control " name="academic_year">
                                        <option selected disabled>{{ trans('myPArents.Choose') }}...</option>
                                        @php
                                            $current_year = date('Y');
                                        @endphp
                                        @for ($year = $current_year; $year <= $current_year + 1; $year++)
                                            <option value="{{ $year }}">{{ $year }}</option>
                                        @endfor
                                    </select>
                                    @error('academic_year')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="academic_year">{{ trans('Students_trans.Attachments') }} : </label>
                                <input type="file" name="photos[]" multiple class="dropify" data-height="80" />
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-success-gradient py-0 nextBtn btn-lg pull-right"
                            type="submit">{{ trans('Students_trans.submit') }}</button>
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
