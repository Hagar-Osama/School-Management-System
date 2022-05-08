@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    الفواتير الدراسية
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('fees.Tuition Fees')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}" class="default-color">{{trans('classes.Home')}}</a></li>
                <li class="breadcrumb-item active">{{trans('fees.Tuition Fees')}}</li>
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
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>{{trans('students.Student Name')}}</th>
                                            <th>{{trans('fees.Fees Type')}}</th>
                                            <th>{{trans('fees.Amount')}}</th>
                                            <th> {{trans('grades.Grade Name')}}</th>
                                            <th> {{trans('classes.Class Name')}}</th>
                                            <th>{{trans('fees.Description')}}</th>
                                            <th>{{trans('fees.Actions')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($feesInvoices as $invoice)
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$invoice->student->name}}</td>
                                            <td>{{$invoice->fees->title}}</td>
                                            <td>{{ number_format($invoice->amount, 2) }}</td>
                                            <td>{{$invoice->grade->name}}</td>
                                            <td>{{$invoice->class->name}}</td>
                                            <td>{{$invoice->description}}</td>
                                                <td>
                                                    <a href="#" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#" ><i class="fa fa-trash"></i></button>
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
