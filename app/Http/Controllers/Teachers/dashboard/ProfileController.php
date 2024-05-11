<?php

namespace App\Http\Controllers\Teachers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
        $info = teachers::findOrFail(auth()->user()->id);
        return view('Teachers.dashborad.profile',compact('info'));
    }
    public function update($id,Request $request){
        $info = teachers::findOrFail(auth()->user()->id);
        // Name_en Name_ar
        $info->update([

            'Name'=>['en' => $request->Name_en, 'ar' =>  $request->Name_ar],
            'password'=>Hash::make($request->password),
        ]);
         toastr()->success(trans('message.update'));
        return redirect()->back();
    }
}
