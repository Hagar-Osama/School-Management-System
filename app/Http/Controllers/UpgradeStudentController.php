<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\UpgradeStudentsInterface;
use App\Http\Requests\AddUpgradedStudentRequest;

class UpgradeStudentController extends Controller
{
    private $upgradeStudentsInterface;

    public function __construct(UpgradeStudentsInterface $upgradeStudentsInterface)
    {
        $this->upgradeStudentsInterface = $upgradeStudentsInterface;
    }

    public function index()
    {
        return $this->upgradeStudentsInterface->index();

    }

    public function store(AddUpgradedStudentRequest $request)
    {
        return $this->upgradeStudentsInterface->store($request);
    }

    public function update( $request)
    {
        return $this->upgradeStudentsInterface->update($request);
    }

    public function destroy( $request)
    {
        return $this->upgradeStudentsInterface->destroy($request);
    }
}
