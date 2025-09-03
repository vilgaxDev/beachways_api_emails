<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name', 
        'email',
        'phone',
        'company',
        'message',
        'package_type',
        'package_name',
        'package_price',
        'package_description',
        'contact_number',
        'submitted_at',
    ];

    // Disable mass assignment protection if needed (use with caution)
    // protected $guarded = [];

    protected $casts = [
        'submitted_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Accessor for full name
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    // Scope for filtering by package type
    public function scopeByPackageType($query, $packageType)
    {
        return $query->where('package_type', $packageType);
    }

    // Scope for recent submissions
    public function scopeRecent($query, $days = 7)
    {
        return $query->where('created_at', '>=', now()->subDays($days));
    }
}