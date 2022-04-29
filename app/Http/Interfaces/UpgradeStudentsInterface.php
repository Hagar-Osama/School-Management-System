<?php
namespace App\Http\Interfaces;

interface UpgradeStudentsInterface {

    public function index();

    public function store($request);

    public function create();

    public function undoChanges($request);

    // public function destroy($request);
}
