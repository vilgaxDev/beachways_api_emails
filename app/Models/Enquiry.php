<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasUuids;

    protected $fillable = [
        'property_id',
        'property_title',
        'property_url',
        'customer_name',
        'customer_email',
        'customer_phone',
        'message',
        'status',
        'reply',
    ];
}
