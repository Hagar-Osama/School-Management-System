@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{ trans('students.Add Student') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('students.Add Student')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}" class="default-color">{{trans('students.Home')}}</a></li>
                <li class="breadcrumb-item active">{{trans('students.Add Student')}}</li>
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
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <br>
                        <form action="{{route('students.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('Students.Personal Information')}}</h6><br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{trans('Students.Student Name_ar')}} : <span class="text-danger">*</span></label>
                                        <input type="text" name="name_ar" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{trans('Students.Student Name_en')}} : <span class="text-danger">*</span></label>
                                        <input class="form-control" name="name_en" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{trans('Students.Email')}} : </label>
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{trans('Students.Password')}} :</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="gender">{{trans('Students.Gender')}} : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="gender_id">
                                            <option selected disabled>{{trans('Parents.Choose')}}...</option>
                                            @foreach($genders as $gender)
                                            <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="nal_id">{{trans('Students.Nationality')}} : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="nationality_id">
                                            <option selected disabled>{{trans('Parents.Choose')}}...</option>
                                            @foreach($nationalities as $nal)
                                            <option value="{{ $nal->id }}">{{ $nal->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="bg_id">{{trans('Students.Blood Type')}} : </label>
                                        <select class="custom-select mr-sm-2" name="blood_id">
                                            <option selected disabled>{{trans('Parents.Choose')}}...</option>
                                            @foreach($bloods as $blood)
                                            <option value="{{ $blood->id }}">{{ $blood->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>{{trans('Students.Birth Date')}} :</label>
                                        <input class="form-control" type="text" id="datepicker-action" name="birth_date" data-date-format="yyyy-mm-dd">
                                    </div>
                                </div>

                            </div>

                            <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('Students.Student Information')}}</h6><br>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="Grade_id">{{trans('grades.Grades')}} : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="grade_id">
                                            <option selected disabled>{{trans('Parents.Choose')}}...</option>
                                            @foreach($grades as $grade)
                                            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="class_id">{{trans('classes.Classes')}} : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="class_id">

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="section_id">{{trans('sections.Sections')}} : </label>
                                        <select class="custom-select mr-sm-2" name="section_id">

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="parent_id">{{trans('Students.Parents')}} : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="parent_id">
                                            <option selected disabled>{{trans('Parents.Choose')}}...</option>
                                            @foreach($parents as $parent)
                                            <option value="{{ $parent->id }}">{{ $parent->father_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="academic_year">{{trans('Students.Academic Year')}} : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="academic_year">
                                            <option selected disabled>{{trans('Parents.Choose')}}...</option>
                                            @php
                                            $current_year = date("Y");
                                            @endphp
                                            @for($year=$current_year; $year<=$current_year +1 ;$year++) <option value="{{ $year}}">{{ $year }}</option>
                                                @endfor
                                        </select>
                                    </div>
                                </div>
                            </div><br>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="academic_year">{{trans('Students.Attachments')}} : <span class="text-danger">*</span></label>
                                    <input type="file" accept="image/*" name="photos[]" multiple>
                                </div>
                            </div>

                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('Students.Submit')}}</button>
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

<script>
    $(document).ready(function() {
        $('select[name="grade_id"]').on('change', function() {
            var Grade_id = $(this).val();
            if (Grade_id) {
                $.ajax({
                    url: "{{ URL::to('students/classes') }}/" + Grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="class_id"]').empty();
                        $('select[name="class_id"]').append('<option selected disabled >{{trans('parents.Choose')}}...</option>');
                        $.each(data, function(key, value) {
                            $('select[name="class_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('select[name="class_id"]').on('change', function() {
            var class_id = $(this).val();
            if (class_id) {
                $.ajax({
                    url: "{{ URL::to('students/sections') }}/" + class_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="section_id"]').empty();
                        $('select[name="section_id"]').append('<option selected disabled >{{trans('parents.Choose')}}...</option>');
                        $.each(data, function(key, value) {
                            $('select[name="section_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
@endsection