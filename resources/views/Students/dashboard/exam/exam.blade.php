@extends('layouts.master')
@section('css')

@endsection
@section('title')
    {{ trans('Dstudent.Exams') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('Dstudent.Exams') }}</h4>
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
                    <div class="table-responsive">
                        <table id="example1" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('Dstudent.Subject') }}</th>
                                    <th>{{ trans('Dstudent.TestName') }}</th>
                                    <th>{{ trans('Dstudent.Enter_or_exam_mark') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($quizzes as $quizze)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $quizze->subject->name }}</td>
                                        <td>{{ $quizze->name }}</td>
                                        <td>

                                            @if ($quizze->degree->count() > 0 && $quizze->id == $quizze->degree[0]->quizze_id)
                                            {{$quizze->degree[0]->score}}/{{$quizze->degree[0]->mark}}
                                            @else
                                                <a href="{{ route('student_exams.show', $quizze->id) }}"
                                                    class="btn btn-success-gradient btn-sm" role="button"
                                                    aria-pressed="true" onclick="alertAbuse()">
                                                    <i class="fas fa-person-booth"></i></a>
                                            @endif
                                        </td>
                                    </tr>
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

    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
<script>
    function alertAbuse(){
        alert('الرجاء عدم اعادة تحميل الصفحة والا سيتم الغاء الاختبار ووضع علامة 0 - عند اختيار الاحابة يتم الانتقال الى السؤال التالي بشكل مباشر ولا يمكن العودة للسؤال السابق');
    }
</script>
@endsection
