@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{trans('students.Upgraded Students List')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('students.Upgraded Students List')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}" class="default-color">{{trans('students.Home')}}</a></li>
                <li class="breadcrumb-item active">{{trans('students.Upgraded Students List')}}</li>
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
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#undoUpgrade" title="{{ trans('students.Undo Upgrades') }}">{{trans('students.Undo Upgrades')}}</button>
                            <br><br>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th class="alert-info">{{trans('students.Student Name')}}</th>
                                            <th class="alert-danger">{{trans('students.Old Grades')}}</th>
                                            <th class="alert-danger">{{trans('students.Old Class Name')}}</th>
                                            <th class="alert-danger">{{trans('students.Old Section Name')}}</th>
                                            <th class="alert-success">{{trans('students.New Grades')}}</th>
                                            <th class="alert-success">{{trans('students.New Class Name')}}</th>
                                            <th class="alert-success">{{trans('students.New Section Name')}}</th>
                                            <th>{{trans('students.Actions')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($upgrades as $upgrade)
                                        <tr>

                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$upgrade->students->name}}</td>
                                            <td>{{$upgrade->fromGrade->name}}</td>
                                            <td>{{$upgrade->fromClass->name}}</td>
                                            <td>{{$upgrade->fromSection->name}}</td>
                                            <td>{{$upgrade->toGrade->name}}</td>
                                            <td>{{$upgrade->toClass->name}}</td>
                                            <td>{{$upgrade->toSection->name}}</td>

                                            <td>
                                                <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#undoOneUpgrade{{$upgrade->id}}">ارجاع الطالب</button>
                                                <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#">تخرج الطالب</button>
                                            </td>
                                        </tr>
                                        <!---undo One upgrade modal-->
                                        <div class="modal fade" id="undoOneUpgrade{{$upgrade->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form action="{{route('upgradedStudents.undoChanges')}}" method="post">
                                                    @csrf
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('students.Undo One Upgrades') }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p> {{ trans('students.Undo One Warning') }} {{$upgrade->students->name}}</p>
                                                            <input type="hidden" name="upgrade_id" value="{{$upgrade->id}}">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('students.Close') }}</button>
                                                                <button type="submit" class="btn btn-danger">{{ trans('students.Submit') }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!---undo upgrade modal-->

                                        <div class="modal fade" id="undoUpgrade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form action="{{route('upgradedStudents.undoChanges')}}" method="post">
                                                    @csrf
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('students.Undo Upgrades') }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p> {{ trans('students.Undo Warning') }}</p>
                                                            <input type="hidden" name="undo_upgrade" value="all">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('students.Close') }}</button>
                                                                <button type="submit" class="btn btn-danger">{{ trans('students.Submit') }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
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