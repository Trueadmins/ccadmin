<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CompanyCourierService extends Model
{
    use HasFactory;
    protected $table = 'company_courier_services';
    protected $fillable = [
        'company_courier_id',
        'service_name',
        'service_code',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function companyCourier(): BelongsTo
    {
        return $this->belongsTo(CompanyCourier::class, 'company_courier_id');
    }
}
