<?php
namespace App\Http\Interfaces;

interface FeesInterface {

    public function index();

    public function create();

    public function store($request);

    public function edit($id);

    public function update($request);

    public function show($id);

    public function destroy($request);


}
