<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Attribute\StoreAttribute;
use App\Models\Traits\Method\StoreMethod;

class CarWashService extends Model
{
    use HasFactory,
    StoreAttribute,
    StoreMethod;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'car_wash_store_id',
        'service_name',
        'active'
    ];

    protected $with = ['store'];

    /**
     * Get the user that owns the store.
     */
    public function store()
    {
        return $this->belongsTo(CarWashStore::class, 'car_wash_store_id', 'id');
    }
}
