<?php
namespace App\Http\Interfaces;

interface OnlineMeetingsInterface {

    public function index();

    public function create();

    public function store($request);

    public function destroy($request);


}
