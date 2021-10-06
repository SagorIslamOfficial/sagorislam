<?php

namespace App\Models\Portfolio;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Item extends Model
{
    use HasFactory;

    protected $table = 'items';
    protected $fillable = ['category_id', 'image', 'name', 'slug', 'pd_title', 'pd_section', 'pd_s_content', 'pd_link', 'pd_link_text', 'pd_description', 'pd_images'];

    //URL name define for edit
    public function editPath() {
        return url("admin/portfolio/item/". Str::slug($this->name)."/edit");
    }
    //URL name define for view
    public function showPath() {
        return url("admin/portfolio/item/". Str::slug($this->name));
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
