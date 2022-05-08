<?php
namespace App\Http\Interfaces;

interface FeesInvoicesInterface {

    public function index();

    // public function getAmount($feeId);

    public function create($student_id);

    public function store($request);



}
