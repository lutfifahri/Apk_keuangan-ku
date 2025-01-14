<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemabayaran extends Model
{
    protected $table = 'pemabayaran';
    protected $guarded = ['id'];
    protected $hidden = ['created_at', 'updated_at'];

    public function scopeFilter($query, array $filters)
    {
        $search = $filters["search"] ?? false;

        $query->when($search, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where("name", "like", "%" . $search . "%");
            });
        });
    }
}
