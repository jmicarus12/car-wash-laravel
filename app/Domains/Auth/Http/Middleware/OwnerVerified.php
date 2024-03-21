<?php

namespace App\Domains\Auth\Http\Middleware;

use App\Domains\Auth\Models\User;
use Closure;

/**
 * Class OwnerVerified.
 */
class OwnerVerified
{
    /**
     * @param $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user() && $request->user()->isVerified()) {
            return $next($request);
        }

        return redirect()->route('owner.verification.notice')->withFlashInfo(__('Your email needs to be verified.'));
    }
}
