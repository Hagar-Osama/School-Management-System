@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{ trans('Sections.Sections') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('sections.Sections')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('teacher.dashboard')}}" class="default-color">{{trans('sections.Home')}}</a></li>
                <li class="breadcrumb-item active">{{trans('sections.Sections List')}}</li>
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
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('Sections.Section Name') }}</th>
                                            <th>{{ trans('classes.Class Name') }}</th>
                                            <th>{{ trans('grades.Grade Name') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sections as $section)
                                        <tr>

                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $section->name }}</td>
                                            <td>{{ $section->class->name }}</td>
                                            <td>{{ $section->grade->name }}</td>

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
