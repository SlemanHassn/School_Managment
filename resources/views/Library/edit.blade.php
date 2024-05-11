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
    {{ trans('tests.Book_Edit') }} {{ $book->title }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('Subjects.Subject') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{ trans('tests.Book_Edit') }} {{ $book->title }}</span>
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
                    <form action="{{ route('library.update', 'test') }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-row">

                            <div class="col">
                                <input type="hidden" name="id" value="{{ $book->id }}">
                                <label for="title">{{ trans('tests.Book_name_ar') }}</label>
                                <input type="text" name="title_ar" value="{{ $book->getTranslation('title', 'ar') }}"
                                    class="form-control">
                            </div>
                            <div class="col">
                                <label for="title">{{ trans('tests.Book_name_en') }}</label>
                                <input type="text" name="title_en" value="{{ $book->getTranslation('title', 'en') }}"
                                    class="form-control">
                            </div>

                        </div>
                        <div class="form-row">

                            <div class="col">
                                <div class="form-group">
                                    <label for="Grade_id">{{ trans('Students_trans.Grade') }} : </label>
                                    <select class="form-control" name="Grade_id">
                                        <option selected disabled>{{ trans('Parent_trans.Choose') }}...</option>
                                        @foreach ($grades as $grade)
                                            <option value="{{ $grade->id }}"
                                                {{ $book->Grade_id == $grade->id ? 'selected' : '' }}>{{ $grade->Name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="Classroom_id">{{ trans('Students_trans.classrooms') }} : </label>
                                    <select class="form-control" name="Classroom_id">
                                        <option value="{{ $book->Classroom_id }}">{{ $book->classroom->Name }}
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="section_id">{{ trans('Students_trans.section') }} : </label>
                                    <select class="form-control" name="section_id">
                                        <option value="{{ $book->section_id }}">{{ $book->section->Name }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">

                                <embed src="{{ URL::asset('attachments/library/' . $book->file_name) }}"
                                    type="application/pdf" height="100%" width="100% "><br><br>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label>{{ trans('tests.Attachments') }}</label>
                                    <input type="file" name="file_name" multiple class="dropify" accept="application/pdf"
                                        data-height="80" />
                                </div>

                            </div>
                        </div>

                        <button class="btn btn-success-gradient py-0 nextBtn btn-lg pull-right"
                            type="submit">{{ trans('tests.U_data') }}
                        </button>
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
