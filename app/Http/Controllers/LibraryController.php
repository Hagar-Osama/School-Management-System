<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\LibraryInterface;
use App\Http\Requests\AddLibraryRequest;
use App\Http\Requests\DeleteLibraryRequest;
use App\Http\Requests\UpdateLibraryRequest;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    private $libraryInterface;

    public function __construct(LibraryInterface $libraryInterface)
    {
        $this->libraryInterface = $libraryInterface;
    }

    public function index()
    {
        return $this->libraryInterface->index();

    }

    public function create()
    {
        return $this->libraryInterface->create();

    }

    public function store(AddLibraryRequest $request)
    {
        return $this->libraryInterface->store($request);
    }

    public function download($fileName)
    {
        return $this->libraryInterface->download($fileName);

    }

    public function edit($id)
    {
        return $this->libraryInterface->edit($id);

    }

    public function update(UpdateLibraryRequest $request)
    {
        return $this->libraryInterface->update($request);
    }

    public function destroy(DeleteLibraryRequest $request)
    {
        return $this->libraryInterface->destroy($request);
    }
}
