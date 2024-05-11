@extends('layouts.master')
@section('css')

@endsection
@section('title')
    {{ trans('tests.List_q') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ $quizze->name }} Test</h4>
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
                        <table id="example1" class="table  table-hover table-sm table-bordered p-0" data-page-length="10"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">اسم الطالب</th>
                                    <th scope="col">حالة الاختبار</th>
                                    <th scope="col">العلامة</th>
                                    <th scope="col">العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($degrees as $degree)
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $degree->student->name }}</td>
                                    <td>
                                        @if ($degree->abuse == 0)
                                            تم اجتياز الاختبار بشكل كامل

                                        @else
                                            حدث تلاعب اثناء عملية الاختبار
                                        @endif
                                    </td>
                                    <td>{{ $degree->score }} / {{ $degree->mark }}</td>
                                    <td>
                                        @if ($degree->abuse == 1)
                                            <a type="button" class="btn btn-success-gradient btn-sm" style="font-weight: bolder" href="{{route('RecycleTest',$degree->id)}}"><i
                                                    class="fa fa-recycle"></i> السماح بإعادة الاختبار
                                            </a>
                                        @else
                                        	 <span class="btn-success-gradient btn-sm" style="font-weight: bolder">Done</span>
                                        @endif

                                    </td>
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
@endsection
