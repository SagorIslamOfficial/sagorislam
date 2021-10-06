<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class AboutUs extends Model
{
    use HasFactory;

    protected $table = 'about_us';
    protected $fillable = ['image', 'dignity', 'sub_text', 'name', 'about_content', 'about_me'];

    //URL name define
    public function editPath() {
        return url("admin/about/about-us/". Str::slug($this->dignity)."/edit");
    }
}
