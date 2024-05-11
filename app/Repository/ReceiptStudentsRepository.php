<?php

namespace App\Repository;

use App\Models\fund_accounts;
use App\Models\receipt_students;
use App\Models\student_accounts;
use App\Models\students;
use Exception;
use Illuminate\Support\Facades\DB;

class ReceiptStudentsRepository implements ReceiptStudentsRepositoryInterface
{
    public function index()
    {
        $receipt_students = receipt_students::all();
        return view('Receipt.index', compact('receipt_students'));
    }
    public function show($id)
    {

        $student = students::findOrFail($id);
        $Debit = student_accounts::where('student_id',$id)->sum('Debit');
        $credit = student_accounts::where('student_id',$id)->sum('credit');
        $sub =   $Debit - $credit;


        return view('Receipt.add', compact('student','sub'));
    }
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $receipt = new receipt_students();
            $receipt->date = date('Y-m-d');
            $receipt->student_id = $request->student_id;
            $receipt->Debit = $request->Debit;
            $receipt->description = $request->description;
            $receipt->save();

            $fund_accounts = new fund_accounts();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->receipt_id = $receipt->id;
            $fund_accounts->Debit =  $request->Debit;
            $fund_accounts->credit =  0.00;
            $fund_accounts->description =  $request->description;;
            $fund_accounts->save();

            $student_accounts = new student_accounts();
            $student_accounts->date=date('Y-m-d');
            $student_accounts->type='Receipt';
            $student_accounts->receipt_id=$receipt->id;
            $student_accounts->student_id=$request->student_id;
            $student_accounts->Debit=0.00;
            $student_accounts->credit=$request->Debit;
            $student_accounts->description=$request->description;
            $student_accounts->save();

            DB::commit();
            toastr(trans('message.success'));
            return redirect()->route('Receipts.index');
        } catch (Exception $e)
        {
            DB::rollback();
            return redirect()->back()->withErrors(['erorr' => $e->getMessage()]);
        }
    }
    public function edit($id)
    {
        $receipt_student = receipt_students::findOrFail($id);
        return  view('Receipt.edit',compact('receipt_student'));
    }
    public function update($request)
    {
         DB::beginTransaction();

        try {
            $receipt = receipt_students::findOrFail($request->id);
            $receipt->date = date('Y-m-d');
            $receipt->student_id = $request->student_id;
            $receipt->Debit = $request->Debit;
            $receipt->description = $request->description;
            $receipt->update();

            $fund_accounts = fund_accounts::where('receipt_id',$receipt->id)->first();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->Debit =  $request->Debit;
            $fund_accounts->credit =  0.00;
            $fund_accounts->description =  $request->description;;
            $fund_accounts->update();

            $student_accounts =student_accounts::where('receipt_id',$receipt->id)->first();;
            $student_accounts->date=date('Y-m-d');
            $student_accounts->type='Receipt';
            $student_accounts->Debit=0.00;
            $student_accounts->credit=$request->Debit;
            $student_accounts->description=$request->description;
            $student_accounts->update();

            DB::commit();
            toastr(trans('message.update'));
            return redirect()->route('Receipts.index');
        } catch (Exception $e)
        {
            DB::rollback();
            return redirect()->back()->withErrors(['erorr' => $e->getMessage()]);
        }

    }
    public function destroy($request)
    {
        $receipt = receipt_students::findOrFail($request->id);
        $receipt->delete();
          toastr(trans('message.delete'));
            return redirect()->route('Receipts.index');

    }
}
