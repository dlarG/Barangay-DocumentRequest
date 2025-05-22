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
}