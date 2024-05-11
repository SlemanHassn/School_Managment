<?php

namespace App\Http\Controllers\StudentDashboard;

use App\Http\Controllers\Controller;
use App\Models\students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class profileController extends Controller
{
    public function index(){
        $info = students::findOrFail(auth()->user()->id);
        return view('Students.dashboard.profile',compact('info'));
    }
    public function update($id,Request $request){
        $info = students::findOrFail(auth()->user()->id);
        // Name_en Name_ar
        $info->update([

            'Name'=>['en' => $request->Name_en, 'ar' =>  $request->Name_ar],
            'password'=>Hash::make($request->password),
        ]);
         toastr()->success(trans('message.update'));
        return redirect()->back();
    }
}
