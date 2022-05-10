<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\FeesInterface;
use App\Http\Requests\AddFeesRequest;
use App\Http\Requests\DeleteFeesRequest;
use App\Http\Requests\UpdateFeesRequest;

class FeeController extends Controller
{
    private $feesInterface;

    public function __construct(FeesInterface $feesInterface)
    {
        $this->feesInterface = $feesInterface;
    }

    public function index()
    {
        return $this->feesInterface->index();

    }

    public function create()
    {
        return $this->feesInterface->create();

    }

    public function store(AddFeesRequest $request)
    {
        return $this->feesInterface->store($request);
    }

    public function edit($id)
    {
        return $this->feesInterface->edit($id);

    }

    public function update(UpdateFeesRequest $request)
    {
        return $this->feesInterface->update($request);
    }

    public function destroy(DeleteFeesRequest $request)
    {
        return $this->feesInterface->destroy($request);
    }
}
