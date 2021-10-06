<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Resume extends Model
{
    use HasFactory;

    protected $table = 'resumes';
    protected $fillable = ['heading', 'career_position', 'r_time', 'place', 'r_content'];

    //URL name define for edit
    public function editPath() {
        return url("admin/resume/". Str::slug($this->heading)."/edit");
    }
    //URL name define for view
    public function showPath() {
        return url("admin/resume/". Str::slug($this->heading));
    }
}
