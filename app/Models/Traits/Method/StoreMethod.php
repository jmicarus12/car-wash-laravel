<?php

namespace App\Models\Traits\Method;

use Illuminate\Support\Collection;
use App\Models\Loan;
use Carbon\Carbon;

/**
 * Trait StoreMethod.
 */
trait StoreMethod
{
    /**
     * @param  bool  $size
     *
     * @return mixed|string
     * @throws \Creativeorange\Gravatar\Exceptions\InvalidEmailException
     */
    public function getAvatar($size = null)
    {
        $default = asset('img/store_default.png');

        return !$this->image ? $default : '/storage/store/' . $this->image;
    }

    /**
     * @param  bool  $size
     *
     * @return mixed|string
     * @throws \Creativeorange\Gravatar\Exceptions\InvalidEmailException
     */
    public function getAvatarThumb($size = null)
    {
        $default = asset('img/store_default.png');

        return !$this->image ? $default : '/storage/store/thumbnails/thumb_' . $this->image;
    }
}
