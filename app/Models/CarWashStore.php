<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Attribute\StoreAttribute;
use App\Models\Traits\Method\StoreMethod;
use App\Domains\Auth\Models\User;

class CarWashStore extends Model
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
        'owner_id',
        'latitude',
        'longitude',
        'store_name'
    ];

    /**
     * @var array
     */
    protected $appends = [
        'avatar',
        'avatar_thumb'
    ];

    /**
     * Get the user that owns the store.
     */
    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
