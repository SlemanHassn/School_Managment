<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;

class teachers extends Authenticatable
{
    use HasFactory;
    use HasTranslations;
    protected $guarded=[];
    public $translatable = ['Name'];

     public function specializations(): BelongsTo
    {
         return $this->belongsTo(specializations::class,'Specialization_id');
    }
    public function genders(): BelongsTo
    {
         return $this->belongsTo(Gender::class,'Gender_id');
    }

     public function Sections(): BelongsToMany
    {
        return $this->belongsToMany(Section::class,'section_teacher');
    }
     public function image(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
