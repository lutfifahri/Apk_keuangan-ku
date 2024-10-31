<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class per_page extends Model
{
    protected $table = "per_pages";
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $hidden = ['created_at', 'updated_at'];
}
