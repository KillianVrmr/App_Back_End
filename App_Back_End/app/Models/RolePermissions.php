<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolePermissions extends Model
{
    
    protected $table = 'roles_permissions';

    protected $fillable = ['role_id', 'permission_id'];
}
