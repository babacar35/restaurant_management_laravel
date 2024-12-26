<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Log;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'is_active'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_active' => 'boolean',
    ];

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function hasRole(string $roleSlug): bool
    {
        $this->load('role');
        
        Log::info('Checking role', [
            'user_id' => $this->id,
            'role_relation' => $this->role,
            'role_id' => $this->role_id,
            'checking_for' => $roleSlug
        ]);

        if (!($this->role instanceof Role)) {
            Log::warning('Role is not an instance of Role model', [
                'role_type' => gettype($this->role),
                'role_value' => $this->role
            ]);
            return false;
        }

        return $this->role->slug === $roleSlug;
    }

    public function isAdmin(): bool
    {
        return $this->hasRole('admin');
    }

    public function isManager(): bool
    {
        return $this->hasRole('manager');
    }

    public function isStaff(): bool
    {
        return $this->hasRole('staff');
    }

    public function isClient(): bool
    {
        return $this->hasRole('client');
    }

    public function isActive(): bool
    {
        return (bool) $this->is_active;
    }
}
