<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class question extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $guarded = [];
    public $translatable = ['title','answers','right_answer'];

    public function quizze(): BelongsTo
    {
        return $this->belongsTo(quizze::class, 'quizze_id');
    }
}
