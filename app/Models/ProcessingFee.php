<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProcessingFee extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function student(): BelongsTo
    {
        return $this->belongsTo(students::class, 'student_id');
    }
}
