<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeacher;
use App\Models\teachers;
use App\Repository\TeachersRepositoryInterface;
use Illuminate\Http\Request;

class TeachersController extends Controller
{

    protected $Teacher;

    public function __construct(TeachersRepositoryInterface $Teacher)
    {
        $this->Teacher = $Teacher;
    }
    public function index()
    {
        $Teachers = $this->Teacher->getTeachers();
        return view('Teachers.Teachers', compact('Teachers'));
    }
    public function create()
    {
        $specializations = $this->Teacher->getSpecializations();
        $genders = $this->Teacher->getGenders();
        return view('Teachers.create', compact('specializations', 'genders'));
    }
    public function show($id)
    {
        return $this->Teacher->showTeacher($id);
    }

    public function store(StoreTeacher $request)
    {
        return $this->Teacher->storeTeacher($request);
    }

    public function edit($id)
    {
        $specializations = $this->Teacher->getSpecializations();
        $genders = $this->Teacher->getGenders();
        $Teachers = $this->Teacher->getTeacher($id);
        return view('Teachers.edit', compact('Teachers', 'specializations', 'genders'));
    }
    public function update(Request $request, teachers $teachers)
    {
        return $this->Teacher->updateTeacher($request);
    }
    public function destroy(Request $request)
    {
        $Teacher = $this->Teacher->getTeacher($request->id);
        $Teacher->delete();
        toastr(trans('message.delete'));
        return redirect()->route('Teachers.index');
    }
    public function Upload_attachment_Teacher(Request $request)
    {
        return $this->Teacher->Upload_attachment($request);
    }
    public function Download_attachment_Teacher($name, $filename)
    {
        return $this->Teacher->Download_attachment($name, $filename);
    }
    public function Delete_attachment_Teacher(Request $request)
    {
        return $this->Teacher->Delete_attachment($request);
    }
}
