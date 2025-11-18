<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Enquiry extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'subject',
        'message',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    /**
     * Each enquiry belongs to one portfolio owner
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}