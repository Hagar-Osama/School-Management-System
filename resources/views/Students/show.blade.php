@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{trans('Students.Student Information')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('students.Student Information')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}" class="default-color">{{trans('students.Home')}}</a></li>
                <li class="breadcrumb-item active">{{trans('students.Student Information')}}</li>
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
                <div class="card-body">
                    <div class="tab nav-border">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="home-02-tab" data-toggle="tab" href="#home-02" role="tab" aria-controls="home-02" aria-selected="true">{{trans('Students.Student Information')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-02-tab" data-toggle="tab" href="#profile-02" role="tab" aria-controls="profile-02" aria-selected="false">{{trans('Students.Attachments')}}</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="home-02" role="tabpanel" aria-labelledby="home-02-tab">
                                <table class="table table-striped table-hover" style="text-align:center">
                                    <tbody>
                                        <tr>
                                            <th scope="row">{{trans('Students.Student Name')}}</th>
                                            <td>{{ $student->name }}</td>
                                            <th scope="row">{{trans('Students.Email')}}</th>
                                            <td>{{$student->email}}</td>
                                            <th scope="row">{{trans('Students.Gender')}}</th>
                                            <td>{{$student->gender->name}}</td>
                                            <th scope="row">{{trans('Students.Nationality')}}</th>
                                            <td>{{$student->nationality->name}}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">{{trans('grades.Grade Name')}}</th>
                                            <td>{{ $student->grade->name }}</td>
                                            <th scope="row">{{trans('classes.Class Name')}}</th>
                                            <td>{{$student->class->name}}</td>
                                            <th scope="row">{{trans('sections.Section Name')}}</th>
                                            <td>{{$student->section->name}}</td>
                                            <th scope="row">{{trans('Students.Birth Date')}}</th>
                                            <td>{{ $student->birth_date}}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">{{trans('Students.Parents')}}</th>
                                            <td>{{ $student->parent->father_name}}</td>
                                            <th scope="row">{{trans('Students.Academic Year')}}</th>
                                            <td>{{ $student->academic_year }}</td>
                                            <th scope="row"></th>
                                            <td></td>
                                            <th scope="row"></th>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            @include('partials._errors')

                            <div class="tab-pane fade" id="profile-02" role="tabpanel" aria-labelledby="profile-02-tab">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <form method="post" action="{{route('students.updateFiles')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="academic_year">{{trans('Students.Attachments')}}
                                                        : <span class="text-danger">*</span></label>
                                                    <input type="file" accept="image/*" name="photos[]" multiple required>
                                                    <input type="hidden" name="student_name" value="{{$student->name}}">
                                                    <input type="hidden" name="student_id" value="{{$student->id}}">
                                                </div>
                                            </div>
                                            <br><br>
                                            <button type="submit" class="button button-border x-small">
                                                {{trans('Students.Submit')}}
                                            </button>
                                        </form>
                                    </div>
                                    <br>
                                    <table class="table center-aligned-table mb-0 table table-hover" style="text-align:center">
                                        <thead>
                                            <tr class="table-secondary">
                                                <th scope="col">#</th>
                                                <th scope="col">{{trans('Students.File Name')}}</th>
                                                <th scope="col">{{trans('Students.Created At')}}</th>
                                                <th scope="col">{{trans('Students.Actions')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($student->images as $attachment)
                                            <tr style='text-align:center;vertical-align:middle'>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$attachment->file_name}}</td>
                                                <td>{{$attachment->created_at->diffForHumans()}}</td>
                                                <td colspan="2">
                                                    <a class="btn btn-outline-info btn-sm" href="{{route('students.downloadAttachment',[ $attachment->imageable->name, $attachment->file_name])}}" role="button"><i class="fas fa-download"></i>&nbsp; {{trans('Students.Download')}}</a>

                                                    <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#Delete_img{{ $attachment->id }}" title="{{ trans('Students.Delete Attachments') }}">{{trans('Students.Delete Attachments')}}
                                                    </button>

                                                </td>
                                            </tr>
                                            <!-- Deleted inFormation Student -->
                                            <div class="modal fade" id="Delete_img{{$attachment->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{trans('Students.Delete Attachments')}}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('students.deleteAttachments')}}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <input type="hidden" name="file_id" value="{{$attachment->id}}">

                                                                

                                                                <p> {{ trans('students.Delete Warning') }}</p>
                                                                <input type="text" name="file_name" readonly value="{{$attachment->file_name}}" class="form-control">

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Students.Close')}}</button>
                                                                    <button class="btn btn-danger">{{trans('Students.Submit')}}</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </tbody>
                                    </table>
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