<?php
namespace App\Http\Interfaces;

interface SectionsInterface {

    public function index();

    public function getClasses($gradeId);

    public function store($request);

    public function update($request);

    public function destroy($request);


}
