@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{trans('studentsRefunds.Student Refunds')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('studentsRefunds.Student Refunds')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}" class="default-color">{{trans('classes.Home')}}</a></li>
                <li class="breadcrumb-item active">{{trans('studentsRefunds.Student Refunds')}}</li>
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
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>{{trans('students.Student Name')}}</th>
                                            <th>{{trans('studentsRefunds.Amount')}}</th>
                                            <th>{{trans('studentsRefunds.Description')}}</th>
                                            <th>{{trans('studentsRefunds.Actions')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($studentRefunds as $studentRefund)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$studentRefund->student->name}}</td>
                                            <td>{{ number_format($studentRefund->amount, 2) }}</td>
                                            <td>{{$studentRefund->description}}</td>
                                            <td>
                                                <a href="{{route('studentRefunds.edit',$studentRefund->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                <form action="{{route('studentRefunds.destroy')}}" method="post" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="studentRefund_id" value="{{$studentRefund->id}}">
                                                    <button type="submit" onclick="return confirm('Are You Sure?')" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
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