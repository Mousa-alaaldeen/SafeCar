<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;
    /**
     * Get the contacts that owns the services.
     */
    public function contacts() 
    {
        return $this->belongsTo(Contact::class);
    }
}
