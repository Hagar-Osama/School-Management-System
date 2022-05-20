<?php
namespace App\Http\Interfaces;

interface OnlineMeetingsInterface {

    public function index();

    public function create();

    public function makeMeeting();

    public function store($request);

    public function storeMeeting($request);

    public function destroy($request);


}
