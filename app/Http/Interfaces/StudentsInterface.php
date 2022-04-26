<?php
namespace App\Http\Interfaces;

interface StudentsInterface {

    public function index();

    public function getClasses($gradeId);

    public function getSections($classId);

    public function create();

    public function store($request);

    public function show($student_id);

    public function updateFiles($request);

    public function downloadAttachments($studentName, $fileName);

    public function deleteAttachments($request);

    public function edit($id);

    public function update($request);

    public function destroy($request);
}
