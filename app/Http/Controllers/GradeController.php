<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGradeRequest;
use App\Models\Classroom;
use App\Models\Grade;
use Exception;
use Illuminate\Http\Request;

class GradeController extends Controller
{

  public function index()
  {
    $grades = Grade::latest()->get();
    return view('Grades.Grades',compact('grades'));
  }



  public function store(StoreGradeRequest $request)
  {
    if(Grade::where('Name->ar',$request->Name_ar)->orWhere('Name->en',$request->Name)->exists()){
            return redirect()->back()->withErrors([trans('grade.erorrName')]);
        }
    try{

        $validated = $request->validated();
        $translations = ['en' => $request->Name, 'ar' => $request->Name_ar];
        $grade = new Grade();

        $grade->setTranslations('Name', $translations);
        $grade->Notes=$request->Notes;
        $grade->save();
        toastr(trans('message.success'));
        return redirect()->back();
    }
    catch(Exception $e){
        return redirect()->back()->withErrors(['erorr' => $e->getMessage()]);
    }


  }

  public function show($id)
  {

  }
  public function update(StoreGradeRequest $request)
  {
    $validated = $request->validated();
    $grade = Grade::findOrFail($request->id);
    $translations = ['en' => $request->Name, 'ar' => $request->Name_ar];
    $grade->setTranslations('Name', $translations);
    $grade->Notes=$request->Notes;
    $grade->update();
    toastr(trans('message.update'));
    return redirect()->back();

  }

  public function destroy(Request $request)
  {
    $grade = Grade::findOrFail($request->id);
    $classroom = Classroom::where('Grade_id',$request->id)->pluck('Grade_id');
    if($classroom->count()==0 ){
        $grade->Delete();
    toastr(trans('message.delete'));
    return redirect()->back();
    }
    else{
    toastr()->warning(trans('message.Cantdelete'));
    return redirect()->back();
    }
  }

}

?>
