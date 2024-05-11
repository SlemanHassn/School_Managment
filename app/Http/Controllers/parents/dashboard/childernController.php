<?php

namespace App\Http\Controllers\parents\dashboard;

use App\Http\Controllers\Controller;
use App\Models\attendance;
use App\Models\degree;
use App\Models\fee_invoices;
use App\Models\receipt_students;
use App\Models\students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class childernController extends Controller
{
    public function index(){
        $students = students::where('parent_id',auth()->user()->id)->get();
        return view('parents.children.index',compact('students'));
    }
    public function show($id){
        $degrees = degree::where('student_id',$id)->get();
        return view('parents.degrees.index',compact('degrees'));
    }
    public function attendance(){
        $students = students::where('parent_id',auth()->user()->id)->get();
        return view('parents.Attendance.index',compact('students'));
    }
    public function attendanceSearch(Request $request)
    {
         $students = students::where('parent_id',auth()->user()->id)->get();
        $request->validate([
            'from' => 'required|date|date_format:Y-m-d',
            'to' => 'required|date|date_format:Y-m-d|after_or_equal:from'
        ], [
            'to.after_or_equal' => 'تاريخ النهاية لابد ان اكبر من تاريخ البداية او يساويه',
            'from.date_format' => 'صيغة التاريخ يجب ان تكون yyyy-mm-dd',
            'to.date_format' => 'صيغة التاريخ يجب ان تكون yyyy-mm-dd',
        ]);

        $ids = DB::table('section_teacher')->where('teachers_id', auth()->user()->id)->pluck('section_id');

        if ($request->student_id == 0) {

            $Students = Attendance::whereBetween('attendence_date', [$request->from, $request->to])->get();
            return view('pages.parents.Attendance.index', compact('Students', 'students'));
        } else {

            $Students = Attendance::whereBetween('attendence_date', [$request->from, $request->to])
                ->where('student_id', $request->student_id)->get();
            return view('parents.Attendance.index', compact('Students', 'students'));

        }

    }
    public function Fees_invoiceParent(){
        $student_id = students::where('parent_id',auth()->user()->id)->pluck('id');
        $Fee_invoices = fee_invoices::whereIn('student_id',$student_id)->get();
       return view('parents.fees.index',compact('Fee_invoices'));
    }
    public function sonsReceipt($id){
        $receipt_students = receipt_students::where('student_id',$id)->get();
       return view('parents.Receipt.index',compact('receipt_students'));
    }
}
