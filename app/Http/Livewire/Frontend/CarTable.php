<?php

namespace App\Http\Livewire\Frontend;

use App\Models\UserCar;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class CarTable.
 */
class CarTable extends DataTableComponent
{
    /**
     * @var string
     */
    public $sortField = 'car_name';
    public $user_id = null;

    public function mount($userId) : void
    {
        $this->user_id = $userId;
    }

    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return UserCar::where('user_id', $this->user_id)->where('active', 1)->orderBy('id', 'asc');
    }

    /**
     * @return array
     */
    public function columns(): array
    {
        return [
            Column::make(__('Avatar')),
            Column::make(__('Name'), 'car_name')
                ->searchable()
                ->sortable(),
            Column::make(__('Active'), 'active')
                ->searchable()
                ->sortable(),
            Column::make(__('Actions'))
        ];
    }

    /**
     * @return string
     */
    public function rowView(): string
    {
        return 'frontend.cars.includes.row';
    }
}
