<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['name', 'description', 'requirements', 'fee', 'processing_days'];

    public function requests()
    {
        return $this->hasMany(DocumentRequest::class);
    }

    protected $casts = [
        'requirements' => 'array', // Add this to cast requirements as array
    ];

    public function setRequirementsAttribute($value)
    {
        // Handle both array and string input
        $requirements = is_array($value) ? $value : explode("\n", $value);
        
        // Clean and format requirements
        $cleaned = collect($requirements)
            ->map(fn($item) => trim($item))
            ->filter()
            ->values()
            ->toArray();

        $this->attributes['requirements'] = implode("\n", $cleaned);
    }

    public function getRequirementsAttribute($value)
    {
        return array_filter(explode("\n", $value), function($item) {
            return !empty(trim($item));
        });
    }

}