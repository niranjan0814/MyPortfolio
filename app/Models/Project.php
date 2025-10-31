<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'link',
        'depurl',
        'tags',       
        'created_at', 
    ];

    /**
     * Get the overview associated with the project.
     */
    public function overview(): HasOne
    {
        return $this->hasOne(ProjectOverview::class);
    }
}