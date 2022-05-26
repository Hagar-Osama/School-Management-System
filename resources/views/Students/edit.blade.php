@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{ trans('students.Edit Student') }}
@stop
@endsection
@section('page-header')
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('students.Edit Student')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="default-color">{{trans('students.Home')}}</a></li>
                <li class="breadcrumb-item active">{{trans('students.Edit Student')}}</li>
            </ol>
        </div>
    </div>
</div>
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
                        <form action="{{route('students.update')}}" method="post">
                            @method('PUT')
                            @csrf
                            <input type="hidden" value="{{$student->id}}" name="student_id">
                            <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('Students.Personal Information')}}</h6><br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{trans('Students.Student Name_ar')}} : <span class="text-danger">*</span></label>
                                        <input type="text" name="name_ar" value="{{$student->getTranslation('name', 'ar')}}" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{trans('Students.Student Name_en')}} : <span class="text-danger">*</span></label>
                                        <input class="form-control" name="name_en" value="{{$student->getTranslation('name', 'en')}}" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{trans('Students.Email')}} : </label>
                                        <input type="email" name="email" value="{{$student->email}}" class="form-control">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{trans('Students.Password')}} :</label>
                                        <input type="password" name="password" value="{{$student->password}}" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="gender">{{trans('Students.Gender')}} : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="gender_id">
                                            <option selected disabled>{{trans('Parents.Choose')}}...</option>
                                            @foreach($genders as $gender)
                                            <option value="{{ $gender->id }}" {{$student->gender_id == $gender->id ? 'selected' : ""}}>{{ $gender->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="nal_id">{{trans('Students.Nationality')}} : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="nationality_id">
                                            <option selected disabled>{{trans('Parents.Choose')}}...</option>
                                            @foreach($nationalities as $nationality)
                                            <option value="{{ $nationality->id }}" {{$student->nationality_id == $nationality->id ? 'selected' : ""}}>{{ $nationality->name }}</option>
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
                                            <option value="{{ $blood->id }}" {{$student->blood_id == $blood->id ? 'selected' : ""}}>{{ $blood->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>{{trans('Students.Birth Date')}} :</label>
                                        <input class="form-control" type="text" id="datepicker-action" name="birth_date" value="{{$student->birth_date}}" data-date-format="yyyy-mm-dd">
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
                                            <option value="{{ $grade->id }}" {{$student->grade_id == $grade->id ? 'selected' : ""}}>{{ $grade->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="class_id">{{trans('classes.Classes')}} : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="class_id">
                                            <option value="{{ $student->class_id }}">{{ $student->class->name }}</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="section_id">{{trans('sections.Sections')}} : </label>
                                        <select class="custom-select mr-sm-2" name="section_id">
                                            <option value="{{ $student->section_id }}">{{ $student->section->name }}</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="parent_id">{{trans('Students.Parents')}} : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="parent_id">
                                            <option selected disabled>{{trans('Parents.Choose')}}...</option>
                                            @foreach($parents as $parent)
                                            <option value="{{ $parent->id }}" {{$student->parent_id == $parent->id ? 'selected' : ""}}>{{ $parent->father_name }}</option>
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
                                            @for($year=$current_year; $year<=$current_year +1 ;$year++) <option value="{{ $year}}"{{$student->academic_year == $year ? 'selected' : ""}}>{{ $year }}</option>
                                                @endfor
                                        </select>
                                    </div>
                                </div>
                            </div><br>

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


@endsection
