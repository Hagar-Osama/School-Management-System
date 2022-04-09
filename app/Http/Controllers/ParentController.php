<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\ParentsInterface;
use App\Http\Requests\AddParentRequest;
use App\Http\Requests\DeleteParentRequest;
use App\Http\Requests\UpdateParentRequest;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    private $parentInterface;

    public function __construct(ParentsInterface $parentInterface)
    {
        $this->parentInterface = $parentInterface;
    }

    public function index()
    {
        return $this->parentInterface->index();

    }

    public function store(AddParentRequest $request)
    {
        return $this->parentInterface->store($request);
    }

    public function update(UpdateParentRequest $request)
    {
        return $this->parentInterface->update($request);
    }

    public function destroy(DeleteParentRequest $request)
    {
        return $this->parentInterface->destroy($request);
    }
}
