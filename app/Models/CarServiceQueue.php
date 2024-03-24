<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domains\Auth\Models\User;

class CarServiceQueue extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_car_id',
        'car_wash_service_id',
        'status'
    ];

    /**
     * Get the car that belongs to this booking.
     */
    public function car()
    {
        return $this->belongsTo(UserCar::class, 'user_car_id', 'id');
    }

    /**
     * Get the car that belongs to this booking.
     */
    public function service()
    {
        return $this->belongsTo(CarWashService::class, 'car_wash_service_id', 'id');
    }
}
