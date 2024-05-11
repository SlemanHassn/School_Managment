<?php

namespace App\Repository;

use App\Models\Fee;
use App\Models\fee_invoices;
use App\Models\Grade;
use App\Models\student_accounts;
use App\Models\students;
use Exception;
use Illuminate\Support\Facades\DB;

class FeeInvoicesRepository  implements FeeInvoicesRepositoryInterface
{
    public function index()
    {
        $Fee_invoices = fee_invoices::all();

        return view('Fees_Invoices.index', compact('Fee_invoices'));
    }
    public function show($id)
    {
        $student = students::findOrFail($id);
        $fees = Fee::all();
        return view('Fees_Invoices.add', compact('student', 'fees'));
    }
    public function create()
    {
        $students = students::all();
        $fees = Fee::all();
        return view('Fees_Invoices.add', compact('students', 'fees'));
    }
    public function store($request)
    {
        DB::beginTransaction();
        try {
            foreach ($request->List_Fees as $List_Fees) {
                $feeInvoice = new fee_invoices();
                $feeInvoice->invoice_date = date('Y-m-d');
                $feeInvoice->student_id = $List_Fees['student_id'];
                $feeInvoice->Grade_id = $request->Grade_id;
                $feeInvoice->Classroom_id = $request->Classroom_id;
                $feeInvoice->fee_id = $List_Fees['fee_id'];
                $feeInvoice->amount = $List_Fees['amount'];
                $feeInvoice->description = $List_Fees['description'];
                $feeInvoice->save();

                $studentAc = new student_accounts();
                $studentAc->student_id = $List_Fees['student_id'];
                $studentAc->date = date('Y-m-d');
                $studentAc->type = 'invoice';
                $studentAc->fee_invoice_id = $feeInvoice->id;
                $studentAc->Debit = $List_Fees['amount'];
                $studentAc->credit = 0.00;
                $studentAc->description = $List_Fees['description'];
                $studentAc->save();
            }
             DB::commit();
            toastr(trans('message.success'));
            return redirect()->route('FeeInvoices.index');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['erorr' => $e->getMessage()]);
        }
    }
    public function edit($id)
    {
        $fee_invoices = fee_invoices::findOrFail($id);
        $fees = Fee::all();
        return view('Fees_Invoices.edit', compact('fee_invoices', 'fees'));
    }

    public function update($request)
    {
        DB::beginTransaction();

        try {

            $feeInvoice = fee_invoices::findOrFail($request->id);
            $feeInvoice->fee_id = $request->fee_id;
            $feeInvoice->amount = $request->amount;
            $feeInvoice->description =  $request->description;
            $feeInvoice->update();

            $studentAc = student_accounts::where('fee_invoice_id', $request->id)->first();
            $studentAc->fee_invoice_id = $feeInvoice->id;
            $studentAc->Debit = $request->amount;
            $studentAc->credit = 0.00;
            $studentAc->description = $request->description;
            toastr(trans('message.update'));
            return redirect()->route('FeeInvoices.index');
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['erorr' => $e->getMessage()]);
        }
    }
    public function destroy($request)
    {
        $feeInvoice = fee_invoices::findOrFail($request->id);
        $feeInvoice->delete();
        toastr(trans('message.success'));
        return redirect()->route('FeeInvoices.index');
    }
}
