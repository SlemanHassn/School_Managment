<?php

namespace App\Repository;

use App\Models\Fee;
use App\Models\Grade;
use Exception;

class FeeRepository  implements FeeRepositoryInterface
{
    public function index()
    {
        $fees = Fee::all();
        return view('Fees.index', compact('fees'));
    }
    public function create()
    {
        $Grades = Grade::all();
        return view('Fees.add', compact('Grades'));
    }
    public function store($request)
    {
        // $validated = $request->validated();
        try {
            $translations = ['en' => $request->title_en, 'ar' => $request->title_ar];
            $fees = new Fee();
            $fees->setTranslations('title', $translations);
            $fees->amount = $request->amount;
            $fees->Grade_id = $request->Grade_id;
            $fees->Classroom_id = $request->Classroom_id;
            $fees->year = $request->year;
            $fees->description = $request->description;
            $fees->Type_Fee = $request->Type_Fee;
            $fees->save();
            toastr(trans('message.success'));
            return redirect()->route('Fees.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['erorr' => $e->getMessage()]);
        }
    }
    public function edit($id)
    {
        $Grades = Grade::all();
        $fee = Fee::findOrFail($id);
        return view('Fees.edit', compact('fee', 'Grades'));
    }
    public function update($request)
    {
        try {
            $fee = Fee::findOrFail($request->id);
            $translations = ['en' => $request->title_en, 'ar' => $request->title_ar];
            $fee->setTranslations('title', $translations);
            $fee->amount = $request->amount;
            $fee->Grade_id = $request->Grade_id;
            $fee->Classroom_id = $request->Classroom_id;
            $fee->year = $request->year;
            $fee->description = $request->description;
            $fee->Type_Fee = $request->Type_Fee;
            $fee->update();
            toastr(trans('message.success'));
            return redirect()->route('Fees.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['erorr' => $e->getMessage()]);
        }
    }
    public function destroy($request)
    {
        try {
            $fee = Fee::findOrFail($request->id);
            $fee->delete();
            toastr(trans('message.delete'));
            return redirect()->route('Fees.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['erorr' => $e->getMessage()]);
        }
    }
}
