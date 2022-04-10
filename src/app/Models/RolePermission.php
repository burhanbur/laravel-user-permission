<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class RolePermission extends MultiplePrimaryKey
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'role_has_permissions';
    protected $primaryKey = ['permission_id', 'role_id'];
    protected $fillable = [
        'permission_id',
        'role_id',
    ];    
    
    public $incrementing = false;

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function permission()
    {
        return $this->belongsTo(Permission::class, 'permission_id');
    }
}