<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait AttachFilesTrait
{
    public function uploadFile($request,$name,$folder = 'library')
    {
        $file_name = $request->file($name)->getClientOriginalName();
        $request->file($name)->storeAs('attachments/'.$folder.'/',$file_name,'uploads_public');
    }

    public function deleteFile($name)
    {
        $exists = Storage::disk('uploads_public')->exists('attachments/library/'.$name);

        if($exists)
        {
            Storage::disk('uploads_public')->delete('attachments/library/'.$name);
        }
    }
}
