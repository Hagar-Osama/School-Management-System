@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{trans('studentsRefunds.Add Student Refund')}} {{$student->name}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('studentsRefunds.Add Student Refund')}} : <label style="color: red">{{$student->name}}</label></h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}" class="default-color">{{trans('classes.Home')}}</a></li>
                <li class="breadcrumb-item active">{{trans('studentsRefunds.Add Student Refund')}}</li>
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

                    <form method="post"  action="{{ route('studentRefunds.store') }}" autocomplete="off">
                        @csrf
                        <input  type="hidden" name="student_id"  value="{{$student->id}}" class="form-control">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('StudentsRefunds.Amount')}} : <span class="text-danger">*</span></label>
                                    <input  class="form-control" name="debit" type="number" >
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> {{trans('StudentsRefunds.Student Balance')}} : </label>
                                    <input  class="form-control" name="balance" value="{{ number_format($student->studentAccount->sum('debit') - $student->studentAccount->sum('credit'), 2) }}" type="text" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{trans('StudentsRefunds.Description')}} : <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('StudentsRefunds.Submit')}}</button>
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