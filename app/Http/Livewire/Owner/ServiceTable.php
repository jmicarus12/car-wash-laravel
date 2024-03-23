<?php

namespace App\Http\Livewire\Owner;

use App\Models\CarWashService;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class ServiceTable.
 */
class ServiceTable extends DataTableComponent
{
    /**
     * @var string
     */
    public $sortField = 'title';

    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return CarWashService::where('active', 'yes')->orderBy('id', 'asc');
    }

    /**
     * @return array
     */
    public function columns(): array
    {
        return [
            Column::make(__('Service'), 'service_name')
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
        return 'owner.services.includes.row';
}
}
