<?php

namespace App\Services;

use App\Models\CarWashService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use Carbon\Carbon;
use Exception;
use Throwable;
use Auth;

/**
 * Class CarServicesService.
 */
class CarServicesService extends BaseService
{
    public function __construct(CarWashService $service)
    {
        $this->model = $service;
    }

    /**
     * @param array $data
     *
     * @return CarWashService
     * @throws GeneralException
     * @throws Throwable
     */
    public function store(array $data = []): CarWashService
    {
        try {
            DB::beginTransaction();
            $service = $this->model::create($data);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating this services. Please try again.'));
        }

        DB::commit();

        return $service;
    }

    /**
     * @param CarWashService $service
     * @param array   $data
     *
     * @return void
     * @throws Throwable
     */
    public function update(array $data = []): CarWashService
    {
        DB::beginTransaction();

        try {
            $service->update([
               'service_name' => $data['store_name']
           ]);

        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating this service. Please try again.'));
        }

        DB::commit();

        return $service;
    }
}
