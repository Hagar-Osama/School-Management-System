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
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}" class="default-color">{{trans('teachers.Home')}}</a></li>
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
                                            <th> {{trans('grades.Grade Name')}}</th>
                                            <th> {{trans('classes.Class Name')}}</th>
                                            <th> {{trans('sections.Section Name')}}</th>
                                            <th> {{trans('teachers.Teacher Name')}}</th>
                                            <th>{{trans('onlineExams.Actions')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($onlineExams as $onlineExam)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$onlineExam->name}}</td>
                                            <td>{{$onlineExam->subjects->name}}</td>
                                            <td>{{$onlineExam->grades->name}}</td>
                                            <td>{{$onlineExam->classes->name}}</td>
                                            <td>{{$onlineExam->sections->name}}</td>
                                            <td>{{$onlineExam->teachers->name}}</td>

                                            <td><a href="{{route('onlineExams.edit', $onlineExam->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                <form action="{{route('onlineExams.destroy')}}" method="post" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="onlineExam_id" value="{{$onlineExam->id}}">
                                                    <button type="submit" onclick="return confirm('Are You Sure?')" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
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
@endsection
