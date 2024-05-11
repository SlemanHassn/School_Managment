<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class promotions extends Model
{
    use HasFactory;
     protected $guarded=[];

      public function student(): BelongsTo
    {
         return $this->belongsTo(students::class,'student_id');
    }
      public function f_grade(): BelongsTo
    {
         return $this->belongsTo(Grade::class,'from_grade');
    }
      public function f_classroom(): BelongsTo
    {
         return $this->belongsTo(Classroom::class,'from_Classroom');
    }
      public function f_section(): BelongsTo
    {
         return $this->belongsTo(Section::class,'from_section');
    }
      public function t_grade(): BelongsTo
    {
         return $this->belongsTo(Grade::class,'to_grade');
    }
      public function t_classroom(): BelongsTo
    {
         return $this->belongsTo(Classroom::class,'to_Classroom');
    }
      public function t_section(): BelongsTo
    {
         return $this->belongsTo(Section::class,'to_section');
    }
}
