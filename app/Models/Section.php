<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{

    use HasTranslations;

    public $translatable = ['Name'];
      protected $fillable = [
        'Name','Grade_id','Class_id','Status'
    ];

    protected $table = 'Sections';
    public $timestamps = true;






    public function Classroom(): BelongsTo
    {
         return $this->belongsTo(Classroom::class,'Class_id');
    }

      public function Teachers(): BelongsToMany
    {
        return $this->belongsToMany(teachers::class,'section_teacher','section_id');
    }
      public function Grades(): BelongsTo
    {
         return $this->belongsTo(Grade::class,'Grade_id');
    }


}
