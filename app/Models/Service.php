<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';
    protected $fillable = ['icon', 'name', 'link', 'description'];

    //URL name define
    public function editPath() {
        return url("admin/service/". Str::slug($this->name)."/edit");
    }
}
