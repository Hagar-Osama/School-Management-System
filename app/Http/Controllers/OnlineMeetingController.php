<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\OnlineMeetingsInterface;
use App\Http\Requests\AddMeetingRequest;
use App\Http\Requests\DeleteMeetingRequest;
use App\Http\Requests\UpdateMeetingRequest;
use Illuminate\Http\Request;

class OnlineMeetingController extends Controller
{
    private $onlineMeetingInterface;

    public function __construct(OnlineMeetingsInterface $onlineMeetingInterface)
    {
        $this->onlineMeetingInterface = $onlineMeetingInterface;
    }

    public function index()
    {
        return $this->onlineMeetingInterface->index();

    }

    public function create()
    {
        return $this->onlineMeetingInterface->create();

    }

    public function store(AddMeetingRequest $request)
    {
        return $this->onlineMeetingInterface->store($request);
    }

    public function destroy(DeleteMeetingRequest $request)
    {
        return $this->onlineMeetingInterface->destroy($request);
    }
}
