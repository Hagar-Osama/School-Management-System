<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\InfoInterface;
use App\Http\Requests\UpdateInfoRequest;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    private $infoInterface;

    public function __construct(InfoInterface $infoInterface)
    {
        $this->infoInterface = $infoInterface;
    }

    public function index()
    {
        return $this->infoInterface->index();

    }

    public function update(UpdateInfoRequest $request)
    {
        return $this->infoInterface->update($request);

    }
}
