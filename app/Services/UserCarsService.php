<?php

namespace App\Services;

use App\Models\UserCar;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use Carbon\Carbon;
use Exception;
use Throwable;
use Auth;

/**
 * Class UserCarsService.
 */
class UserCarsService extends BaseService
{
    /** @const $avatarPath */
    const PROFILE_IMAGE = 'car';

    /** @var ImageService $imageService */
    protected $imageService;

    public function __construct(UserCar $car, ImageService $imageService)
    {
        $this->model = $car;
        $this->imageService = $imageService;
    }

    /**
     * @param array $data
     *
     * @return UserCar
     * @throws GeneralException
     * @throws Throwable
     */
    public function store(array $data = []): UserCar
    {
        try {
            DB::beginTransaction();
            $car = $this->model::create($data);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating this car. Please try again.'));
        }

        $upload = $this->uploadAvatar($data, $car->id);

        if (!$upload['error']) {
            $car->image = $upload['name'];
            $car->save();
        }

        DB::commit();

        return $car;
    }

    /**
     * @param UserCar $car
     * @param array   $data
     *
     * @return void
     * @throws Throwable
     */
    public function update(array $data = []): UserCar
    {
        DB::beginTransaction();

        try {
            $car->update([
               'car_name' => $data['car_name']
           ]);

        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating this car. Please try again.'));
        }

        DB::commit();

        return $car;
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
