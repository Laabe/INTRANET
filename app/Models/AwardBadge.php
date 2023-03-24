<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AwardBadge extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function image()
    {
        return 'award_badges_image/' . $this->image;
    }
}
