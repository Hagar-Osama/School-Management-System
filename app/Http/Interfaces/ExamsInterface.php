<?php
namespace App\Http\Interfaces;

interface ExamsInterface {

    public function index();

    public function create();

    public function store($request);

    public function edit($examId);

    public function update($request);

    public function destroy($request);


}
