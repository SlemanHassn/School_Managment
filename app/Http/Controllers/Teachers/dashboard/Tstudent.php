<?php
namespace App\Http\Controllers\Teachers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\attendance;
use App\Models\Section;
use App\Models\students;
use App\Models\teachers;
use Illuminate\Http\Request;

class Tstudent extends Controller
{
    public function index()
    {

        $id = teachers::findOrFail(auth()->user()->id)->Sections()->pluck('section_id');
        $data['students'] = students::whereIn('section_id', $id)->get();
        return view('Teachers.dashborad.student', $data);
    }
    public function sections()
    {
        $ids = teachers::findOrFail(auth()->user()->id)->Sections()->pluck('section_id');

        $sections = Section::whereIn('id', $ids)->get();
        return view('Teachers.dashborad.Section', compact('sections'));
    }
    public function attendance(Request $request)
    {
        if (!empty($request->attendences)) {
            foreach ($request->attendences as $studentid => $attendence) {

                if ($attendence == 'presence') {
                    $attendence_status = 1;
                } else if ($attendence == 'absent') {
                    $attendence_status = 0;
                }

                attendance::updateOrCreate(
                    [
                        'student_id'  => $studentid,
                        'attendence_date'  => date('Y-m-d')
                    ],
                    [
                        'student_id' => $studentid,
                        'grade_id' => $request->grade_id,
                        'classroom_id' => $request->classroom_id,
                        'section_id' => $request->section_id,
                        'teacher_id' => 1,
                        'attendence_date' => date('Y-m-d'),
                        'attendence_status' => $attendence_status
                    ]
                );
            }
        }

        toastr()->success(trans('message.success'));
        return redirect()->back();
    }
    public function attendanceReport()
    {
        $students = students::all();
        return view('Teachers.dashborad.attendance_report', compact('students'));
    }
    public function attendanceSearch(Request $request)
    {
        $request->validate([
            'from'  => 'required|date|date_format:Y-m-d',
            'to' => 'required|date|date_format:Y-m-d|after_or_equal:from'
        ], [
            'to.after_or_equal' => 'تاريخ النهاية لابد ان اكبر من تاريخ البداية او يساويه',
            'from.date_format' => 'صيغة التاريخ يجب ان تكون yyyy-mm-dd',
            'to.date_format' => 'صيغة التاريخ يجب ان تكون yyyy-mm-dd',
        ]);

        $id = teachers::findOrFail(auth()->user()->id)->Sections()->pluck('section_id');
        $students = students::whereIn('section_id', $id)->get();
        if ($request->student_id == 0) {
            $Students = attendance::whereBetween('attendence_date', [$request->from, $request->to])->get();
            return view('Teachers.dashborad.attendance_report', compact('Students', 'students'));
        } else {

            $Students = attendance::where('student_id', $request->student_id)->whereBetween('attendence_date', [$request->from, $request->to])->get();
            return view('Teachers.dashborad.attendance_report', compact('Students', 'students'));
        }
    }
}
