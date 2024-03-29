@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{trans('questions.Add Question')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{trans('questions.Add Question')}}
            </h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="default-color">{{trans('teachers.Home')}}</a></li>
                <li class="breadcrumb-item active">{{trans('questions.Add Question')}}
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

                @if(session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('error') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @include('partials._errors')
                @include('partials._session')
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <br>
                        <form action="{{route('questions.store')}}" method="post" autocomplete="off">
                            @csrf
                            <input type="hidden" name="onlineExamId" value="{{$onlineExamId}}"

                            <div class="form-row">

                            <div class="col">
                                        <label for="title"> {{trans('questions.Question')}}</label>
                                        <input type="text" name="question" id="input-name"
                                               class="form-control form-control-alternative" autofocus>
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="title"> {{trans('questions.Answer')}} <span style="color: red; font-size: smaller"> يجب فصل بعلامه - بين الاسئلة</span></label>
                                        <textarea name="answer" class="form-control" id="exampleFormControlTextarea1"
                                                  rows="4"></textarea>
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">  {{trans('questions.Right Answer')}}</label>
                                        <input type="text" name="right_answer" id="input-name"
                                               class="form-control form-control-alternative" autofocus>
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="Grade_id">{{trans('questions.Score')}} : <span class="text-danger">*</span></label>
                                            <input type="number" name="score" id="input-name"
                                               class="form-control form-control-alternative" autofocus>
                                        </div>
                                    </div>
                                </div>
                                <br>
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit"> {{trans('questions.Submit')}}</button>
                    </form>
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
