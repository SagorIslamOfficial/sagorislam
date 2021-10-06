<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Skill extends Model
{
    use HasFactory;

    protected $table = 'skills';
    protected $fillable = ['name', 'progress'];

    //URL name define
    public function editPath() {
        return url("admin/about/skill/". Str::slug($this->name)."/edit");
    }
}
