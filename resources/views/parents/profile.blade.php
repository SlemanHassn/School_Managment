@extends('layouts.master')
@section('css')
@endsection
@section('title')
    {{ trans('Dstudent.Myprofile') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('DTeacher.Myprofile') }}</h4>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-lg-4 ">
            <div class="card mg-b-20">
                <div class="card-body shadow-lg">
                    <div class="pl-0 m-auto text-center">
                        <div class="main-profile-overview ">
                            <div class="main-img-user profile-user ">
                                <img alt="" src="{{ URL::asset('assets/img/student.png') }}">
                            </div>
                            <div class=" mg-b-20">
                                <div>
                                    <p class="main-profile-name-text mb-1">Parent</p>
                                    <h5 class="main-profile-name mb-3">{{ $info->Name_Father }}</h5>
                                    <p class="main-profile-name-text mb-2">{{ $info->email }}</p>
                                    <p class="main-profile-name-text mb-2">{{ $info->Phone_Father }}</p>
                                    <p class="main-profile-name-text mb-2">{{ $info->Job_Father }}</p>
                                    <p class="main-profile-name-text mb-2">{{ $info->Address_Father }}</p>
                                    <h5 class="main-profile-name mb-3">{{ $info->Name_Mother }}</h5>
                                    <p class="main-profile-name-text mb-2">{{ $info->Phone_Mother }}</p>
                                    <p class="main-profile-name-text mb-3">{{ $info->Job_Mother }}</p>
                                    <p class="main-profile-name-text mb-3">{{ $info->Address_Mother }}</p>
                                </div>
                            </div>

                        </div><!-- main-profile-overview -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card mg-b-20">
                <div class="card-body shadow-lg">
                    <div class="pl-0">
                        <div class="main-profile-overview">
                            <form action="{{ route('profileStudent.update', $info->id) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">{{ trans('DTeacher.Name_ar') }}</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">
                                            <input type="text" name="Name_Father"
                                                value="{{ $info->getTranslation('Name_Father', 'ar') }}" class="form-control">
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="">{{ trans('DTeacher.Name_en') }}</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">
                                            <input type="text" name="Name_Father_en"
                                                value="{{ $info->getTranslation('Name_Father', 'en') }}" class="form-control">
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">{{ trans('DTeacher.Name_ar') }}</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">
                                            <input type="text" name="Name_Mother"
                                                value="{{ $info->getTranslation('Name_Mother', 'ar') }}" class="form-control">
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="">{{ trans('DTeacher.Name_en') }}</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">
                                            <input type="text" name="Name_Mother_en"
                                                value="{{ $info->getTranslation('Name_Mother', 'en') }}" class="form-control">
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">{{ trans('DTeacher.password') }}</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">
                                            <input type="password" id="password" class="form-control" name="password">
                                        </p><br><br>
                                        <input class="form-check-input" onclick="myFunction()" id="exampleCheck1"
                                            type="checkbox">
                                        <label class="form-check-label mr-3 "><span> {{ trans('DTeacher.Showpassword') }}</span></label>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-success-gradient btn-block">{{ trans('DTeacher.U_data') }}</button>
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
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
@endsection
