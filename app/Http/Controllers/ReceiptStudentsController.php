<?php

namespace App\Http\Controllers;

use App\Repository\ReceiptStudentsRepositoryInterface;
use Illuminate\Http\Request;

class ReceiptStudentsController extends Controller
{

    protected $Receipts;
    public function __construct(ReceiptStudentsRepositoryInterface $Receipts)
    {
        $this->Receipts = $Receipts;
    }
    public function index()
    {
        return $this->Receipts->index();
    }


    public function store(Request $request)
    {
        return $this->Receipts->store($request);
    }

    public function show($id)
    {
        return $this->Receipts->show($id);
    }


    public function edit($id)
    {
        return $this->Receipts->edit($id);
    }

    public function update(Request $request)
    {
        return $this->Receipts->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->Receipts->destroy($request);
    }
}
