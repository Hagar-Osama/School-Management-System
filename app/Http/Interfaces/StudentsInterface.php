<?php
namespace App\Http\Interfaces;

interface StudentsInterface {

    public function index();

    public function getClasses($gradeId);

    public function getSections($classId);

    public function create();

    public function store($request);

    public function edit($id);

    public function update($request);

    public function destroy($request);
}
