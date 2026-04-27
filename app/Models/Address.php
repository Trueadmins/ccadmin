<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'addresses';
    protected $primaryKey = 'id';
    protected $fillable = [
        'company_id',
        'type',
        'title',
        'address_line1',
        'address_line2',
        'address_line3',
        'city',
        'state',
        'postcode',
        'country_code',
        'is_default',
        'contact_name',
        'phone',
        'email',
    ];

    protected $casts = [
        'is_default' => 'boolean',
    ];
}
