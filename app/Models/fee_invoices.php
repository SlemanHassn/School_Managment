<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class fee_invoices extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function student(): BelongsTo
    {
        return $this->belongsTo(students::class, 'student_id');
    }
    public function fees(): BelongsTo
    {
        return $this->belongsTo(Fee::class, 'fee_id');
    }
    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class, 'Grade_id');
    }
    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class, 'Classroom_id');
    }
}
