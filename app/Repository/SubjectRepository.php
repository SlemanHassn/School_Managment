<?php

namespace App\Repository;

use App\Models\Grade;
use App\Models\Subject;
use App\Models\teachers;

class SubjectRepository implements SubjectRepositoryInterface
{

    public function index()
    {
        $subjects = Subject::get();
        return view('Subjects.index', compact('subjects'));
    }
    public function create()
    {
        $grades = Grade::get();
        $teachers = teachers::get();
        return view('Subjects.create', compact('grades', 'teachers'));
    }
    public function store($request)
    {
        try {
            $subjects = new Subject();
            $subjects->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $subjects->grade_id = $request->Grade_id;
            $subjects->classroom_id = $request->Class_id;
            $subjects->teacher_id = $request->teacher_id;
            $subjects->save();
            toastr()->success(trans('message.success'));
            return redirect()->route('subjects.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function edit($id)
    {

        $subject = Subject::findorfail($id);
        $grades = Grade::get();
        $teachers = teachers::get();
        return view('Subjects.edit', compact('subject', 'grades', 'teachers'));
    }
    public function update($request)
    {
        try {
            $subjects =  Subject::findorfail($request->id);
            $subjects->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $subjects->grade_id = $request->Grade_id;
            $subjects->classroom_id = $request->Class_id;
            $subjects->teacher_id = $request->teacher_id;
            $subjects->save();
            toastr()->success(trans('message.Update'));
            return redirect()->route('subjects.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function destroy($request)
    {
        try {
            Subject::destroy($request->id);
            toastr()->success(trans('message.delete'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
