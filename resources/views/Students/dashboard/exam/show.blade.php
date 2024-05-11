@extends('layouts.master')
@section('css')

@endsection
@section('title')
    {{ trans('Dstudent.Test') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('Dstudent.Test') }}</h4>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12">

            @livewire('student-exams', ['quizze_id' => $quizze_id, 'student_id' => $student_id])

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
     @livewireScripts
@endsection
