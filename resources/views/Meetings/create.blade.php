@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{trans('meetings.Add Online Class')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{trans('meetings.Add Online Class')}}
            </h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}" class="default-color">{{trans('teachers.Home')}}</a></li>
                <li class="breadcrumb-item active">{{trans('meetings.Add Online Class')}}
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
                        <form action="{{route('onlineMeetings.store')}}" method="post" autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="Grade_id">{{ trans('grades.Grade Name') }} : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="grade_id">
                                            <option selected disabled>{{ trans('Parents.Choose') }}...</option>
                                            @foreach ($grades as $grade)
                                            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="Classroom_id">{{ trans('classes.Class Name') }} : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="class_id">

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="section_id">{{ trans('sections.Section Name') }} : </label>
                                        <select class="custom-select mr-sm-2" name="section_id">

                                        </select>
                                    </div>
                                </div>
                            </div><br>

                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> {{trans('meetings.Topic')}} : <span class="text-danger">*</span></label>
                                        <input class="form-control" name="topic" type="text">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>  {{trans('meetings.Starting At')}} : <span class="text-danger">*</span></label>
                                        <input class="form-control" type="datetime-local" name="start_time">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>  {{trans('meetings.Duration')}} : <span class="text-danger">*</span></label>
                                        <input class="form-control" name="duration" type="text">
                                    </div>
                                </div>

                            </div>
                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{ trans('meetings.Submit') }}</button>
                        </form>

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
