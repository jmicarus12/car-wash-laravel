<x-livewire-tables::bs4.table.cell>
    <img src="{!! $row->avatar !!}" alt="" class="avatar-preview">
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {!! $row->car_name !!}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {!! $row->active !!}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{-- @include('owner.services.includes.actions', ['model' => $row]) --}}
</x-livewire-tables::bs4.table.cell>
