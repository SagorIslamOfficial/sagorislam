<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedback';
    protected $fillable = ['image', 'name', 'dignity', 'message'];

    //URL name define
    public function editPath() {
        return url("admin/about/feedback/". Str::slug($this->name)."/edit");
    }
}
