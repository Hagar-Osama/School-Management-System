@extends('layouts.master')
@section('title')
{{trans('classes.Classes')}}
@endsection
@section('css')
@toastr_css
@endsection

@section('title')
Grades
@stop
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('classes.Classes')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}" class="default-color">{{trans('classes.Home')}}</a></li>
                <li class="breadcrumb-item active">{{trans('classes.Classes List')}}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-xl-12 mb-30">
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
                <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                    {{ trans('classes.Add Class') }}
                </button>
                <br><br>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('classes.Class Name')}}</th>
                                <th>{{trans('grades.Grade Name')}}</th>
                                <th>{{trans('classes.Actions')}}</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter = 1; ?>
                            @isset($classes)
                            @foreach($classes as $class)
                            <tr>
                                <td>{{$counter++}}</td>
                                <td>{{$class->name}}</td>
                                <td>{{$class->grade->name}}</td>
                                <td> <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{ $class->id }}" title="{{ trans('classes.Edit Class') }}"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $class->id }}" title="{{ trans('classes.Delete Class') }}"><i class="fa fa-trash"></i></button>
                                </td>

                            </tr>
                            <!-- edit_modal_Grade -->
                            <div class="modal fade" id="edit{{ $class->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                                {{ trans('classes.Edit Class') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- add_form -->
                                            <form action="{{route('classes.update')}}" method="post">
                                                @method('PUT')
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="Name" class="mr-sm-2">{{ trans('classes.Class Name_ar') }}
                                                            :</label>
                                                        <input id="Name" type="text" name="name" class="form-control" value="{{$class->getTranslation('name', 'ar')}}" required>
                                                        <input id="id" type="hidden" name="class_id" class="form-control" value="{{ $class->id }}">
                                                    </div>
                                                    <div class="col">
                                                        <label for="Name_en" class="mr-sm-2">{{ trans('classes.Class Name_en') }}
                                                            :</label>
                                                        <input type="text" class="form-control" value="{{$class->getTranslation('name', 'en')}}" name="name_en">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">{{ trans('Grades.Grade Name') }}
                                                        :</label>
                                                    <select name="grade_id" hidden disabled selected value>Select an Option</select>
                                                    @foreach ($grades as $grade)
                                                    <option value="{{$grade->id}}" {{$class->grade_id == $grade->id ? 'selected' : ''}}>{{$grade->name}}</option>
                                                    @endforeach
                                                </div>
                                                <br><br>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('classes.Close') }}</button>
                                                    <button type="submit" class="btn btn-success">{{ trans('classes.Submit') }}</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- delete_modal_Grade -->
                            <div class="modal fade" id="delete{{ $class->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                                {{ trans('classes.Delete Class') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('classes.destroy')}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                {{ trans('grades.Delete Warning') }}
                                                @if(App::getLocale() == 'ar')
                                                <div class="col">
                                                    <input id="Name" type="text" name="name" class="form-control" value="{{$class->getTranslation('name', 'ar')}}" required>
                                                </div>
                                                @else
                                                <div class="col">
                                                    <input type="text" class="form-control" value="{{$class->getTranslation('name', 'en')}}" name="name_en">
                                                </div>
                                                @endif
                                                <input id="id" type="hidden" name="class_id" class="form-control" value="{{ $class->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('classes.Close') }}</button>
                                                    <button type="submit" class="btn btn-danger">{{ trans('classes.Submit') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endisset
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>{{trans('classes.Class Name')}}</th>
                                <th>{{trans('grades.Grade Name')}}</th>
                                <th>{{trans('classes.Actions')}}</th>

                            </tr>
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- add_modal_class -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ trans('classes.Add Class') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form class=" row mb-30" action="{{ route('classes.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="repeater">
                                <div data-repeater-list="class_lists">
                                    <div data-repeater-item>
                                        <div class="row">

                                            <div class="col">
                                                <label for="Name" class="mr-sm-2">{{ trans('classes.Class Name_ar') }}
                                                    :</label>
                                                <input class="form-control" type="text" name="name" />
                                            </div>


                                            <div class="col">
                                                <label for="Name" class="mr-sm-2">{{ trans('classes.Class Name_en') }}
                                                    :</label>
                                                <input class="form-control" type="text" name="name_en" />
                                            </div>


                                            <div class="col">
                                                <label for="Name_en" class="mr-sm-2">{{ trans('grades.Grade Name') }}
                                                    :</label>
                                                <div class="box">
                                                    <select class="fancyselect" name="grade_id">
                                                        <option hidden disabled selected value>--Select an Option--</option>
                                                        @foreach ($grades as $grade)
                                                        <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="col">
                                                <label for="Name_en" class="mr-sm-2">{{ trans('classes.Actions') }}
                                                    :</label>
                                                <input class="btn btn-danger btn-block" data-repeater-delete type="button" value="{{ trans('classes.Delete Row') }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-12">
                                        <input class="button" data-repeater-create type="button" value="{{ trans('classes.Data Repeater') }}" />
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('classes.Close') }}</button>
                                    <button type="submit" class="btn btn-success">{{ trans('classes.Submit') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>

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