<x-livewire-tables::bs4.table.cell>
    {!! $row->service->store->store_name !!}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {!! $row->service->service_name !!}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {!! $row->car->car_name !!}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {!! $row->status !!}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{-- @include('owner.services.includes.actions', ['model' => $row]) --}}
</x-livewire-tables::bs4.table.cell>
