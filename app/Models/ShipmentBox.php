<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShipmentBox extends Model
{
    use HasFactory;
    protected $table = 'shipment_boxes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'shipment_id',
        'parcel_type',
        'actual_weight',
        'length',
        'width',
        'height',
        'volumetric_weight',
        'chargeable_weight',
        'quantity',
        'sequence',
        'description',
    ];

    public function shipment(): BelongsTo
    {
        return $this->belongsTo(Shipment::class);
    }
}
