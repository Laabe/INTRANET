<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanguageLevel extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the language that owns the LanguageLevel
     */
    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
