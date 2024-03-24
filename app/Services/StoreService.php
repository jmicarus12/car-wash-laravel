<?php

namespace App\Services;

use App\Models\CarWashStore;
use App\Services\ImageService;
use App\Services\CarServicesService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use Carbon\Carbon;
use Exception;
use Throwable;
use Auth;

/**
 * Class StoreService.
 */
class StoreService extends BaseService
{
    /** @const $avatarPath */
    const PROFILE_IMAGE = 'store';

    /** @var ImageService $imageService */
    protected $imageService;

    /** @var CarServicesService $carWashService */
    protected $carWashService;

    /**
     * StoreService constructor.
     * @param CarWashStore $collection
     */
    public function __construct(CarWashStore $store, ImageService $imageService, CarServicesService $carWashService)
    {
        $this->model = $store;
        $this->imageService   = $imageService;
        $this->carWashService = $carWashService;
    }

    /**
     * @param array $data
     *
     * @return CarWashStore
     * @throws GeneralException
     * @throws Throwable
     */
    public function store(array $data = []): CarWashStore
    {
        try {
            DB::beginTransaction();
            $data['owner_id'] = Auth::user()->id;
            $store = $this->model::create($data);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating this store. Please try again.'));
        }

        $upload = $this->uploadAvatar($data, $store->id);

        if (!$upload['error']) {
            $store->image = $upload['name'];
            $store->save();
        }

        //Create Initial Service
        $serviceData = [
            'car_wash_store_id' => $store->id,
            'service_name'      => 'Carwash'
        ];

        $this->carWashService->store($serviceData);

        DB::commit();

        return $store;
    }

    /**
     * @param CarWashStore $store
     * @param array   $data
     *
     * @return void
     * @throws Throwable
     */
    public function update(array $data = []): CarWashStore
    {
        DB::beginTransaction();

        $store = $this->model->find($data['id']);
        try {
            $store->update([
               'store_name' => $data['store_name'],
               'latitude'  => $data['latitude'],
               'longitude'  => $data['longitude'],
               'address'    => $data['address']
           ]);

           $upload = $this->uploadAvatar($data, $store->id);
   
           if (!$upload['error']) {
               $store->image = $upload['name'];
               $store->save();
           }

        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating this store. Please try again.'));
        }

        DB::commit();

        return $store;
    }

    /**
     * Upload profile image of guard
     *
     * @param array $data
     * @param string $name
     *
     * @return array
     */
    protected function uploadAvatar(array $data = [], $name = null)
    {
        $response = ['error' => true, 'name' => null];

        if (isset($data['avatar'])) {

            $image = $this->imageService->resizeImage($data['avatar'], self::PROFILE_IMAGE , $name, true);

            $response['name'] = $image['name'];
            $response['error'] = $image['error'];
        }
        return $response;
    }
}
