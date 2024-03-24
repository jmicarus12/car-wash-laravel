<?php

namespace App\Http\Livewire\Frontend;

use App\Models\CarServiceQueue;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class BookingTable.
 */
class BookingTable extends DataTableComponent
{
    /**
     * @var string
     */
    public $sortField = 'created_at';

    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return CarServiceQueue::with('service', 'car')->orderBy('created_at', 'desc');
    }

    /**
     * @return array
     */
    public function columns(): array
    {
        return [
            Column::make(__('Store')),
            Column::make(__('Service')),
            Column::make(__('Car')),
            Column::make(__('Status')),
            Column::make(__('Actions'))
        ];
    }

    /**
     * @return string
     */
    public function rowView(): string
    {
        return 'frontend.bookings.includes.row';
    }
}
