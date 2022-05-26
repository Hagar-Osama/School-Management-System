@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{trans('meetings.Online Classes')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{trans('meetings.Online Classes')}}
            </h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="default-color">{{trans('teachers.Home')}}</a></li>
                <li class="breadcrumb-item active">{{trans('meetings.Online Classes')}}
                </li>
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
                            <a href="{{route('onlineMeetings.create')}}" class="btn btn-success btn-sm" role="button" aria-pressed="true"> {{trans('meetings.Add Online Class')}}
                            </a>
                            <a href="{{route('multipleMeetings.makeMeeting')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="true"> {{trans('meetings.Add Multiple Online Class')}}
                            </a><br><br>
                            @include('partials._errors')
                            @include('partials._session')
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th> {{trans('meetings.Topic')}}</th>
                                            <th> {{trans('meetings.Starting At')}}</th>
                                            <th> {{trans('meetings.Duration')}}</th>
                                            <th> {{trans('grades.Grade Name')}}</th>
                                            <th> {{trans('classes.Class Name')}}</th>
                                            <th> {{trans('sections.Section Name')}}</th>
                                            <th> {{trans('teachers.Teacher Name')}}</th>
                                            <th> {{trans('meetings.Join Url')}}</th>
                                            <th>{{trans('onlineExams.Actions')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($meetings as $meeting)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$meeting->topic}}</td>
                                            <td>{{$meeting->start_at}}</td>
                                            <td>{{$meeting->duration}}</td>
                                            <td>{{$meeting->grades->name}}</td>
                                            <td>{{$meeting->classes->name}}</td>
                                            <td>{{$meeting->sections->name}}</td>
                                            <td>{{$meeting->users->name}}</td>
                                            <td class="text-danger"><a href="{{$meeting->join_url}}" target="_blank">{{trans('meetings.Join Url')}}</a></td>
                                            <td>
                                                <form action="{{route('onlineMeetings.destroy')}}" method="post" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="id" value="{{$meeting->id}}">
                                                    <input type="hidden" name="meeting_id" value="{{$meeting->meeting_id}}">
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