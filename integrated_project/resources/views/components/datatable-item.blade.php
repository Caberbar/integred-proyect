<div class="column-table-flex">
    {{$columnName}}
    @if ($sortColumn !== $columnNameVar)
        <x-heroicon-o-chevron-up-down class="icon-arrow-up"/>
    @elseif ($sortDirection === 'ASC')
        <x-heroicon-c-chevron-down class="icon-arrow-up" />
    @else
        <x-heroicon-c-chevron-up class="icon-arrow-up" />
    @endif
</div>