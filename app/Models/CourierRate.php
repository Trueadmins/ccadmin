<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourierRate extends Model
{
    use HasFactory;
    protected $table = 'courier_rates';
    protected $fillable = [
        'company_courier_service_id',
        'country_id',
        'parcel_type',
        'weight_from',
        'weight_to',
        'rate',
    ];

    protected $casts = [
        'weight_from' => 'float',
        'weight_to' => 'float',
        'rate' => 'float',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
