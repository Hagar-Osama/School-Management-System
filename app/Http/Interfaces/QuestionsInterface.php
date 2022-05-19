<?php
namespace App\Http\Interfaces;

interface QuestionsInterface {

    public function index();

    public function create();

    public function store($request);

    public function edit($questionId);

    public function update($request);

    public function destroy($request);


}
