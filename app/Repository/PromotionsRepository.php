<?php

namespace App\Repository;

use App\Models\Grade;
use App\Models\promotions;
use App\Models\students;
use Exception;
use Illuminate\Support\Facades\DB;

class PromotionsRepository implements PromotionsRepositoryInterface
{
    public function indexPromotions()
    {
        $Grades = Grade::all();
        return view('Students.Promotions.index', compact('Grades'));
    }
    public function createPromotions()
    {
        $promotions = promotions::all();
        return view('Students.Promotions.managment', compact('promotions'));
    }
    public function storePromotions($request)
    {
        $students = students::where('Grade_id', $request->Grade_id)->where('Classroom_id', $request->Classroom_id)->where('section_id', $request->section_id)->where('academic_year', $request->academic_year)->get();
        if ($students->count() < 1) {
            return redirect()->back()->with('error_promotions', (trans('Students_trans.NotFound')));
        }

        DB::beginTransaction();
        try {
            foreach ($students as $student) {
                $ids = explode(',', $student->id);
                students::whereIn('id', $ids)->update([
                    'Grade_id' => $request->Grade_id_new,
                    'Classroom_id' => $request->Classroom_id_new,
                    'section_id' => $request->section_id_new,
                    'academic_year' => $request->academic_year_new,
                ]);

                promotions::updateOrCreate([
                    'student_id' => $student->id,
                    'from_grade' => $request->Grade_id,
                    'from_Classroom' => $request->Classroom_id,
                    'from_section' => $request->section_id,
                    'to_grade' => $request->Grade_id_new,
                    'to_Classroom' => $request->Classroom_id_new,
                    'to_section' => $request->section_id_new,
                    'academic_year_new' => $request->academic_year_new,
                    'academic_year' => $request->academic_year,
                ]);
            }
            DB::commit();
            toastr(trans('message.promotions'));
            return redirect()->back();
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['erorr' => $e->getMessage()]);
        }
    }
    public function destroyPromotions($request)
    {

        DB::beginTransaction();
        try {
            if ($request->page_id == 1) {
                $promotions = promotions::all();
                foreach ($promotions as $promotion) {
                    $ids = explode(',', $promotion->student_id);
                    students::whereIn('id', $ids)->update([
                        'Grade_id' => $promotion->from_grade,
                        'Classroom_id' => $promotion->from_Classroom,
                        'section_id' => $promotion->from_section,
                        'academic_year' => $promotion->academic_year,
                    ]);
                }
                promotions::truncate();
                toastr(trans('message.restore'));
                return redirect()->back();
                DB::commit();
            } else {
                $Promotion = Promotions::findorfail($request->id);
                students::where('id', $Promotion->student_id)
                    ->update([
                        'Grade_id'=>$Promotion->from_grade,
                        'Classroom_id'=>$Promotion->from_Classroom,
                        'section_id'=> $Promotion->from_section,
                        'academic_year'=>$Promotion->academic_year,
                    ]);


                Promotions::destroy($request->id);
                DB::commit();
           toastr(trans('message.restore'));
                return redirect()->back();
            }
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['erorr' => $e->getMessage()]);
        }
    }
}
