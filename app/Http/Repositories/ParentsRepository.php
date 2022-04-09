<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\ParentsInterface;
use App\Http\Traits\ParentsTraits;
use App\Models\myParent;
use Exception;

class ParentsRepository implements ParentsInterface
{
    private $parentModel;

    use ParentsTraits;

    public function __construct(myParent $parents)
    {
        $this->parentModel = $parents;
    }

    public function index()
    {
        $parents = $this->getAllParents();

        return view('Parents.parents', compact('parents'));
    }

    public function store($request)
    {
        try {


            toastr()->success(trans('messages.success'));
            return redirect(route('parents.index'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        try {


            toastr()->success(trans('messages.update'));
            return redirect(route('parents.index'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {

        toastr()->error(trans('messages.delete'));
        return redirect(route('classes.index'));
    }

    


}
