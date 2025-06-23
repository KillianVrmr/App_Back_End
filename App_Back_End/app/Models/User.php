<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Functions;
use App\Models\Project;
use App\Models\Role;

use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name', 'lastname', 'email', 'password',
        'function_id', 'role_id', 'emergency_contact', 'blood_type', 'contact_number',
    ];
    
    public function function()
    {
        return $this->belongsTo(Functions::class, 'function_id');
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'user_project');
    }

    public function timesheets() 
    {
        return $this->BelongsToMany(Timesheet::class);
    }
    public function shifts()
    {
        return $this->belongsToMany(Shift::class, 'shift_user', 'user_id', 'shift_id');
    }
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
