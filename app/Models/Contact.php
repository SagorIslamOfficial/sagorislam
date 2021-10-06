<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';
    protected $fillable = ['lat_long', 'location', 'email', 'phone'];

    //URL name define
    public function editPath() {
        return url("admin/contact/". Str::slug($this->name)."/edit");
    }
}
