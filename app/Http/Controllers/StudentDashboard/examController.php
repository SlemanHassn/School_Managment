<?php

namespace App\Http\Controllers\StudentDashboard;

use App\Http\Controllers\Controller;
use App\Models\quizze;
use Illuminate\Http\Request;

class examController extends Controller
{
   public function index(){
    $quizzes = quizze::where('grade_id',auth()->user()->Grade_id)
    ->where('classroom_id',auth()->user()->Classroom_id)
    ->where('section_id',auth()->user()->section_id)
    ->orderBy('id', 'DESC')->get();
    return view('Students.dashboard.exam.exam',compact('quizzes'));
   }
   public function show($quizze_id){
    $student_id=auth()->user()->id;
     return view('Students.dashboard.exam.show',compact('quizze_id','student_id'));
   }
}
