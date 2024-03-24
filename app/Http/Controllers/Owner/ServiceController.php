<?php

namespace App\Http\Controllers\Owner;

use App\Services\CarServicesService;
use Illuminate\Http\Request;
Use Auth;

/**
 * Class ServiceController.
 */
class ServiceController
{
    /** @var CarServicesService $carServicesService */
    protected $carServicesService;

    /**
     * StoreController constructor.
     * @param CarServicesService $carServicesService
     */
    public function __construct(CarServicesService $carServicesService){
        $this->carServicesService = $carServicesService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('owner.services.index');
    }
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('owner.services.create');
    }

    /**
     * @param  Request  $request
     *
     * @return mixed
     * @throws GeneralException
     * @throws Throwable
     */
    public function store(Request $request)
    {
        $request->validate([
            'service_name' => ['required', 'max:255']
        ], [
            'service_name.required' => 'Service Name is required'
        ]);

        $data = $request->all();
        $data['car_wash_store_id'] = Auth::user()->store->id;

        $this->carServicesService->store($data);

        return redirect()->route('owner.services.index')->withFlashSuccess(__('The new service was successfully created.'));
    }
}
