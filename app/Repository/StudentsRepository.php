<?php

namespace App\Repository;

use App\Models\Classroom;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\image;
use App\Models\MyParent;
use App\Models\Nationalities;
use App\Models\Section;
use App\Models\students;
use App\Models\TypeBloods;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class StudentsRepository implements StudentsRepositoryInterface
{
    use WithFileUploads;
    public function getSections($id)
    {
        $section_list = Section::where('Class_id', $id)->pluck('Name', 'id');
        return  $section_list;
    }
    public function indexStudents()

    {
        $students = students::all();
        return view('Students.Students', compact('students'));
    }


    public function createStudents()
    {
        $data['Genders'] = Gender::all();
        $data['nationals'] = Nationalities::all();
        $data['bloods'] = TypeBloods::all();
        $data['Grades'] = Grade::all();
        $data['my_classes'] = Classroom::all();
        $data['sections'] = Section::all();
        $data['parents'] = MyParent::all();
        return view('Students.add', $data);
    }
    public function storeStudents($request)
    {
        DB::beginTransaction();
        try {
            $students = new students();
            $students->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $students->email = $request->email;
            $students->password = Hash::make($request->password);
            $students->gender_id = $request->gender_id;
            $students->nationalitie_id = $request->nationalitie_id;
            $students->blood_id = $request->blood_id;
            $students->Date_Birth = $request->Date_Birth;
            $students->Grade_id = $request->Grade_id;
            $students->Classroom_id = $request->Classroom_id;
            $students->section_id = $request->section_id;
            $students->parent_id = $request->parent_id;
            $students->academic_year = $request->academic_year;
            $students->save();
            if ($request->hasfile('photos')) {
                foreach ($request->file('photos') as $file) {
                    $name = $file->getClientOriginalName();
                    $file->storeAs('attachments/Students/' . $students->name, $name, 'uploads_public');

                    // insert in image_table
                    $images = new Image();
                    $images->fileName = $name;
                    $images->imageable_id = $students->id;
                    $images->imageable_type = 'App\Models\students';
                    $images->save();
                }
            }
            // insert data

            DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Students.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function editStudents($id)
    {
        $data['Genders'] = Gender::all();
        $data['nationals'] = Nationalities::all();
        $data['bloods'] = TypeBloods::all();
        $data['Grades'] = Grade::all();
        $data['my_classes'] = Classroom::all();
        $data['sections'] = Section::all();
        $data['parents'] = MyParent::all();
        $student = students::findORFail($id);

        return view('Students.edit', $data, compact('student'));
    }

    public function updateStudents($request)
    {
        try {
            $student = students::findOrFail($request->id);
            $translations = ['en' => $request->name_ar, 'ar' => $request->name_en];
            $student->setTranslations('name', $translations);
            $student->email = $request->email;
            $student->password = Hash::make($request->password);
            $student->gender_id  = $request->gender_id;
            $student->nationalitie_id   = $request->nationalitie_id;
            $student->blood_id = $request->blood_id;
            $student->Date_Birth = $request->Date_Birth;
            $student->Grade_id = $request->Grade_id;
            $student->Classroom_id  = $request->Classroom_id;
            $student->section_id   = $request->section_id;
            $student->parent_id    = $request->parent_id;
            $student->academic_year    = $request->academic_year;
            $student->save();
            toastr(trans('message.update'));
            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['erorr' => $e->getMessage()]);
        }
    }
    public function deleteStudents($request)
    {
        $student = students::findOrFail($request->id);
        $student->delete();
        toastr(trans('message.delete'));
        return redirect()->back();
    }
    public function ShowDetailsStudents($id)
    {
        $Student = students::findOrFail($id);
        return view('Students.show', compact('Student'));
    }
    public function Upload_attachment($request)
    {

        foreach ($request->file('photos') as $file) {
            $name = $file->getClientOriginalName();
            $file->storeAs('attachments/Students/' . $request->student_name, $name, 'uploads_public');

            // insert in image_table
            $images = new Image();
            $images->fileName = $name;
            $images->imageable_id =  $request->student_id;
            $images->imageable_type = 'App\Models\students';
            $images->save();
        }
        toastr(trans('message.update'));
        return redirect()->back();
    }
    public function Delete_attachment($request)
    {
        Storage::disk('uploads_public')->delete('attachments/Students/' . $request->student_name . '/' . $request->filename);
        image::where('id', $request->id)->where('fileName', $request->filename)->delete();
        toastr(trans('message.delete'));
        return redirect()->back();
    }
    public function Download_attachment($name, $filename)
    {
        return response()->download(public_path('attachments/Students/' . $name . '/' . $filename));
    }
}
