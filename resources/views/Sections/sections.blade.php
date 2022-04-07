@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{ trans('Sections.Sections') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('sections.Sections')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}" class="default-color">{{trans('sections.Home')}}</a></li>
                <li class="breadcrumb-item active">{{trans('sections.Sections List')}}</li>
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
                <a class="button x-small" href="#" data-toggle="modal" data-target="#exampleModal">
                    {{ trans('Sections.Add Section') }}</a>
            </div>

            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="accordion gray plus-icon round">

                        @foreach ($gradeSections as $gradeSection)

                        <div class="acd-group">
                            <a href="#" class="acd-heading">{{ $gradeSection->name }}</a>
                            <div class="acd-des">

                                <div class="row">
                                    <div class="col-xl-12 mb-30">
                                        <div class="card card-statistics h-100">
                                            <div class="card-body">
                                                <div class="d-block d-md-flex justify-content-between">
                                                    <div class="d-block">
                                                    </div>
                                                </div>
                                                <div class="table-responsive mt-15">
                                                    <table class="table center-aligned-table mb-0">
                                                        <thead>
                                                            <tr class="text-dark">
                                                                <th>#</th>
                                                                <th>{{ trans('Sections.Section Name') }}
                                                                </th>
                                                                <th>{{ trans('classes.Class Name') }}</th>
                                                                <th>{{ trans('Sections.Section Status') }}</th>
                                                                <th>{{ trans('Sections.Actions') }}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i = 0; ?>
                                                            @foreach ($gradeSection->sections as $section)
                                                            <tr>
                                                                <?php $i++; ?>
                                                                <td>{{ $i }}</td>
                                                                <td>{{ $section->name }}</td>
                                                                <td>{{ $section->classs->name }}
                                                                </td>
                                                                <td>
                                                                    @if ($section->status === 1)
                                                                    <label class="badge badge-success">{{ trans('Sections_trans.Status_Section_AC') }}</label>
                                                                    @else
                                                                    <label class="badge badge-danger">{{ trans('Sections_trans.Status_Section_No') }}</label>
                                                                    @endif

                                                                </td>
                                                                <td>

                                                                    <a href="#" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#edit{{ $section->id }}">{{ trans('Sections.Edit Section') }}</a>
                                                                    <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#delete{{ $section->id }}">{{ trans('Sections.Delete Section') }}</a>
                                                                </td>
                                                            </tr>


                                                            <!--تعديل قسم جديد -->
                                                            <div class="modal fade" id="edit{{ $section->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">
                                                                                {{ trans('Sections.Edit Section') }}
                                                                            </h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">

                                                                            <form action="" method="POST">
                                                                                {{ method_field('patch') }}
                                                                                {{ csrf_field() }}
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <input type="text" name="Name_Section_Ar" class="form-control" value="{{ $section->getTranslation('name', 'ar') }}">
                                                                                    </div>

                                                                                    <div class="col">
                                                                                        <input type="text" name="Name_Section_En" class="form-control" value="{{ $section->getTranslation('name', 'en') }}">
                                                                                        <input id="id" type="hidden" name="section_id" class="form-control" value="{{ $section->id }}">
                                                                                    </div>

                                                                                </div>
                                                                                <br>


                                                                                <div class="col">
                                                                                    <label for="inputName" class="control-label">{{ trans('grades.Grade Name') }}</label>
                                                                                    <select name="Grade_id" class="custom-select" onclick="console.log($(this).val())">
                                                                                        <!--placeholder-->
                                                                                        <option value="{{ $grade->id }}">
                                                                                            {{ $Grade->name }}
                                                                                        </option>
                                                                                        @foreach ($grades as $grade)
                                                                                        <option value="{{ $grades->id }}">
                                                                                            {{ $grade->name }}
                                                                                        </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                                <br>

                                                                                <div class="col">
                                                                                    <label for="inputName" class="control-label">{{ trans('classes.Class Name') }}</label>
                                                                                    <select name="Class_id" class="custom-select">
                                                                                        <option value="{{ $section->classs->id }}">
                                                                                            {{ $list_Sections->My_classs->Name_Class }}
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <br>

                                                                                <div class="col">
                                                                                    <div class="form-check">

                                                                                        @if ($section->status === 1)
                                                                                        <input type="checkbox" checked class="form-check-input" name="status" id="exampleCheck1">
                                                                                        @else
                                                                                        <input type="checkbox" class="form-check-input" name="status" id="exampleCheck1">
                                                                                        @endif
                                                                                        <label class="form-check-label" for="exampleCheck1">{{ trans('Sections.Section Status') }}</label><br>

                                                                                        <div class="col">
                                                                                            <label for="inputName" class="control-label">{{ trans('Sections_trans.Name_Teacher') }}</label>
                                                                                            <select multiple name="teacher_id[]" class="form-control" id="exampleFormControlSelect2">
                                                                                                @foreach($list_Sections->teachers as $teacher)
                                                                                                <option selected value="{{$teacher['id']}}">{{$teacher['Name']}}</option>
                                                                                                @endforeach

                                                                                                @foreach($teachers as $teacher)
                                                                                                <option value="{{$teacher->id}}">{{$teacher->Name}}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>


                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('Sections.Close') }}</button>
                                                                            <button type="submit" class="btn btn-danger">{{ trans('Sections.submit') }}</button>
                                                                        </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <!-- delete_modal_Grade -->
                                                            <div class="modal fade" id="delete{{ $section->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                                                                {{ trans('Sections.Delete Section') }}
                                                                            </h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="" method="post">
                                                                                {{ method_field('Delete') }}
                                                                                @csrf
                                                                                {{ trans('Sections.Delete Warning') }}
                                                                                <input id="id" type="hidden" name="section_id" class="form-control" value="{{ $section->id }}">
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('Sections.Close') }}</button>
                                                                                    <button type="submit" class="btn btn-danger">{{ trans('Sections.submit') }}</button>
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
                            @endforeach
                        </div>
                    </div>
                </div>

                <!--اضافة قسم جديد -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">
                                    {{ trans('Sections.Add Section') }}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form action="" method="POST">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" name="Name_Section_Ar" class="form-control" placeholder="{{ trans('Sections.Section Name_ar') }}">
                                        </div>

                                        <div class="col">
                                            <input type="text" name="Name_Section_En" class="form-control" placeholder="{{ trans('Sections.Section Name_en') }}">
                                        </div>

                                    </div>
                                    <br>


                                    <div class="col">
                                        <label for="inputName" class="control-label">{{ trans('grades.Grade Name') }}</label>
                                        <select name="Grade_id" class="custom-select" onchange="console.log($(this).val())">
                                            <!--placeholder-->
                                            <option value="" selected disabled>{{ trans('Sections.Select Grade') }}
                                            </option>
                                            @foreach ($grades as $grade)
                                            <option value="{{ $grade->id }}"> {{ $grade->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <br>

                                    <div class="col">
                                        <label for="inputName" class="control-label">{{ trans('classes.Class Name') }}</label>
                                        <select name="Class_id" class="custom-select">

                                        </select>
                                    </div><br>




                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('Sections.Close') }}</button>
                                <button type="submit" class="btn btn-danger">{{ trans('Sections.Submit') }}</button>
                            </div>
                            </form>
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
