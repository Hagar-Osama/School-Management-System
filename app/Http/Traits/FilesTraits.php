<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait FilesTraits
{

    public function uploadFile($file, $path, $fileName,  $oldFile = null)
    {
        $file->storeAs($path, $fileName, 'public');
        // $file->move(public_path('students/'.$path), $fileName);

        if (isset($oldFile)) {

            Storage::delete('public/', $oldFile);
        }
        // $path = $file->storePublicly($path, 's3');
        // Storage::disk('s3')->url($path);
        // $fileData = explode('/', $path);
        // $fileName = end($fileData);


        // if(!is_null($oldFile))
        // {
        //     if(Storage::disk('s3')->exists($path . '/' . $oldFile))
        //     {
        //         Storage::disk('s3')->delete($path . '/' . $oldFile);
        //     }
        // }
        // return $fileName;
    }

    public function deleteFile($path)
    {
        Storage::delete($path);
    }
}
