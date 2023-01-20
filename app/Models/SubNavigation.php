<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class SubNavigation extends Model
{
    use HasFactory;

    public function subnavrole()
    {
        return $this->belongsToMany(Role::class, 'role_has_sub_navigations');
    }
}
