@extends('layouts.master')
@section('css')
    @toastr_css
    @livewireStyles
    @section('title')
        إجراء اختبار
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        إجراء اختبار
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')

    @livewire('show-questions', ['onlineExamId' => $onlineExamId, 'studentId' => $studentId]) <!--This ids are rom the controller show method -->

@endsection
@section('js')
    @toastr_js
    @toastr_render
    @livewireScripts
@endsection
