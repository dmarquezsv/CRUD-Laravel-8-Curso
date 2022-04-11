<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Homework;

class Category extends Model
{
    use HasFactory;

    public function homework(){
        return $this->hasMany(Homework::class);
    }
}
