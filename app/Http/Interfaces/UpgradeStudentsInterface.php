<?php
namespace App\Http\Interfaces;

interface UpgradeStudentsInterface {

    public function index();

    public function store($request);

    public function update($request);

    public function destroy($request);
}
