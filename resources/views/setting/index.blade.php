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
    {{ trans('tests.Settings') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> {{ trans('tests.Settings') }}</h4>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <!-- row -->
    <div class="row mb-3">
        <div class="col-xl-12">
            <div class="card card-statistics h-100">
                <div class="card-header">
                    @if (session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <form enctype="multipart/form-data" method="post" action="{{ route('settings.update', 'test') }}">
                        @csrf @method('PUT')
                        <div class="row">
                            <div class="col-md-7 border-right-2 border-right-blue-400">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label font-weight-semibold">
                                        {{ trans('tests.School_n') }}</label>
                                    <div class="col-lg-9">
                                        <input name="school_name" value="{{ $setting['school_name'] }}" required
                                            type="text" class="form-control" placeholder="Name of School">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="current_session"
                                        class="col-lg-3 col-form-label font-weight-semibold">{{ trans('tests.Current_year') }}
                                    </label>
                                    <div class="col-lg-9">
                                        <select data-placeholder="Choose..." required name="current_session"
                                            id="current_session" class="form-control">
                                            <option value=""></option>
                                            @for ($y = date('Y', strtotime('- 3 years')); $y <= date('Y', strtotime('+ 1 years')); $y++)
                                                <option
                                                    {{ $setting['current_session'] == ($y -= 1) . '-' . ($y += 1) ? 'selected' : '' }}>
                                                    {{ ($y -= 1) . '-' . ($y += 1) }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 col-form-label font-weight-semibold">{{ trans('tests.A_school') }}</label>
                                    <div class="col-lg-9">
                                        <input name="school_title" value="{{ $setting['school_title'] }}" type="text"
                                            class="form-control" placeholder="School Acronym">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 col-form-label font-weight-semibold">{{ trans('tests.phone') }}</label>
                                    <div class="col-lg-9">
                                        <input name="phone" value="{{ $setting['phone'] }}" type="text"
                                            class="form-control" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label font-weight-semibold">{{ trans('tests.Email') }}
                                    </label>
                                    <div class="col-lg-9">
                                        <input name="school_email" value="{{ $setting['school_email'] }}" type="email"
                                            class="form-control" placeholder="School Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 col-form-label font-weight-semibold">{{ trans('tests.School_address') }}</label>
                                    <div class="col-lg-9">
                                        <input required name="address" value="{{ $setting['address'] }}" type="text"
                                            class="form-control" placeholder="School Address">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 col-form-label font-weight-semibold">{{ trans('tests.End_first') }}</label>
                                    <div class="col-lg-9">
                                        <input name="end_first_term" value="{{ $setting['end_first_term'] }}"
                                            type="text" class="form-control date-pick" placeholder="Date Term Ends">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 col-form-label font-weight-semibold">{{ trans('tests.End_second') }}</label>
                                    <div class="col-lg-9">
                                        <input name="end_second_term" value="{{ $setting['end_second_term'] }}"
                                            type="text" class="form-control date-pick" placeholder="Date Term Ends">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 col-form-label font-weight-semibold">{{ trans('tests.School_logo') }}</label>
                                    <div class="col-lg-9">
                                        <div class="row">
                                            <div class="col-4">
                                                <img style="width: 100%; height: 100%"
                                                    src="{{ URL::asset('attachments/logo/' . $setting['logo']) }}"
                                                    alt="">
                                            </div>
                                            <div class="col-8">
                                                <input type="file" name="logo" multiple class="dropify"
                                                    accept="image/*" data-height="100" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success-gradient py-0 nextBtn btn-lg pull-right"
                            type="submit">{{ trans('tests.S_data') }}</button>
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
