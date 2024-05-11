<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class Classroom extends Model
{
        use HasTranslations;

    public $translatable = ['Name'];
      protected $fillable = [
        'Name','Grade_id'
    ];

    protected $table = 'classrooms';
    public $timestamps = true;



    // public function Grade(): HasOne
    // {
    //     return $this->hasOne(Grade::class,'Grade_id','id');
    // }
    public function Grade(): BelongsTo
    {
         return $this->BelongsTo(Grade::class,'Grade_id','id');
    }

}
