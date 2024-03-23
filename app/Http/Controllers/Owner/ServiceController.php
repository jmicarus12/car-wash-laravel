<?php

namespace App\Http\Controllers\Owner;

/**
 * Class ServiceController.
 */
class ServiceController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('owner.services.index');
    }
}
