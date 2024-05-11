<?php

namespace App\Repository;

use App\Http\Traits\AttachFilesTrait;
use App\Models\Grade;
use App\Models\library as ModelsLibrary;
use PharIo\Manifest\Library;

class LibraryRepository  implements LibraryRepositoryInterface
{
    use AttachFilesTrait;

    public function index()
    {
        $books = ModelsLibrary::all();
        return view('Library.index', compact('books'));
    }

    public function create()
    {
        $grades = Grade::all();
        return view('Library.create', compact('grades'));
    }

    public function store($request)
    {
        try {
            $books = new ModelsLibrary();
            $books->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
            $books->file_name =  $request->file('file_name')->getClientOriginalName();
            $books->Grade_id = $request->Grade_id;
            $books->classroom_id = $request->Classroom_id;
            $books->section_id = $request->section_id;
            $books->teacher_id = 1;
            $books->save();
            $this->uploadFile($request, 'file_name');

            toastr()->success(trans('message.success'));
            return redirect()->route('library.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $grades = Grade::all();
        $book = ModelsLibrary::findorFail($id);
        return view('Library.edit', compact('book', 'grades'));
    }

    public function update($request)
    {
        try {

            $book = ModelsLibrary::findorFail($request->id);
            $book->title = ['en' => $request->title_en, 'ar' => $request->title_ar];

            if ($request->hasfile('file_name')) {

                $this->deleteFile($book->file_name);

                $this->uploadFile($request, 'file_name');

                $file_name_new = $request->file('file_name')->getClientOriginalName();
                $book->file_name = $book->file_name !== $file_name_new ? $file_name_new : $book->file_name;
            }

            $book->Grade_id = $request->Grade_id;
            $book->classroom_id = $request->Classroom_id;
            $book->section_id = $request->section_id;
            $book->teacher_id = 1;
            $book->save();
            toastr()->success(trans('message.Update'));
            return redirect()->route('library.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        $this->deleteFile($request->file_name);
        ModelsLibrary::destroy($request->id);
        toastr()->success(trans('message.Delete'));
        return redirect()->route('library.index');
    }

    public function download($filename)
    {
        return response()->download(public_path('attachments/library/' . $filename));
    }
}
