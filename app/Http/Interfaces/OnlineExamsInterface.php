<?php
namespace App\Http\Interfaces;

interface OnlineExamsInterface {

    public function index();

    public function create();

    public function store($request);

    public function edit($onlineExamId);

    public function update($request);

    public function destroy($request);


}
