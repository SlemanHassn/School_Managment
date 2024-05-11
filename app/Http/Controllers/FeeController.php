<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFees;
use App\Models\Fee;
use App\Repository\FeeRepositoryInterface;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    protected $Fees;
    public function __construct(FeeRepositoryInterface $Fees)
    {
        $this->Fees = $Fees;
    }

    public function index()
    {

        return $this->Fees->index();
    }

    public function create()
    {
        return $this->Fees->create();
    }

    public function store(StoreFees $request)
    {
      return $this->Fees->store($request);
    }


    public function show()
    {
        //
    }


    public function edit($id)
    {
         return $this->Fees->edit($id);
    }


    public function update(StoreFees $request)
    {
      return $this->Fees->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->Fees->destroy($request);
    }
}
