<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'full_name',
        'description',
        'phone',
        'address',
        'location',
        'github_url',
        'linkedin_url',
        'profile_image',
        'cv_path', // ✅ Added CV path
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

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

    /**
     * ✅ Check if user has a CV uploaded
     */
    public function hasCv(): bool
    {
        return !empty($this->cv_path) && Storage::disk('public')->exists($this->cv_path);
    }

    /**
     * ✅ Get the full URL for the CV
     */
    public function getCvUrlAttribute(): ?string
    {
        if ($this->hasCv()) {
            return Storage::disk('public')->url($this->cv_path);
        }
        return null;
    }

    /**
     * ✅ Delete the CV file from storage
     */
    public function deleteCv(): bool
    {
        if ($this->cv_path && Storage::disk('public')->exists($this->cv_path)) {
            return Storage::disk('public')->delete($this->cv_path);
        }
        return false;
    }

    /**
     * Relationship: User has one About record
     */
    public function about()
    {
        return $this->hasOne(\App\Models\About::class);
    }
}