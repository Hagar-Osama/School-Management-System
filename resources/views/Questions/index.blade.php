@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{trans('questions.Questions')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{trans('questions.Questions')}}
            </h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}" class="default-color">{{trans('teachers.Home')}}</a></li>
                <li class="breadcrumb-item active">{{trans('questions.Questions')}}
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
                            <a href="{{route('questions.create')}}" class="btn btn-success btn-sm" role="button" aria-pressed="true"> {{trans('questions.Add Question')}}
                            </a><br><br>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th> {{trans('questions.Questions')}}</th>
                                            <th> {{trans('questions.Answer')}}</th>
                                            <th> {{trans('questions.Score')}}</th>
                                            <th> {{trans('questions.Right Answer')}}</th>
                                            <th> {{trans('onlineExams.Online Exams')}}</th>
                                            <th>{{trans('questions.Actions')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($questions as $question)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$question->question}}</td>
                                            <td>{{$question->answer}}</td>
                                            <td>{{$question->score}}</td>
                                            <td>{{$question->right_answer}}</td>
                                            <td>{{$question->onlineExam->name}}</td>

                                            <td><a href="{{route('questions.edit', $question->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                <form action="{{route('questions.destroy')}}" method="post" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="question_id" value="{{$question->id}}">
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
