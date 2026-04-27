<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shipment extends Model
{
    use HasFactory, softDeletes;
    protected $table = 'shipments';
    protected $primaryKey = 'id';
    protected $fillable = [
        'company_id',
        'user_id',
        'pickup_address_id',
        'delivery_address_json',
        'destination_country',
        'company_courier_service_id',
        'service_name',
        'total_weight',
        'total_amount',
        'status',
        'reference',
        'tracking_number',
        'notes'
    ];

    protected $casts = [
        'delivery_address_json' => 'array',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function boxes(): HasMany
    {
        return $this->hasMany(ShipmentBox::class);
    }
}
