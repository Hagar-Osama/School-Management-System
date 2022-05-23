@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{trans('library.Library')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{trans('library.Library')}}
            </h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}" class="default-color">{{trans('teachers.Home')}}</a></li>
                <li class="breadcrumb-item active">{{trans('library.Library')}}
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
                            <a href="{{route('library.create')}}" class="btn btn-success btn-sm" role="button" aria-pressed="true"> {{trans('library.Add Book')}}
                            </a>
                            <br><br>
                            @include('partials._errors')
                            @include('partials._session')
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th> {{trans('library.Book Name')}}</th>
                                            <th> {{trans('grades.Grade Name')}}</th>
                                            <th> {{trans('classes.Class Name')}}</th>
                                            <th> {{trans('sections.Section Name')}}</th>
                                            <th> {{trans('teachers.Teacher Name')}}</th>
                                            <th> {{trans('library.Actions')}}</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($library as $book)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$book->title}}</td>
                                            <td>{{$book->grades->name}}</td>
                                            <td>{{$book->classes->name}}</td>
                                            <td>{{$book->sections->name}}</td>
                                            <td>{{$book->teachers->name}}</td>
                                            <td>
                                                <a href="{{route('library.edit', $book->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                <a href="{{route('library.download',$book->file_name)}}" title = "download pdf" class="btn btn-warning btn-sm" role="button" aria-pressed="true"><i class="fas fa-download"></i></a>

                                                <form action="{{route('library.destroy')}}" method="post" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="library_id" value="{{$book->id}}">
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