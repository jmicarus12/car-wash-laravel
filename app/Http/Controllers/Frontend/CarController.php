<?php

namespace App\Http\Controllers\Frontend;

use App\Services\UserCarsService;
use Illuminate\Http\Request;
use App\Models\UserCar;
Use Auth;

/**
 * Class CarController.
 */
class CarController
{
    /** @var UserCarsService $userCarsService */
    protected $userCarsService;

    /**
     * StoreController constructor.
     * @param UserCarsService $userCarsService
     */
    public function __construct(UserCarsService $userCarsService){
        $this->userCarsService = $userCarsService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('frontend.cars.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('frontend.cars.create');
    }

    /**
     * @param UserCar $car
     *
     * @return mixed
     */
    public function show($carId)
    {
        $car = UserCar::find($carId);

        return view('frontend.cars.show', compact('car'));
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
            'car_name' => ['required', 'max:255']
        ], [
            'car_name.required' => 'Car name is required'
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        $this->userCarsService->store($data);

        return redirect()->route('frontend.cars.index')->withFlashSuccess(__('The new car was successfully created.'));
    }
}
