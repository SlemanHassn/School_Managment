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
    {{ trans('side.Edit_Student') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('side.Students') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('side.Edit_Student') }}</span>
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
                    <form method="post" action="{{ route('Students.update', 'test') }}" autocomplete="off">
                        @csrf
                        @method('PUT')


                        <h3 style="font-style:italic"> {{ trans('Students_trans.personal_information') }}
                        </h3>
                        <br>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ trans('Students_trans.name_ar') }}:</label>
                                    <input type="hidden" value="{{ $student->id }}" name="id">
                                    <input type="text" name="name_ar" class="form-control"
                                        value="{{ $student->getTranslation('name', 'ar') }}">
                                    @error('name_ar')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ trans('Students_trans.name_en') }} : </label>
                                    <input class="form-control" name="name_en"
                                        value="{{ $student->getTranslation('name', 'en') }}" type="text">
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
                                    <input type="email" name="email" value="{{ $student->email }}"
                                        class="form-control">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ trans('Students_trans.password') }} :</label>
                                    <input type="password" name="password" value="{{ $student->password }}"
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
                                            <option value="{{ $Gender->id }}"
                                                {{ $student->Grade_id == $Gender->id ? 'selected' : '' }}>
                                                {{ $Gender->Name }}</option>
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
                                            <option value="{{ $nal->id }}"
                                                {{ $student->nationalitie_id == $nal->id ? 'selected' : '' }}>
                                                {{ $nal->Name }}
                                            </option>
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
                                            <option value="{{ $bg->id }}"
                                                {{ $student->blood_id == $bg->id ? 'selected' : '' }}>{{ $bg->Name }}
                                            </option>
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
                                    <input class="form-control" type="date" value="{{ $student->Date_Birth }}"
                                        name='Date_Birth'>
                                    @error('Date_Birth')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>


                        <h3 style="font-style:italic"> {{ trans('Students_trans.Student_information') }}
                        </h3>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Grade_id">{{ trans('Students_trans.Grade') }} : </label>
                                    <select class="form-control " name="Grade_id">
                                        <option selected disabled>{{ trans('myPArents.Choose') }}...</option>
                                        @foreach ($Grades as $c)
                                            <option value="{{ $c->id }}"
                                                {{ $student->Grade_id == $c->id ? 'selected' : '' }}>{{ $c->Name }}
                                            </option>
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
                                        <option value="{{ $student->Classroom_id }}" selected>
                                            {{ $student->classroom->Name }}</option>
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
                                        <option value="{{ $student->section_id }}" selected>
                                            {{ $student->section->Name }}</option>
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
                                            <option value="{{ $parent->id }}"
                                                {{ $student->parent_id == $parent->id ? 'selected' : '' }}>
                                                {{ $parent->Name_Father }}</option>
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
                                            <option value="{{ $year }}"
                                                {{ $student->academic_year == $year ? 'selected' : '' }}>
                                                {{ $year }}</option>
                                        @endfor
                                    </select>
                                    @error('academic_year')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div><br>
                        <button class="btn btn-success-gradient py-0 nextBtn btn-lg pull-right"
                            type="submit">{{ trans('Students_trans.update') }}</button>
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
                            $('select[name="Classroom_id"]').empty();
                            $('select[name="Classroom_id"]').append(
                                '<option selected disabled >{{ trans('myParents.Choose') }}...</option>'
                            );
                            $.each(data, function(key, value) {
                                $('select[name="Classroom_id"]').append(
                                    '<option value="' +
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
    <script>
        $(document).ready(function() {
            $('select[name="Classroom_id"]').on('change', function() {
                var Classroom_id = $(this).val();
                if (Classroom_id) {
                    $.ajax({
                        url: "{{ URL::to('getSections') }}/" + Classroom_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="section_id"]').empty();
                            $('select[name="section_id"]').append(
                                '<option selected disabled >{{ trans('myParents.Choose') }}...</option>'
                            );
                            $.each(data, function(key, value) {
                                $('select[name="section_id"]').append(
                                    '<option value="' +
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
