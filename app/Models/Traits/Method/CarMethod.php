<?php

namespace App\Models\Traits\Method;

use Illuminate\Support\Collection;
use App\Models\Loan;
use Carbon\Carbon;

/**
 * Trait CarMethod.
 */
trait CarMethod
{
    /**
     * @param  bool  $size
     *
     * @return mixed|string
     * @throws \Creativeorange\Gravatar\Exceptions\InvalidEmailException
     */
    public function getAvatar($size = null)
    {
        $default = asset('img/car_default.png');

        return !$this->image ? $default : '/storage/car/' . $this->image;
    }

    /**
     * @param  bool  $size
     *
     * @return mixed|string
     * @throws \Creativeorange\Gravatar\Exceptions\InvalidEmailException
     */
    public function getAvatarThumb($size = null)
    {
        $default = asset('img/car_default.png');

        return !$this->image ? $default : '/storage/car/thumbnails/thumb_' . $this->image;
    }
}
