<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSections;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use App\Models\teachers;
use Exception;
use Illuminate\Http\Request;

class SectionController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $teachers = teachers::all();
    $Grades = Grade::with(['Sections'])->get();
    $List_grades = Grade::all();

    return view('Sections.Sections',compact('Grades','List_grades','teachers'));

  }


  public function store(StoreSections $request)
  {
    if(Section::where('Name->ar',$request->Name_ar)->orWhere('Name->en',$request->Name)->exists()){
            return redirect()->back()->withErrors([trans('Sections.erorrName')]);
        }
    try{

        $validated = $request->validated();
        $translations = ['en' => $request->Name, 'ar' => $request->Name_ar];
        $Sections = new Section();

        $Sections->setTranslations('Name', $translations);
        $Sections->Grade_id=$request->Grade_id;
        $Sections->Class_id=$request->Class_id;
        $Sections->Status = 1;
        $Sections->save();
        $Sections->Teachers()->attach($request->teacher_id);
        toastr(trans('message.success'));
        return redirect()->back();
    }
    catch(Exception $e){
        return redirect()->back()->withErrors(['erorr' => $e->getMessage()]);
    }



  }


  public function update(StoreSections $request)
  {

    try{

        $validated = $request->validated();
        $section = Section::findOrFail($request->id);
        $translations = ['en' => $request->Name, 'ar' => $request->Name_ar];
        $section->setTranslations('Name', $translations);
        $section->Grade_id=$request->Grade_id;
        $section->Class_id=$request->Class_id;
       if($request->Status == 'on') {
        $section->Status = 1;
      } else {
        $section->Status = 2;
      }
        if (isset($request->teacher_id)) {
            $section->teachers()->sync($request->teacher_id);
        } else {
            $section->teachers()->sync(array());
        }
        $section->update();
        toastr(trans('message.success'));
        return redirect()->back();
    }
    catch(Exception $e){
        return redirect()->back()->withErrors(['erorr' => $e->getMessage()]);
    }
  }


  public function destroy(Request $request)
  {
    $section = Section::findOrFail($request->id);
    $section->Delete();
    toastr(trans('message.delete'));
    return redirect()->back();
  }
  public function classes($id)
  {
    $class_list =Classroom::where('Grade_id',$id)->pluck('Name','id');
    return  $class_list;

  }

}

?>
