<?php

namespace App\Repository;

use App\Models\ProcessingFee;
use App\Models\student_accounts;
use App\Models\students;
use Exception;
use Illuminate\Support\Facades\DB;

class ProcessingFeeRepository  implements ProcessingFeeRepositoryInterface
{
    public function index()
    {
        $ProcessingFees = ProcessingFee::all();
        return view('ProcessingFee.index', compact('ProcessingFees'));
    }

    public function show($id)
    {
        $student = students::findOrFail($id);
        return view('ProcessingFee.add', compact('student'));
    }

    public function edit($id)
    {
        $ProcessingFee = ProcessingFee::findOrFail($id);
        return view('ProcessingFee.edit', compact('ProcessingFee'));
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {

            $ProcessingFee = new ProcessingFee();
            $ProcessingFee->date = date('Y-m-d');
            $ProcessingFee->student_id = $request->student_id;
            $ProcessingFee->amount = $request->Debit;
            $ProcessingFee->description = $request->description;
            $ProcessingFee->save();

            $student_accounts = new student_accounts();
            $student_accounts->date = date('Y-m-d');
            $student_accounts->type = 'Processing';
            $student_accounts->processing_id = $ProcessingFee->id;
            $student_accounts->student_id = $request->student_id;
            $student_accounts->Debit = 0.00;
            $student_accounts->credit = $request->Debit;
            $student_accounts->description = $request->description;
            $student_accounts->save();

            DB::commit();
            toastr(trans('message.success'));
            return redirect()->route('ProcessingFee.index');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['erorr' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        DB::beginTransaction();
        try {

            $ProcessingFee = ProcessingFee::findOrFail($request->id);
            $ProcessingFee->date = date('Y-m-d');
            $ProcessingFee->student_id = $request->student_id;
            $ProcessingFee->amount = $request->Debit;
            $ProcessingFee->description = $request->description;
            $ProcessingFee->update();

            $student_accounts = student_accounts::where('processing_id', $ProcessingFee->id)->first();
            $student_accounts->date = date('Y-m-d');
            $student_accounts->Debit = 0.00;
            $student_accounts->credit = $request->Debit;
            $student_accounts->description = $request->description;
            $student_accounts->update();

            DB::commit();
            toastr(trans('message.update'));
            return redirect()->route('ProcessingFee.index');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['erorr' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        $ProcessingFee = ProcessingFee::destroy($request->id);
        toastr(trans('message.delete'));
        return redirect()->route('ProcessingFee.index');
    }
}
