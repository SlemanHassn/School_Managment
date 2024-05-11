<?php

namespace App\Repository;

use App\Models\Exam;
use App\Models\Grade;
use App\Models\quizze;
use App\Models\Subject;
use App\Models\teachers;
use Exception;

class quizzRepository implements quizzRepositoryInterface
{

    public function index()
    {
        $quizzes = quizze::all();
        return view('quizze.index', compact('quizzes'));
    }

    public function create()
    {
        $subjects = Subject::all();
        $teachers = teachers::all();
        $grades = Grade::all();
        return view('quizze.create', compact('subjects', 'teachers', 'grades'));
    }

    public function store($request)
    {
        try {
            $quizzes = new quizze();
            $quizzes->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $quizzes->subject_id = $request->subject_id;
            $quizzes->grade_id = $request->Grade_id;
            $quizzes->classroom_id = $request->Classroom_id;
            $quizzes->section_id = $request->section_id;
            $quizzes->teacher_id = $request->teacher_id;
            $quizzes->save();
            toastr()->success(trans('message.success'));
            return redirect()->route('quizze.index');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $quizz = quizze::findorFail($id);
        $data['grades'] = Grade::all();
        $data['subjects'] = Subject::all();
        $data['teachers'] = teachers::all();
        return view('quizze.edit', $data, compact('quizz'));
    }

    public function update($request)
    {
        try {
            $quizz = quizze::findorFail($request->id);
            $quizz->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $quizz->subject_id = $request->subject_id;
            $quizz->grade_id = $request->Grade_id;
            $quizz->classroom_id = $request->Classroom_id;
            $quizz->section_id = $request->section_id;
            $quizz->teacher_id = $request->teacher_id;
            $quizz->save();

            toastr()->success(trans('message.Update'));
            return redirect()->route('quizze.index');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            quizze::destroy($request->id);
            toastr()->success(trans('message.Delete'));
            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
