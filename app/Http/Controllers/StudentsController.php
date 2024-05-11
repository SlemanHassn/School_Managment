<?php

namespace App\Http\Controllers;

use App\Http\Requests\storestudents;
use App\Models\students;
use App\Repository\StudentsRepositoryInterface;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    protected $students;
    public function __construct(StudentsRepositoryInterface $students)
    {
        $this->students = $students;
    }

    public function index()
    {
        return $this->students->indexStudents();
    }

    public function create()
    {
        return $this->students->createStudents();
    }
    public function store(storestudents $request)
    {
        return $this->students->storeStudents($request);
    }

    public function show($id)
    {
        return $this->students->ShowDetailsStudents($id);
    }

    public function edit($id)
    {
        return $this->students->editStudents($id);
    }

    public function update(storestudents $request)
    {
        return $this->students->updateStudents($request);
    }

    public function destroy(Request $request)
    {
        return  $this->students->deleteStudents($request);
    }
    public function getSections($id)
    {
        return $this->students->getSections($id);
    }
    public function Upload_attachment(Request $request)
    {
        return $this->students->Upload_attachment($request);
    }
    public function Delete_attachment(Request $request)
    {
        return $this->students->Delete_attachment($request);
    }
    public function Download_attachment($name,$filename)
    {
       return   $this->students->Download_attachment($name,$filename);
    }
}
