<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageServices extends Model
{
    use HasFactory;

    protected $table = 'package_services';

    protected $fillable = [
        'package_id',
        'service_id',
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function service()
    {
        return $this->belongsTo(Services::class);
    }
}
