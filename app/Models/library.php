<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class library extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['title'];
    protected $table="library";


    public function teacher(): BelongsTo
    {
        return $this->belongsTo(teachers::class, 'teacher_id');
    }
    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class, 'Grade_id');
    }
    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class, 'Classroom_id');
    }
    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
}
