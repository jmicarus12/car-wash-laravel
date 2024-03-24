<?php

namespace App\Http\Controllers\Frontend;

use App\Services\BookingService;
use Illuminate\Http\Request;
use App\Models\UserCar;
use App\Models\CarWashStore;
Use Auth;

/**
 * Class BookingController.
 */
class BookingController
{
    /** @var BookingService $bookingService */
    protected $bookingService;

    /**
     * StoreController constructor.
     * @param BookingService $bookingService
     */
    public function __construct(BookingService $bookingService){
        $this->bookingService = $bookingService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('frontend.bookings.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $stores = CarWashStore::all();

        return view('frontend.bookings.create', compact(['stores']));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show()
    {
        return view('frontend.bookings.index');
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
            'car_wash_service_id' => ['required'],
            'user_car_id' => ['required']
        ], [
            'car_wash_service_id.required' => 'Store Service is required.',
            'user_car_id.required' => 'Car is required.'
        ]);

        $data = $request->all();
        $this->bookingService->store($data);

        return redirect()->route('frontend.bookings.index')->withFlashSuccess(__('The new car was successfully created.'));
    }

    public function getStoreServices(Request $request)
    {
        if($request->ajax()) {
            $data = $request->all();
            $store = CarWashStore::find($data['store_id']);

            return [
                'store' => $store,
                'services' => $store->services
            ];
        }

        return redirect(route('frontend.bookings.index'));
    }
}
