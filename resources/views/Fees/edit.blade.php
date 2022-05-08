@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{trans('fees.Edit Fee')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('fees.Edit Fee')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}" class="default-color">{{trans('classes.Home')}}</a></li>
                <li class="breadcrumb-item active">{{trans('fees.Edit Fee')}}</li>
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

                    <form method="post" action="{{ route('fees.update') }}" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <input type="hidden" value="{{$fee->id}}" name="fee_id">
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputEmail4"> {{trans('fees.Fee Name_ar')}}</label>
                                <input type="text" value="{{ $fee->getTranslation('title', 'ar') }}" name="title_ar" class="form-control">
                            </div>

                            <div class="form-group col">
                                <label for="inputEmail4">{{trans('fees.Fee Name_en')}}</label>
                                <input type="text" value="{{ $fee->getTranslation('title', 'en') }}" name="title_en" class="form-control">
                            </div>


                            <div class="form-group col">
                                <label for="inputEmail4">{{trans('fees.Amount')}}</label>
                                <input type="number" value="{{ $fee->amount }}" name="amount" class="form-control">
                            </div>

                        </div>


                        <div class="form-row">

                            <div class="form-group col">
                                <label for="inputState"> {{trans('fees.Grade Name')}}</label>
                                <select class="custom-select mr-sm-2" name="grade_id">
                                    <option selected disabled>{{trans('Parents.Choose')}}...</option>
                                    @foreach($grades as $grade)
                                        <option value="{{ $grade->id }}"{{$fee->grade_id == $grade->id ? 'selected' : ""}}>{{ $grade->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="inputZip"> {{trans('fees.Class Name')}}</label>
                                <select class="custom-select mr-sm-2" name="class_id">
                                    <option value="{{$fee->class_id}}">{{$fee->class->name}}</option>

                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="inputZip"> {{trans('fees.Academic Year')}}</label>
                                <select class="custom-select mr-sm-2" name="year">
                                    <option selected disabled>{{trans('Parents.Choose')}}...</option>
                                    @php
                                        $current_year = date("Y")
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                        <option value="{{ $year}}"{{$year == $fee->year ? 'selected' : ""}}>{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="inputState"> {{trans('fees.Fees Type')}}</label>
                                <select class="custom-select mr-sm-2" name="fees_type">
                                    <option selected disabled>{{trans('Parents.Choose')}}...</option>
                                        <option value="tuition fees"@if($fee->fees_type == 'tuition fees') selected @else ""@endif>{{trans('fees.Tuition Fees')}}</option>
                                        <option value="transportation fees"@if($fee->fees_type == 'transportation fees') selected @else ""@endif>{{trans('fees.Transportation Fees')}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputAddress">{{trans('fees.Description')}}</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="4">{{$fee->description}}</textarea>
                        </div>
                        <br>

                        <button type="submit" class="btn btn-primary">{{trans('fees.Submit')}}</button>

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
