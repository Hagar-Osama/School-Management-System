@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{trans('students.Upgraded Students')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('students.Upgraded Students')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}" class="default-color">{{trans('students.Home')}}</a></li>
                <li class="breadcrumb-item active">{{trans('students.Upgraded Students')}}</li>
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

                @if (Session::has('error_promotions'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{Session::get('error_promotions')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @include('partials._errors')

                <h6 style="color: red;font-family: Cairo">{{trans('students.Old Grades')}}</h6><br>

                <form method="post" action="{{ route('upgradedStudents.store') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputState">{{trans('grades.Grade Name')}}</label>
                            <select class="custom-select mr-sm-2" name="grade_id" required>
                                <option selected disabled>{{trans('Parents.Choose')}}...</option>
                                @foreach($grades as $grade)
                                <option value="{{$grade->id}}">{{$grade->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="class_id">{{trans('classes.Class Name')}} : <span class="text-danger">*</span></label>
                            <select class="custom-select mr-sm-2" name="class_id" required>

                            </select>
                        </div>

                        <div class="form-group col">
                            <label for="section_id">{{trans('sections.Section Name')}} : </label>
                            <select class="custom-select mr-sm-2" name="section_id" required>

                            </select>
                        </div>
                    </div>
                    <br>
                    <h6 style="color: red;font-family: Cairo">{{trans('students.New Grades')}}</h6><br>

                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputState">{{trans('grades.Grade Name')}}</label>
                            <select class="custom-select mr-sm-2" name="new_grade_id">
                                <option selected disabled>{{trans('Parents.Choose')}}...</option>
                                @foreach($grades as $grade)
                                <option value="{{$grade->id}}">{{$grade->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="Classroom_id">{{trans('classes.Class Name')}}: <span class="text-danger">*</span></label>
                            <select class="custom-select mr-sm-2" name="new_class_id">

                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="section_id">:{{trans('sections.Section Name')}} </label>
                            <select class="custom-select mr-sm-2" name="new_section_id">

                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">{{trans('students.Submit')}}</button>
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

<script>
    $(document).ready(function() {
        $('select[name="new_grade_id"]').on('change', function() {
            var Grade_id = $(this).val();
            if (Grade_id) {
                $.ajax({
                    url: "{{ URL::to('students/classes') }}/" + Grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="new_class_id"]').empty();
                        $('select[name="new_class_id"]').append('<option selected disabled >{{trans('parents.Choose')}}...</option>');
                        $.each(data, function(key, value) {
                            $('select[name="new_class_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('select[name="new_class_id"]').on('change', function() {
            var class_id = $(this).val();
            if (class_id) {
                $.ajax({
                    url: "{{ URL::to('students/sections') }}/" + class_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="new_section_id"]').empty();
                        $('select[name="new_section_id"]').append('<option selected disabled >{{trans('parents.Choose')}}...</option>');
                        $.each(data, function(key, value) {
                            $('select[name="new_section_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
@endsection