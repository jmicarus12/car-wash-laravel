<x-livewire-tables::bs4.table.cell>
    {!! $row->service_name !!}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {!! $row->active !!}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @include('owner.services.includes.actions', ['model' => $row])
</x-livewire-tables::bs4.table.cell>
