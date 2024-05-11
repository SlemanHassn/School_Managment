<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClassroom;
use App\Models\Classroom;
use App\Models\Grade;
use Exception;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{

   public function index()
  {
    $classrooms = Classroom::all();
    $grades = Grade::all();
    return view('Classrooms.classrooms',compact('classrooms','grades'));
  }


  public function store(StoreClassroom $request)
  {
        $List_Classes = $request->List_Classes;

    try{

        $validated = $request->validated();

        foreach ($List_Classes as $list_class){
            $classroom = new classroom();
            $classroom->Name = ['en' => $list_class['Name'], 'ar' => $list_class['Name_ar']];
            $classroom->Grade_id=$list_class['Grade_id'];
            $classroom->save();
        }
        toastr(trans('message.success'));
        return redirect()->back();
    }
    catch(Exception $e){
        return redirect()->back()->withErrors(['erorr' => $e->getMessage()]);
    }


  }


  public function update(StoreClassroom $request)
  {
    $validated = $request->validated();
    $classroom = Classroom::findOrFail($request->id);
    $translations = ['en' => $request->Name, 'ar' => $request->Name_ar];
    $classroom->setTranslations('Name', $translations);
    $classroom->Grade_id=$request->Grade_id;
    $classroom->update();
    toastr(trans('message.update'));
    return redirect()->back();

  }


  public function destroy(Request $request)
  {
    $classroom = Classroom::findOrFail($request->id);
    $classroom->Delete();
    toastr(trans('message.delete'));
    return redirect()->back();

  }

  public function Delete_all(Request $request)
  {

    $delete_all_id = explode(',',$request->delete_all_id);

    Classroom::whereIn('id',$delete_all_id)->Delete();
        toastr(trans('message.delete'));
          return redirect()->route('classroom.index');


  }
  public function Filter_Classes(Request $request)
  {
   if($request->Grade_id == 'all'){
    return redirect()->route('classroom.index');
   }
   else{
     $classrooms = Classroom::where('Grade_id',$request->Grade_id)->get();
    $grade_S = Grade::where('id',$request->Grade_id)->first();
    $grades = Grade::all();
    return view('Classrooms.classrooms',compact('classrooms','grades','grade_S'));
   }


  }

}

?>
