<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Grade extends Model
{
    use HasTranslations;

    public $translatable = ['Name'];

    protected $fillable = [
        'Name',
        'Notes',
    ];
    protected $table = 'Grades';
    public $timestamps = true;


    //   public function Sections()
    // {
    //     return $this->hasMany(Grade::class, 'Grade_id');
    // }

    public function Sections(): HasMany
    {
        return $this->hasMany(Section::class, 'Grade_id');
    }

}
