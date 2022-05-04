<?php
namespace App\Http\Interfaces;

interface GraduatedStudentsInterface {

    public function index();

    public function create();

    public function graduateStudent($request);

    public function unarchiveStudent($request);

    public function destroy($request);
}
