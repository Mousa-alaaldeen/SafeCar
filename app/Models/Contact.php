<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table='contact';
    protected $fillable = [
        'name',   
        'email',   
        'subject', 
        'message', 
        'services_id',
        
    ];
     /**
     * Get the service for the blog contact.
     */
  // Contact.php
public function services()
{
    return $this->belongsTo(Services::class, 'services_id');
}

}
