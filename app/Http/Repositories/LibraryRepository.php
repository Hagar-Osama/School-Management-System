<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\LibraryInterface;
use App\Http\Traits\FilesTraits;
use App\Http\Traits\GradesTraits;
use App\Http\Traits\LibraryTraits;
use App\Models\Grade;
use App\Models\Library;
use Exception;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class LibraryRepository implements LibraryInterface
{
    private $libraryModel;
    private $gradesModel;
    use LibraryTraits;
    use GradesTraits;
    use FilesTraits;



    public function __construct(Library $library, Grade $grade)
    {
        $this->libraryModel = $library;
        $this->gradesModel = $grade;
    }

    public function index()
    {
        $library = $this->getAlllibraries();
        return view('Library.index', compact('library'));
    }

    public function create()
    {
        $grades = $this->getAllGrades();
        return view('Library.create', compact('grades'));
    }

    public function store($request)
    {
        // dd($request);

        try {
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = $file->hashName();
                $this->uploadFile($file, 'library', $fileName);
                $this->libraryModel::create([
                    'title' => $request->title,
                    'grade_id' => $request->grade_id,
                    'class_id' => $request->class_id,
                    'section_id' => $request->section_id,
                    'teacher_id' => 2,
                    'file_name' => $fileName
                ]);
            }
           

            toastr()->success(trans('messages.success'));
            return redirect(route('library.index'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function download($fileName)
    {
        //downloading from my local server
        return response()->download(public_path('storage/library/'. $fileName));
        //downloading from s3 bucket
    //     $headers = [
 
    //         'Content-Type'        => 'application/pdf',
 
    //         'Content-Disposition' => 'attachment; filename="'. $fileName .'"',
 
    //     ];
 
    //   return Response::make(Storage::disk('s3')->get('library/'.$fileName), 200, $headers);
    
}

    

    public function edit($library_id)
    {
        $library = $this->getLibraryById($library_id);
        $grades = $this->getAllGrades();
        return view('Library.edit', compact('library', 'grades'));
    }

    public function update($request)
    {
        try {
            $library = $this->getLibraryById($request->library_id);
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = $file->hashName();
                $this->uploadFile($file, 'library', $fileName, 'storage/library/'.$library->file_name);
                $library->update([
                    'title' => $request->title,
                    'grade_id' => $request->grade_id,
                    'class_id' => $request->class_id,
                    'section_id' => $request->section_id,
                    'teacher_id' => 2,
                    'file_name' => isset($fileName) ? $fileName : $library->file_name
                ]);
            }

            toastr()->success(trans('messages.update'));
            return redirect(route('library.index'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy($request)
    {
        $library = $this->getLibraryById($request->library_id);
        $library->delete();
        $this->deleteFile('storage/library/'.$library->file_name);
        toastr()->error(trans('messages.delete'));
        return redirect(route('library.index'));
    }
}
