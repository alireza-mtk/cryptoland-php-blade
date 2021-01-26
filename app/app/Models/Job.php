<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function job_category()
    {
        return $this->belongsTo(JobCategory::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function gallery()
    {
        return $this->morphMany(ImageGallery::class, 'imageable');
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function view_counts()
    {
        return $this->morphMany(ViewCount::class, 'viewable');
    }
}
