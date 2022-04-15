@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{trans('teachers.Teachers List')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('teachers.Teachers')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}" class="default-color">{{trans('teachers.Home')}}</a></li>
                <li class="breadcrumb-item active">{{trans('teachers.Teachers List')}}</li>
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
                            <a href="{{route('teachers.create')}}" class="btn btn-success btn-sm" role="button" aria-pressed="true">{{ trans('Teachers.Add Teacher') }}</a><br><br>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('Teachers.Teacher Name')}}</th>
                                            <th>{{trans('Teachers.Gender')}}</th>
                                            <th>{{trans('Teachers.Hiring Date')}}</th>
                                            <th>{{trans('Teachers.Specialization')}}</th>
                                            <th>{{trans('teachers.Actions')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                        @foreach($teachers as $teacher)
                                        <tr>
                                            <?php $i++; ?>
                                            <td>{{ $i }}</td>
                                            <td>{{$teacher->name}}</td>
                                            <td>{{$teacher->gender->name}}</td>
                                            <td>{{$teacher->hiring_date}}</td>
                                            <td>{{$teacher->specialization->name}}</td>
                                            <td>
                                                <a href="{{route('teachers.edit',[$teacher->id])}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_Teacher{{ $teacher->id }}" title="{{ trans('teachers.Delete Teacher') }}"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="delete_Teacher{{$teacher->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form action="{{route('teachers.destroy','test')}}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('Teachers.Delete Teacher') }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p> {{ trans('teachers.Delete Warning') }}</p>
                                                            <input type="hidden" name="teacher_id" value="{{$teacher->id}}">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('teachers.Close') }}</button>
                                                                <button type="submit" class="btn btn-danger">{{ trans('teachers.Submit') }}</button>
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
