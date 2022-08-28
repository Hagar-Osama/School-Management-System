
@extends('layouts.master')
@section('css')

@section('title')
{{trans('dashboardPage.Attendance Reports')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('dashboardPage.Attendance Reports')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('parents.dashboard')}}" class="default-color">{{trans('sections.Home')}}</a></li>
                <li class="breadcrumb-item active">{{trans('dashboardPage.Attendance Reports')}}</li>
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

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post"  action="{{route('attendance.search')}}" autocomplete="off">
                    @csrf
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">معلومات البحث</h6><br>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="student">{{trans('students.Students')}}</label>
                                <select class="custom-select mr-sm-2" name="student_id">
                                    <option value="all">الكل</option>
                                    @foreach($studentsTable as $student)
                                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="card-body datepicker-form">
                            <div class="input-group" data-date-format="yyyy-mm-dd">
                                <input type="text"  class="form-control range-from date-picker-default" placeholder="تاريخ البداية" required name="from">
                                <span class="input-group-addon">الي تاريخ</span>
                                <input class="form-control range-to date-picker-default" placeholder="تاريخ النهاية" type="text" required name="to">
                            </div>
                        </div>

                    </div>
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('Students.Submit')}}</button>
                </form>
                @isset($studentsTable)
                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                           style="text-align: center">
                        <thead>
                        <tr>
                            <th class="alert-success">#</th>
                            <th class="alert-success">{{trans('Students.Student Name')}}</th>
                            <th class="alert-success">{{trans('grades.Grade Name')}}</th>
                            <th class="alert-success">{{trans('sections.Section Name')}}</th>
                            <th class="alert-success">{{trans('attendance.Today Date')}}</th>
                            <th class="alert-warning">{{trans('attendance.Attendance Status')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($studentsTable as $studentAttendance)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{$studentAttendance->name}}</td>
                                <td>{{$studentAttendance->grade->name}}</td>
                                <td>{{$studentAttendance->section->name}}</td>
                                @foreach($studentAttendance->attendances as $attendanceDate)
                                <td>{{$attendanceDate->attendance_date}}</td>
                                @endforeach
                                <td>

                                    @if($studentAttendance->attendance_status == 0)
                                        <span class="btn-danger">{{trans('attendance.Absence')}}</span>
                                    @else
                                        <span class="btn-success">{{trans('attendance.Attendance')}}</span>
                                    @endif
                                </td>
                            </tr>

                        @endforeach
                    </table>
                </div>
                @endisset

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
