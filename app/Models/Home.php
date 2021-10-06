<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Home extends Model
{
    use HasFactory;

    protected $table = 'homes';

    protected $fillable = ['logo', 'big_text', 'small_text', 'link', 'footer_text', 'footer_link', 'social_icon', 'social_link'];

    //URL name define
    public function editPath() {
        return url("admin/home/". Str::slug($this->big_text)."/edit");
    }
}
