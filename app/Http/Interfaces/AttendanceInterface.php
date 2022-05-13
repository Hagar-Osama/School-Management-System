<?php
namespace App\Http\Interfaces;

interface AttendanceInterface {

    public function index();

    public function create($sectionId);

    public function store($request);




}
