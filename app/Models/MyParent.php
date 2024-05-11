<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;

class MyParent extends Authenticatable
{
    use HasTranslations;

    protected $table = 'MyParents';
    public $translatable = ['Name_Father','Job_Father','Name_Mother','Job_Mother'];
     protected $guarded=[];
    public $timestamps = true;

         public function image(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

}
