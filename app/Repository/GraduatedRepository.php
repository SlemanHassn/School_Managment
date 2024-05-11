<?php

namespace App\Repository;

use App\Models\Grade;
use App\Models\students;

class GraduatedRepository  implements GraduatedRepositoryInterface
{
    public function indexGraduated()
    {
        $students = students::onlyTrashed()->get();
        return view('Students.Graduated.index', compact('students'));
    }
    public function createGraduated()
    {
        $Grades = Grade::all();
        return view('Students.Graduated.create', compact('Grades'));
    }
    public function SoftDeletesGraduated($request)
    {
        $students = students::where('Grade_id', $request->Grade_id)->where('Classroom_id', $request->Classroom_id)->where('section_id', $request->section_id)->where('academic_year', $request->academic_year)->get();
        if ($students->count() < 1) {
            return redirect()->back()->with('error_promotions', (trans('Students_trans.NotFound')));
        }
        foreach ($students as $student) {
            $ids = explode(',', $student->id);
            students::whereIn('id', $ids)->delete();
        }
        toastr(trans('message.success'));
        return redirect()->route('Graduates.index');
    }
    public function oneSoftDeletesGraduated($request)
    {
        $student = students::findOrFail($request->id);
        $student->delete();
        toastr(trans('message.success'));
        return redirect()->back();
    }
    public function forceDelete($request)
    {
        $student =students::withTrashed()->findOrFail($request->id);
        $student->forceDelete();
          toastr(trans('message.delete'));
        return redirect()->back();
    }
        public function reGraduated($request){

        $student =students::withTrashed()->findOrFail($request->id);
        $student->restore();
          toastr(trans('message.success'));
        return redirect()->back();
        }
}
