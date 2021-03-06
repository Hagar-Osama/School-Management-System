@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{trans('students.Students List')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('students.Students')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="default-color">{{trans('students.Home')}}</a></li>
                <li class="breadcrumb-item active">{{trans('students.Students List')}}</li>
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
                            <a href="{{route('students.create')}}" class="btn btn-success btn-sm" role="button" aria-pressed="true">{{ trans('students.Add Student') }}</a><br><br>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('students.Student Name')}}</th>
                                            <th>{{trans('students.Email')}}</th>
                                            <th>{{trans('students.Gender')}}</th>
                                            <th>{{trans('classes.Class Name')}}</th>
                                            <th>{{trans('grades.Grade Name')}}</th>
                                            <th>{{trans('sections.Section Name')}}</th>
                                            <th>{{trans('students.Actions')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($students as $student)
                                        <tr>

                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$student->name}}</td>
                                            <td>{{$student->email}}</td>
                                            <td>{{$student->gender->name}}</td>
                                            <td>{{$student->class->name}}</td>
                                            <td>{{$student->grade->name}}</td>
                                            <td>{{$student->section->name}}</td>

                                            <td>
                                                <div class="dropdown show">
                                                    <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        {{trans('students.Actions')}}
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" href="{{route('students.show', [$student->id])}}" class="btn btn-warning btn-sm" role="button" aria-pressed="true"><i style="color: #ffc107" class="far fa-eye"></i>&nbsp;{{trans('students.Student Information')}}&nbsp;</a>
                                                    <a class="dropdown-item" href="{{route('students.edit',[$student->id])}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i style="color:green" class="fa fa-edit"></i>&nbsp;{{trans('students.Edit Student')}}&nbsp;</a>
                                                    <a class="dropdown-item" href="{{route('feesInvoices.create',[$student->id])}}"><i style="color: #0000cc" class="fa fa-edit"></i>&nbsp;{{trans('fees.Add Invoice Fees')}}&nbsp;</a>
                                                    <a class="dropdown-item" href="{{route('payments.create',[$student->id])}}"><i style="color: #9dc8e2" class="fas fa-money-bill-alt"></i>&nbsp; &nbsp; {{trans('payments.Add Payments')}}</a>
                                                    <a class="dropdown-item" href="{{route('refunds.create',[$student->id])}}"><i style="color: #9dc8e2" class="fas fa-money-bill-alt"></i>&nbsp; &nbsp; {{trans('refunds.Add Refund')}}</a>
                                                    <a class="dropdown-item" href="{{route('studentRefunds.create',[$student->id])}}"><i style="color: #9dc8e2" class="fas fa-money-bill-alt"></i>&nbsp; &nbsp; {{trans('studentsRefunds.Add Student Refund')}}</a>
                                                    <a class="dropdown-item" data-target="#delete_student{{$student->id}}" title="{{ trans('students.Delete Student') }}" data-toggle="modal" href="delete_Student{{ $student->id }}"><i style="color: red" class="fa fa-trash"></i>&nbsp;{{trans('students.Delete Student')}}&nbsp;</a>


                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="delete_student{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form action="{{route('students.destroy','test')}}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('students.Delete Student') }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p> {{ trans('students.Delete Student Warning') }}</p>
                                                            <input type="hidden" name="student_id" value="{{$student->id}}">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('students.Close') }}</button>
                                                                <button type="submit" class="btn btn-danger">{{ trans('students.Submit') }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
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
