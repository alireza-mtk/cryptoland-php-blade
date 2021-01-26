<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobGroup extends Model
{
    use HasFactory;


    protected $guarded = [];

    public function job_category()
    {
        return $this->hasMany(JobCategory::class);
    }

    public function gallery()
    {
        return $this->morphOne(ImageGallery::class, 'imageable');
    }
}
