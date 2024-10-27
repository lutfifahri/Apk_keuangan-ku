<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Di_pinjam extends Model
{
    protected $table = 'di_pinjam';
    protected $guarded = ['id'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

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
