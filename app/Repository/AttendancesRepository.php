<?php

namespace App\Repository;

use App\Models\attendance;
use App\Models\Grade;
use App\Models\students;
use App\Models\teachers;

class AttendancesRepository  implements AttendancesRepositoryInterface
{
    public function index()
    {
        $teachers = teachers::all();
        $Grades = Grade::with(['Sections'])->get();
        $List_grades  = Grade::all();

        return view('Attendance.Sections', compact('Grades', 'List_grades', 'teachers'));
    }
    public function show($id)
    {
        $students = students::where('section_id', $id)->get();
        return view('Attendance.index', compact('students'));
    }
    public function store($request)
    {
        if (!empty($request->attendences)) {
            foreach ($request->attendences as $studentid => $attendence) {

                if ($attendence == 'presence') {
                    $attendence_status = 1;
                } else if ($attendence == 'absent') {
                    $attendence_status = 0;
                }

                 attendance::updateOrCreate(
                    ['student_id'  => $studentid],
                    [
                    'student_id' => $studentid,
                    'grade_id' => $request->grade_id,
                    'classroom_id' => $request->classroom_id,
                    'section_id' => $request->section_id,
                    'teacher_id' => 1,
                    'attendence_date' => date('Y-m-d'),
                    'attendence_status' => $attendence_status
                ]);
            }
        }

        toastr()->success(trans('message.success'));
        return redirect()->back();
    }

}
