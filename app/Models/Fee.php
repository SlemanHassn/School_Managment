<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class Fee extends Model
{
    use HasFactory;
     use HasTranslations;
        protected $guarded = [];

    public $translatable = ['title'];


    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class, 'Grade_id');
    }
    public function classroom(): BelongsTo
    {
        return $this->belongsTo(classroom::class, 'Classroom_id');
    }
}
