<?php
namespace App\Http\Traits;

trait LibraryTraits {
    public function getAlllibraries()
    {
        return $this->libraryModel::get();
    }

    public function getLibraryById($libraryId)
    {
        return $this->libraryModel::findOrFail($libraryId);
    }

}
