@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{trans('fees.Add Invoice')}} {{$student->name}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('fees.Add Invoice')}} {{$student->name}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}" class="default-color">{{trans('classes.Home')}}</a></li>
                <li class="breadcrumb-item active">{{trans('fees.Add Invoice')}}</li>
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

                <form class=" row mb-30" action="{{ route('feesInvoices.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="repeater">
                            <div data-repeater-list="fees_list">
                                <div data-repeater-item>
                                    <div class="row">

                                        <div class="col">
                                            <label for="Name" class="mr-sm-2"> {{trans('students.Student Name')}}</label>
                                            <select class="fancyselect" name="student_id" required>
                                                <option value="{{ $student->id }}">{{ $student->name }}</option>
                                            </select>
                                        </div>

                                        <div class="col">
                                            <label for="Name_en" class="mr-sm-2"> {{trans('fees.Fees Name')}}</label>
                                            <div class="box">
                                                <select class="fancyselect" name="fee_id" required>
                                                    <option value="">--{{trans('parents.Choose')}}--</option>
                                                    @foreach($fees as $fee)
                                                    <option value="{{ $fee->id }}">{{ $fee->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col">
                                            <label for="Name_en" class="mr-sm-2">{{trans('fees.Amount')}}</label>
                                            <div class="box">
                                                <select class="fancyselect" name="amount" required>
                                                    <option value="">--{{trans('parents.Choose')}}--</option>
                                                    @foreach($fees as $fee)
                                                    <option value="{{ $fee->amount }}">{{ $fee->amount }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <label for="description" class="mr-sm-2">{{trans('fees.Description')}}</label>
                                            <div class="box">
                                                <input type="text" class="form-control" name="description" required>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <label for="Name_en" class="mr-sm-2">{{ trans('classes.Actions') }}:</label>
                                            <input class="btn btn-danger btn-block" data-repeater-delete type="button" value="{{ trans('classes.Delete Row') }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-20">
                                <div class="col-12">
                                    <input class="button" data-repeater-create type="button" value="{{ trans('classes.Data Repeater') }}" />
                                </div>
                            </div><br>
                            <input type="hidden" name="grade_id" value="{{$student->grade_id}}">
                            <input type="hidden" name="class_id" value="{{$student->class_id}}">

                            <button type="submit" class="btn btn-primary">{{trans('fees.Submit')}}</button>
                        </div>
                    </div>
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
        $('select[name="fee_id"]').on('change', function() {
            var fee_id = $(this).val();
            if (fee_id) {
                $.ajax({
                    url: "{{ URL::to('feesInvoices') }}/" + fee_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="amount"]').empty();
                        $('select[name="amount"]').append('<option selected disabled >{{trans('
                            parents.Choose ')}}...</option>');
                        $.each(data, function(key, value) {
                            $('select[name="amount"]').append('<option value="' + key + '">' + value + '</option>');
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
