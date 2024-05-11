<?php

namespace App\Http\Controllers;

use App\Repository\GraduatedRepositoryInterface;
use Illuminate\Http\Request;

class GraduatedController extends Controller
{
    protected $Graduated;
    public function __construct(GraduatedRepositoryInterface $Graduated)
    {
        $this->Graduated = $Graduated;
    }

    public function index()
    {
        return $this->Graduated->indexGraduated();
    }


    public function create()
    {
        return $this->Graduated->createGraduated();
    }

    public function store(Request $request)
    {
        return $this->Graduated->SoftDeletesGraduated($request);
    }
    public function oneSoft(Request $request)
    {
        return $this->Graduated->oneSoftDeletesGraduated($request);
    }



    public function update(Request $request)
    {
          return $this->Graduated->reGraduated($request);
    }


    public function destroy(Request $request)
    {
         return $this->Graduated->forceDelete($request);
    }
}
