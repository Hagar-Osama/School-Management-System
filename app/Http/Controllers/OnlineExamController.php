<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\OnlineExamsInterface;
use App\Http\Requests\AddOnlineExamRequest;
use App\Http\Requests\DeleteOnlineExamRequest;
use App\Http\Requests\UpdateOnlineExamRequest;
use Illuminate\Http\Request;

class OnlineExamController extends Controller
{
    private $onlineExamInterface;

    public function __construct(OnlineExamsInterface $onlineExamInterface)
    {
        $this->onlineExamInterface = $onlineExamInterface;
    }

    public function index()
    {
        return $this->onlineExamInterface->index();

    }

    public function create()
    {
        return $this->onlineExamInterface->create();

    }

    public function store(AddOnlineExamRequest $request)
    {
        return $this->onlineExamInterface->store($request);
    }

    public function edit($onlineExamId)
    {
        return $this->onlineExamInterface->edit($onlineExamId);

    }

    public function update(UpdateOnlineExamRequest $request)
    {
        return $this->onlineExamInterface->update($request);
    }

    public function destroy(DeleteOnlineExamRequest $request)
    {
        return $this->onlineExamInterface->destroy($request);
    }
}
