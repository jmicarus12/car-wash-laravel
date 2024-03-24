<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Attribute\CarAttribute;
use App\Models\Traits\Method\CarMethod;
use App\Domains\Auth\Models\User;

class UserCar extends Model
{
    use HasFactory,
    CarAttribute,
    CarMethod;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'car_name',
        'image',
        'active'
    ];

    /**
     * @var array
     */
    protected $appends = [
        'avatar',
        'avatar_thumb'
    ];

    /**
     * Get the user that owns the car.
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
