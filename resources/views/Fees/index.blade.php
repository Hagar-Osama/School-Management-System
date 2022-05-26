@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{trans('fees.Tuition Fees')}}
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
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="default-color">{{trans('classes.Home')}}</a></li>
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
                            <a href="{{route('fees.create')}}" class="btn btn-success btn-sm" role="button" aria-pressed="true">{{trans('fees.Add Fee')}}</a><br><br>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>{{trans('fees.Title')}}</th>
                                            <th>{{trans('fees.Amount')}}</th>
                                            <th>{{trans('fees.Grade Name')}}</th>
                                            <th>{{trans('fees.Class Name')}}</th>
                                            <th>{{trans('fees.Academic Year')}}</th>
                                            <th>{{trans('fees.Fees Type')}}</th>
                                            <th>{{trans('fees.Description')}}</th>
                                            <th>{{trans('fees.Actions')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($fees as $fee)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$fee->title}}</td>
                                            <td>{{ number_format($fee->amount, 2) }}</td>
                                            <td>{{$fee->grade->name}}</td>
                                            <td>{{$fee->class->name}}</td>
                                            <td>{{$fee->year}}</td>
                                            <td>{{$fee->fees_type}}</td>
                                            <td>{{$fee->description}}</td>
                                            <td>
                                                <a href="{{route('fees.edit',$fee->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_Fee{{ $fee->id }}" title="{{ trans('fees.Delete Fee') }}"><i class="fa fa-trash"></i></button>
                                                <a href="#" class="btn btn-warning btn-sm" role="button" aria-pressed="true"><i class="far fa-eye"></i></a>

                                            </td>
                                        </tr>
                                        @include('Fees.delete')
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
