<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;

class students extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;
    use HasTranslations;
    protected $guarded = [];
    public $translatable = ['name'];
    protected $data = ['deleted_at'];

    public function gender(): BelongsTo
    {
        return $this->belongsTo(gender::class, 'gender_id');
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
    public function blood(): BelongsTo
    {
        return $this->belongsTo(TypeBloods::class, 'blood_id');
    }

     public function image(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }
     public function Nationality(): BelongsTo
    {
        return $this->belongsTo(Nationalities::class, 'nationalitie_id');
    }
     public function myparent(): BelongsTo
    {
        return $this->belongsTo(MyParent::class, 'parent_id');
    }

    public function student_account(): HasMany
    {
        return $this->hasMany(student_accounts::class, 'student_id');
    }

     public function attendance(): HasMany
     {
         return $this->hasMany(attendance::class, 'student_id');
     }
}
