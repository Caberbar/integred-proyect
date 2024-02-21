<li class="dropdown pc-h-item">
    <a class="pc-head-link dropdown-toggle arrow-none m-0 trig-drp-search" data-bs-auto-close="outside" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
    <svg class="pc-icon">
        <use xlink:href="#custom-search-normal-1"></use>
    </svg>
    </a>
    <div wire:ignore.self class="dropdown-menu pc-h-dropdown drp-search" style="">
        <form class="px-3 py-2">
            <input type="text" wire:model.live="searchG" class="form-control border-0 shadow-none" placeholder="Search here..."><a class="pc-head-link dropdown-toggle arrow-none m-0 trig-drp-search" data-bs-auto-close="outside" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
    <svg class="pc-icon">
        <use xlink:href="#custom-search-normal-1"></use>
    </svg>
    </a>
            @if(!empty($searchG))
                @if($searchResults['profesores']->isEmpty() && $searchResults['modulos']->isEmpty() && $searchResults['grupos']->isEmpty())
                    <p>No se encontraron resultados</p>
                @else
                    @foreach($searchResults as $entity => $results)
                        @if($results->isNotEmpty())
                            <h2>{{ ucfirst($entity) }}</h2>
                            <ul>
                                @foreach($results as $result)
                                <li>
                                    @if($entity === 'profesores')
                                        {{ $result->nombre }} {{ $result->apellido1 }} {{ $result->apellido2 }}
                                    @elseif($entity === 'modulos')
                                        {{ $result->denominacion }} ({{ $result->siglas }})
                                    @elseif($entity === 'grupos')
                                        {{ $result->denominacion }} {{ $result->turno }} ({{ $result->curso_escolar }})
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        @endif
                    @endforeach
                @endif
            @endif
        </form>
    </div>
</li>