<?php
namespace App\Http\Controllers;
use App\Repository\FeeInvoicesRepositoryInterface;
use Illuminate\Http\Request;

class FeeInvoicesController extends Controller
{
    protected $FeeInvoices;
    public function __construct(FeeInvoicesRepositoryInterface $FeeInvoices)
    {
        $this->FeeInvoices = $FeeInvoices;
    }
    public function index()
    {
        return $this->FeeInvoices->index();
    }

    public function create()
    {
        return   $this->FeeInvoices->create();
    }
    public function store(Request $request)
    {
        return $this->FeeInvoices->store($request);
    }

    public function show($id)
    {
        return   $this->FeeInvoices->show($id);
    }

    public function edit($id)
    {
        return   $this->FeeInvoices->edit($id);
    }
    public function update(Request $request)
    {
        return   $this->FeeInvoices->update($request);
    }
    public function destroy(Request $request)
    {
        return $this->FeeInvoices->destroy($request);
    }
}
