@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{trans('attendance.Add Attendance')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('attendance.Add Attendance')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="default-color">{{trans('classes.Home')}}</a></li>
                <li class="breadcrumb-item active">{{trans('attendance.Add Attendance')}}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (session('status'))
<div class="alert alert-danger">
    <ul>
        <li>{{ session('status') }}</li>
    </ul>
</div>
@endif



<h5 style="font-family: 'Cairo', sans-serif;color: red">  {{trans('attendance.Today Date')}} : {{ date('Y-m-d') }}</h5>
<form method="post" action="{{ route('attendance.store') }}">

    @csrf
    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
        <thead>
            <tr>
                <th class="alert-success">#</th>
                <th class="alert-success">{{ trans('Students.Student Name') }}</th>
                <th class="alert-success">{{ trans('Students.Email') }}</th>
                <th class="alert-success">{{ trans('Students.Gender') }}</th>
                <th class="alert-success">{{ trans('grades.Grade Name') }}</th>
                <th class="alert-success">{{ trans('classes.Class Name') }}</th>
                <th class="alert-success">{{ trans('sections.Section Name') }}</th>
                <th class="alert-success">{{ trans('Students.Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->gender->name }}</td>
                <td>{{ $student->grade->name }}</td>
                <td>{{ $student->class->name }}</td>
                <td>{{ $student->section->name }}</td>
                <td>

                    @if(isset($student->attendances()->where('attendance_date',date('Y-m-d'))->first()->student_id))

                    <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                        <input name="attendances[{{ $student->id }}]" disabled {{ $student->attendances()->latest()->first()->attendance_status == 1 ? 'checked' : '' }} class="leading-tight" type="radio" value="attendant">
                        <span class="text-success">{{trans('attendance.Attendance')}}</span>
                    </label>

                    <label class="ml-4 block text-gray-500 font-semibold">
                        <input name="attendances[{{ $student->id }}]" disabled {{ $student->attendances()->latest()->first()->attendance_status == 0 ? 'checked' : '' }} class="leading-tight" type="radio" value="absent">
                        <span class="text-danger">{{trans('attendance.Absence')}}</span>
                    </label>

                    @else

                    <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                        <input name="attendances[{{ $student->id }}]" class="leading-tight" type="radio" value="attendant">
                        <span class="text-success">{{trans('attendance.Attendance')}}</span>
                    </label>

                    <label class="ml-4 block text-gray-500 font-semibold">
                        <input name="attendances[{{ $student->id }}]" class="leading-tight" type="radio" value="absent">
                        <span class="text-danger">{{trans('attendance.Absence')}}</span>
                    </label>

                    @endif

                    <input type="hidden" name="student_id[]" value="{{ $student->id }}">
                    <input type="hidden" name="grade_id" value="{{ $student->grade_id }}">
                    <input type="hidden" name="class_id" value="{{ $student->class_id }}">
                    <input type="hidden" name="section_id" value="{{ $student->section_id }}">

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <P>
        <button class="btn btn-success" type="submit">{{ trans('Attendance.Submit') }}</button>
    </P>
</form><br>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
