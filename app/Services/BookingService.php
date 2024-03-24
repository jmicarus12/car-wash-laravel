<?php

namespace App\Services;

use App\Models\CarServiceQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use Carbon\Carbon;
use Exception;
use Throwable;
use Auth;

/**
 * Class BookingService.
 */
class BookingService extends BaseService
{
    public function __construct(CarServiceQueue $queue)
    {
        $this->model = $queue;
    }

    /**
     * @param array $data
     *
     * @return CarServiceQueue
     * @throws GeneralException
     * @throws Throwable
     */
    public function store(array $data = []): CarServiceQueue
    {
        try {
            DB::beginTransaction();
            $queue = $this->model::create($data);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating this booking. Please try again.'));
        }

        DB::commit();

        return $queue;
    }

    /**
     * @param CarServiceQueue $car
     * @param array   $data
     *
     * @return void
     * @throws Throwable
     */
    public function update(array $data = []): CarServiceQueue
    {
        DB::beginTransaction();

        try {
            $queue->update([
               'status' => $data['status']
           ]);

        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating this booking. Please try again.'));
        }

        DB::commit();

        return $queue;
    }
}
