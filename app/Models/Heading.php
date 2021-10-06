<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Heading extends Model
{
    use HasFactory;

    protected $table = 'headings';
    protected $fillable = [
                            'about_heading', 'about_sub_text', 'skill_heading', 'skill_sub_text', 'fact_heading', 'fact_sub_text',
                            'testimonial_heading', 'testimonial_sub_text', 'resume_heading', 'resume_sub_text', 'service_heading',
                            'service_sub_text', 'portfolio_heading', 'portfolio_sub_text', 'contact_heading', 'contact_sub_text'
                          ];

    //URL name define
    public function editPath() {
        return url("admin/home/". Str::slug($this->big_text)."/edit");
    }
}
