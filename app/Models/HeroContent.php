<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroContent extends Model
{
    protected $table = 'hero_contents';

    protected $fillable = [
        'user_id',
        'greeting',
        'description',
        'typing_texts',           // JSON array
        'btn_contact_enabled',
        'btn_contact_text',
        'btn_projects_enabled',
        'btn_projects_text',
        'social_links',           // JSON array
        'tech_stack_enabled',
        'tech_stack_count',
        'hero_image_url',         // Optional hero image
    ];

    protected $casts = [
        'typing_texts'        => 'array',
        'social_links'        => 'array',
        'btn_contact_enabled' => 'boolean',
        'btn_projects_enabled'=> 'boolean',
        'tech_stack_enabled'  => 'boolean',
        'tech_stack_count'    => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $attributes = [
    'typing_texts' => '[]',
    'social_links' => '[]',
];

}