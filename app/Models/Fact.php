<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Fact extends Model
{
    use HasFactory;

    protected $table = 'facts';
    protected $fillable = ['total', 'name'];

    //URL name define
    public function editPath() {
        return url("admin/about/category/". Str::slug($this->name)."/edit");
    }

}
