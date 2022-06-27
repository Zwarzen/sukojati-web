<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Traits\HasPermissions;

class Role extends Model
{
    use HasFactory, HasRoles, HasPermissions ;
    protected $fillable = [
        'name',
        
    ];

    public $guard_name = 'admin';

}
