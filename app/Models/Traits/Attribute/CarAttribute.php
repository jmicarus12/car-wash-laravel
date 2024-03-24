<?php

namespace App\Models\Traits\Attribute;

/**
 * Trait CarAttribute.
 */
trait CarAttribute
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
