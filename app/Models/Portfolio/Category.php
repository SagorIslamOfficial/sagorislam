<?php

namespace App\Models\Portfolio;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = ['name', 'slug'];

    //URL name define for edit
    public function editPath() {
        return url("admin/portfolio/category/". Str::slug($this->name)."/edit");
    }
    //URL name define for view
    public function showPath() {
        return url("admin/portfolio/category/". Str::slug($this->name));
    }

    public function items() {
        return $this->hasMany(Item::class);
    }
}
