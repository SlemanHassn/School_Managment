<?php

namespace App\Repository;

use App\Http\Requests\StoreTeacher;
use App\Models\Gender;
use App\Models\image;
use App\Models\Specializations;
use App\Models\teachers;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class TeachersRepository implements TeachersRepositoryInterface
{

    public function getTeachers()
    {
        return teachers::all();
    }

    public function getGenders()
    {
        return  Gender::all();
    }
    public function getSpecializations()
    {
        return  Specializations::all();
    }
    public function getTeacher($id)
    {
        return teachers::findOrFail($id);
    }

    public function storeTeacher($request)
    {
        try {
            $translations = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $Teacher = new teachers();
            $Teacher->email = $request->email;
            $Teacher->password = Hash::make($request->password);
            $Teacher->setTranslations('Name', $translations);
            $Teacher->Specialization_id = $request->Specialization_id;
            $Teacher->Gender_id = $request->Gender_id;
            $Teacher->Joining_Date = $request->Joining_Date;
            $Teacher->Address = $request->Address;
            $Teacher->save();
            toastr(trans('message.success'));
            return redirect()->route('Teachers.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['erorr' => $e->getMessage()]);
        }
    }
    public function updateTeacher($request)
    {
        try {
            $Teacher = teachers::findOrFail($request->id);
            $translations = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $Teacher->email = $request->email;
            $Teacher->password = Hash::make($request->password);
            $Teacher->setTranslations('Name', $translations);
            $Teacher->Specialization_id = $request->Specialization_id;
            $Teacher->Gender_id = $request->Gender_id;
            $Teacher->Joining_Date = $request->Joining_Date;
            $Teacher->Address = $request->Address;
            $Teacher->update();
            toastr(trans('message.success'));
            return redirect()->route('Teachers.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['erorr' => $e->getMessage()]);
        }
    }
    public function showTeacher($id)
    {
        $Teacher = teachers::findOrFail($id);
        return view('Teachers.show', compact('Teacher'));
    }
    public function Upload_attachment($request)
    {
        foreach ($request->file('photos') as $file) {
            $name = $file->getClientOriginalName();
            $file->storeAs('attachments/Teachers/' . $request->Teacher_name, $name, 'uploads_public');

            // insert in image_table
            $images = new image();
            $images->fileName = $name;
            $images->imageable_id =  $request->Teacher_id;
            $images->imageable_type = 'App\Models\teachers';
            $images->save();
        }
        toastr(trans('message.update'));
        return redirect()->back();
    }
     public function Download_attachment($name,$filename)
    {
        return response()->download(public_path('attachments/Teachers/'. $name .'/'. $filename));
    }

    public function Delete_attachment($request)
    {
         Storage::disk('uploads_public')->delete('attachments/Teachers/'. $request->Teacher_name .'/'. $request->filename);
        image::where('id',$request->id)->where('fileName',$request->filename)->delete();
        toastr(trans('message.delete'));
        return redirect()->back();
    }
}
