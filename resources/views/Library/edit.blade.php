@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{trans('library.Edit Book')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{trans('library.EDit Book')}}
            </h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}" class="default-color">{{trans('teachers.Home')}}</a></li>
                <li class="breadcrumb-item active">{{trans('library.Edit book')}}
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
                        <form action="{{route('library.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="library_id" value="{{$library->id}}">
                            <div class="form-row">

                                <div class="col">
                                    <label for="title"> {{trans('library.Book Name')}}</label>
                                    <input type="text" name="title" value="{{$library->title}}" class="form-control">
                                </div>

                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="Grade_id">{{trans('grades.Grade Name')}} : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="grade_id">
                                            <option selected disabled>{{trans('Parents.Choose')}}...</option>
                                            @foreach($grades as $grade)
                                            <option value="{{ $grade->id }}"{{$library->grade_id == $grade->id ? 'selected' : ""}}>{{ $grade->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="Classroom_id">{{trans('classes.Class Name')}} : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="class_id">
                                        <option value="{{ $library->classes->id }}">{{ $library->classes->name }}</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="section_id">{{trans('sections.Section Name')}} : </label>
                                        <select class="custom-select mr-sm-2" name="section_id">
                                        <option value="{{ $library->sections->id }}">{{ $library->sections->name }}</option>

                                        </select>
                                    </div>
                                </div>

                            </div><br>



                            <div class="form-row">
                                <div class="col">
                                <embed src="{{ env('AWS_URL').'library/'.$library->file_name }}" type="application/pdf"   height="150px" width="100px"><br><br>
                                <embed src="{{ URL::asset('storage/library/'.$library->file_name )}}" type="application/pdf"   height="150px" width="100px"><br><br>

                                    <div class="form-group">
                                        <label for="academic_year">{{trans('library.Book PDF')}} : <span class="text-danger">*</span></label>
                                        <input type="file" accept="application/pdf" name="file" required>
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