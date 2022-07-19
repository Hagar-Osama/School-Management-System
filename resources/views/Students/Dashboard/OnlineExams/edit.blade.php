@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{trans('onlineExams.Edit Online Exam')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{trans('onlineExams.Edit Online Exam')}}
            </h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="default-color">{{trans('teachers.Home')}}</a></li>
                <li class="breadcrumb-item active">{{trans('onlineExams.Edit Online Exam')}}
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
                        <form action="{{route('onlineExams.update')}}" method="post" autocomplete="off">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="onlineExam_id" value="{{$onlineExam->id}}">

                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{trans('onlineExams.Online Exam Name In Arabic')}}</label>
                                    <input type="text" name="name_ar" value="{{$onlineExam->getTranslation('name', 'ar')}}" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="title">{{trans('onlineExams.Online Exam Name In English')}}</label>
                                    <input type="text" name="name_en" value="{{$onlineExam->getTranslation('name', 'en')}}" class="form-control">
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="inputState"> {{trans('subjects.Subject Name')}}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="subject_id">
                                        <option selected disabled>{{trans('Parents.Choose')}}...</option>
                                        @foreach($subjects as $subject)
                                        <option value="{{$subject->id}}" {{$subject->id == $onlineExam->subject_id ? 'selected' : ""}}>{{$subject->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="inputState"> {{trans('teachers.Teacher Name')}}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="teacher_id">
                                        <option selected disabled>{{trans('Parents.Choose')}}...</option>
                                        @foreach($teachers as $teacher)
                                        <option value="{{$onlineExam->teachers->id}}"{{$onlineExam->teacher_id == $teacher->id ? 'selected' : ""}}>{{$teacher->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">

                                <div class="col">
                                    <div class="form-group">
                                        <label for="Grade_id">{{trans('grades.Grades')}} : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="grade_id">
                                            <option selected disabled>{{trans('Parents.Choose')}}...</option>
                                            @foreach($grades as $grade)
                                            <option value="{{ $grade->id }}" {{$onlineExam->grade_id == $grade->id ? 'selected' : ""}}>{{ $grade->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="class_id">{{trans('classes.Classes')}} : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="class_id">
                                            <option value="{{ $onlineExam->class_id }}">{{ $onlineExam->classes->name }}</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="section_id">{{trans('sections.Sections')}} : </label>
                                        <select class="custom-select mr-sm-2" name="section_id">
                                            <option value="{{ $onlineExam->section_id }}">{{ $onlineExam->sections->name }}</option>

                                        </select>
                                    </div>
                                </div>

                            </div>
                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit"> {{trans('subjects.Submit')}}</button>
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
