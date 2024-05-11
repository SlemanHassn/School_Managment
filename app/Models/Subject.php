<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class Subject extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name'];
    protected $guarded = [];


    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }
    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(teachers::class, 'teacher_id');
    }
}
