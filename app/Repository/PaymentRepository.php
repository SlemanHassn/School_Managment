<?php

namespace App\Repository;

use App\Models\fund_accounts;
use App\Models\Payment;
use App\Models\student_accounts;
use App\Models\students;
use Exception;
use Illuminate\Support\Facades\DB;

class PaymentRepository implements PaymentRepositoryInterface
{
    public function index()
    {
        $payment_students = Payment::all();
        return view('Payment.index',compact('payment_students'));
    }

    public function show($id)
    {
        $student = students::findOrFail($id);
        return view('Payment.add',compact('student'));

    }

    public function edit($id)
    {
        $payment_student = Payment::findOrFail($id);
        return view('Payment.edit',compact('payment_student'));
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {

            $Payment = new Payment();
            $Payment->date = date('Y-m-d');
            $Payment->student_id = $request->student_id;
            $Payment->amount = $request->Debit;
            $Payment->description = $request->description;
            $Payment->save();

            $fund_accounts = new fund_accounts();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->payment_id = $Payment->id;
            $fund_accounts->Debit =  0.00;
            $fund_accounts->credit =  $request->Debit;
            $fund_accounts->description =  $request->description;;
            $fund_accounts->save();

            $student_accounts = new student_accounts();
            $student_accounts->date = date('Y-m-d');
            $student_accounts->type = 'Payment';
            $student_accounts->Payment_id = $Payment->id;
            $student_accounts->student_id = $request->student_id;
            $student_accounts->Debit =$request->Debit;
            $student_accounts->credit = 0.00;
            $student_accounts->description = $request->description;
            $student_accounts->save();

            DB::commit();
            toastr(trans('message.success'));
            return redirect()->route('Payment.index');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['erorr' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
         DB::beginTransaction();
        try {
            $Payment =  Payment::findOrFail($request->id);
            $Payment->date = date('Y-m-d');
            $Payment->amount = $request->Debit;
            $Payment->description = $request->description;
            $Payment->update();

            $fund_accounts =fund_accounts::where('payment_id',$Payment->id)->first();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->Debit =  0.00;
            $fund_accounts->credit =  $request->Debit;
            $fund_accounts->description =  $request->description;;
            $fund_accounts->update();

            $student_accounts =student_accounts::where('payment_id',$Payment->id)->first();
            $student_accounts->date = date('Y-m-d');
            $student_accounts->Debit =$request->Debit;
            $student_accounts->credit = 0.00;
            $student_accounts->description = $request->description;
            $student_accounts->update();

            DB::commit();
            toastr(trans('message.update'));
            return redirect()->route('Payment.index');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['erorr' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        $payment = payment::destroy($request->id);
        toastr(trans('message.delete'));
        return redirect()->route('Payment.index');
    }
}
