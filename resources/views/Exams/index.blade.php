@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{trans('exams.Exams')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{trans('exams.Exams')}}
            </h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}" class="default-color">{{trans('teachers.Home')}}</a></li>
                <li class="breadcrumb-item active">{{trans('exams.Exams')}}
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
                            <a href="{{route('subjects.create')}}" class="btn btn-success btn-sm" role="button" aria-pressed="true"> @section('content')
                                <!-- row -->
                                <div class="row">
                                    <div class="col-md-12 mb-30">
                                        <div class="card card-statistics h-100">
                                            <div class="card-body">
                                                <div class="col-xl-12 mb-30">
                                                    <div class="card card-statistics h-100">
                                                        <div class="card-body">
                                                            <a href="{{route('exams.create')}}" class="btn btn-success btn-sm" role="button" aria-pressed="true"> {{trans('exams.Add Exam')}}
                                                            </a><br><br>
                                                            <div class="table-responsive">
                                                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th> {{trans('subjects.Subject Name')}}</th>
                                                                            <th> {{trans('exams.Semester')}}</th>
                                                                            <th> {{trans('exams.Academic Year')}}</th>
                                                                            <th>{{trans('exams.Actions')}}</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach($exams as $exam)
                                                                        <tr>
                                                                            <td>{{$loop->iteration}}</td>
                                                                            <td>{{$exam->subjects->name}}</td>
                                                                            <td>{{$exam->semester}}</td>
                                                                            <td>{{$exam->academic_year}}</td>

                                                                            <td><a href="{{route('exams.edit', $exam->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                                            <form action="{{route('exams.destroy')}}" method="post" style="display: inline-block;">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <input type="hidden" name="exam_id" value="{{$exam->id}}">
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
