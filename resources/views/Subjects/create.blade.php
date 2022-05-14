@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{trans('subjects.Add Subject')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('subjects.Add Subject')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}" class="default-color">{{trans('teachers.Home')}}</a></li>
                <li class="breadcrumb-item active">{{trans('subjects.Add Subject')}}</li>
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
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <br>
                        <form action="{{route('subjects.store')}}" method="post" autocomplete="off">
                            @csrf

                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{trans('subjects.Subject Name In Arabic')}}</label>
                                    <input type="text" name="name_ar" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="title">{{trans('subjects.Subject Name In English')}}</label>
                                    <input type="text" name="name_en" class="form-control">
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputState"> {{trans('grades.Grade Name')}}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="grade_id">
                                        <option selected disabled>{{trans('Parents.Choose')}}...</option>
                                        @foreach($grades as $grade)
                                        <option value="{{$grade->id}}">{{$grade->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col">
                                    <label for="inputState"> {{trans('classes.Class Name')}}</label>
                                    <select name="class_id" class="custom-select"></select>
                                </div>


                                <div class="form-group col">
                                    <label for="inputState">{{trans('teachers.Teacher Name')}}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="teacher_id">
                                        <option selected disabled>{{trans('Parents.Choose')}}...</option>
                                        @foreach($teachers as $teacher)
                                        <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                        @endforeach
                                    </select>
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
