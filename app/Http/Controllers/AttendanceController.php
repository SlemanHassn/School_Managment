<?php

namespace App\Http\Controllers;

use App\Models\attendance;
use App\Repository\AttendancesRepositoryInterface;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
   protected $Attendances;
    public function __construct(AttendancesRepositoryInterface $Attendances)
    {
        $this->Attendances = $Attendances;
    }
   public function index()
    {
        return $this->Attendances->index();
    }


    public function store(Request $request)
    {
        return $this->Attendances->store($request);
    }


    public function show($id)
    {
        return $this->Attendances->show($id);
    }

  
}
