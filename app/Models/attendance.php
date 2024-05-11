<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class attendance extends Model
{
    use HasFactory;
     protected $guarded = [];

     public function My_class(): BelongsTo
     {
         return $this->belongsTo(Classroom::class, 'classroom_id');
     }

     public function students(): BelongsTo
     {
         return $this->belongsTo(students::class, 'student_id');
     }

     public function grade(): BelongsTo
     {
         return $this->belongsTo(Grade::class, 'grade_id');
     }
     public function section(): BelongsTo
     {
         return $this->belongsTo(Section::class, 'section_id');
     }



}
