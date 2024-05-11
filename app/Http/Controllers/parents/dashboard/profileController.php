<?php

namespace App\Http\Controllers\parents\dashboard;

use App\Http\Controllers\Controller;
use App\Models\MyParent;
use Illuminate\Http\Request;

class profileController extends Controller
{
 public function index(){
        $info = MyParent::findOrFail(auth()->user()->id);
        return view('parents.profile',compact('info'));
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
