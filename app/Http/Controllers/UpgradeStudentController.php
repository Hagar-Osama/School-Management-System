<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\UpgradeStudentsInterface;
use App\Http\Requests\AddUpgradedStudentRequest;
use App\Http\Requests\DeleteUpgradedStudentRequest;
use App\Http\Requests\UndoUpgradeChangesRequest;

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

    public function create()
    {
        return $this->upgradeStudentsInterface->create();
    }

    public function undoChanges(UndoUpgradeChangesRequest $request)
    {
        return $this->upgradeStudentsInterface->undoChanges($request);
    }

    public function destroy(DeleteUpgradedStudentRequest $request)
    {
        return $this->upgradeStudentsInterface->destroy($request);
    }

}
