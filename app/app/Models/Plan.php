<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    public function peyments()
    {
        return $this->hasMany(ZarinpalPeyment::class);
    }

    public function features()
    {
        return $this->hasMany(Featured::class);
    }
}
