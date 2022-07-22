@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{trans('onlineExams.Online Exams')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{trans('onlineExams.Online Exams')}}
            </h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="default-color">{{trans('teachers.Home')}}</a></li>
                <li class="breadcrumb-item active">{{trans('onlineExams.Online Exams')}}
                </li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <a href="{{route('onlineExams.create')}}" class="btn btn-success btn-sm" role="button" aria-pressed="true"> {{trans('onlineExams.Add Online Exam')}}
                            </a><br><br>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th> {{trans('onlineExams.Online Exams')}}</th>
                                            <th> {{trans('subjects.Subject Name')}}</th>
                                            <th>{{trans('onlineExams.TakeExam / Score')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($onlineExams as $onlineExam)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$onlineExam->name}}</td>
                                            <td>{{$onlineExam->subjects->name}}</td>

                                            <td>
                                                @if($onlineExam->scores->count() > 0 && $onlineExam->id == $onlineExam->scores[0]->online_exam_id)
                                                {{$onlineExam->scores[0]->score}}
                                                @else
                                                <a href="{{route('studentsOnlineExams.show',$onlineExam->id)}}" class="btn btn-outline-success btn-sm" role="button" aria-pressed="true" onclick="alertManipulation()">
                                                    <i class="fas fa-person-booth"></i></a></a>
                                            </td>
                                        </tr>

                                        @endif

                                        @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
<script>
    function alertManipulation() {
        alert('Please dont try to refresh the page once you start the exam,if you did, your exam will be ended automatically');
    }
    </script>
@endsection
