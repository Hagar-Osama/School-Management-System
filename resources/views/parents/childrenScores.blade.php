@extends('layouts.master')
@section('css')
    @section('title')
        قائمة نتائج الاختبارات
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        قائمة نتائج الاختبارات
    @stop
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
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>اسم الطالب</th>
                                            <th>اسم الاختبار</th>
                                            <th>الدرجة</th>
                                            <th>تاريخ اجراء الاختبار</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($scores as $score)
                                            <tr>
                                            <td>{{ $loop->iteration}}</td>
                                            <td>{{$score->students->name}}</td>
                                            <td>{{$score->onlineExams->name}}</td>
                                            <td>{{$score->score}}</td>
                                            <td>{{$score->date}}</td>

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

@endsection
