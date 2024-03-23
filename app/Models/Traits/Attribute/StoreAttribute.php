<?php

namespace App\Models\Traits\Attribute;

/**
 * Trait StoreAttribute.
 */
trait StoreAttribute
{
    /**
     * @return mixed
     */
    public function getAvatarAttribute()
    {
        return $this->getAvatar();
    }

    /**
     * @return mixed
     */
    public function getAvatarThumbAttribute()
    {
        return $this->getAvatarThumb();
    }
}
