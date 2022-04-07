<?php
namespace App\Http\Interfaces;

interface ClassesInterface {

    public function index();

    public function store($request);

    public function update($request);

    public function destroy($request);

    public function deleteAll($request);

    public function filterClasses($request);
}
