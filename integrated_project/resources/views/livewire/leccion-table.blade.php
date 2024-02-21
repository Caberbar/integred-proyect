<div>
    <div class="row">
        <!-- DOM/Jquery table start -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="table-responsive dt-responsive">
                        <div id="dom-jqry_wrapper" class="dataTables_wrapper dt-bootstrap5">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_length" id="dom-jqry_length">
                                        <label>Show&nbsp;
                                            <select name="dom-jqry_length" aria-controls="dom-jqry" class="form-select form-select-sm" wire:model.live="perPage">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>&nbsp; entries
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div id="dom-jqry_filter" class="dataTables_filter"><label>Search:<input type="search" wire:model.live.debounce.300ms="search" class="form-control form-control-sm" placeholder="" aria-controls="dom-jqry"></label></div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <a href="{{route('lecciones.create')}}" class="btn btn-primary d-inline-flex align-item-center">
                                        <i class="ti ti-plus f-18"></i> Add Lesson
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive dt-responsive">
                        @if ($modulos != null)
                        <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th wire:click="doSort('horas')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="horas" columnName="Hours" /></th>
                                    <th wire:click="doSort('teachers')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="teachers" columnName="Teachers" /></th>
                                    <th wire:click="doSort('modulo')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="modulo" columnName="Module" /></th>
                                    <th wire:click="doSort('grupo')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="grupo" columnName="Group" /></th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lecciones as $leccion)
                                <tr>
                                    <td>
                                        {{ $leccion->horas }}
                                    </td>
                                    <td>
                                        {{ $leccion->profesor->nombre }}
                                    </td>
                                    <td>
                                        {{ $leccion->modulo->denominacion }}
                                    </td>
                                    <td>
                                        {{ $leccion->grupo->denominacion }}
                                    </td>
                                    <td>
                                        <ul class="list-inline me-auto mb-0">
                                            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" aria-label="Edit" data-bs-original-title="Edit">
                                                <a href="#" class="avtar avtar-xs btn-link-success btn-pc-default" wire:click="edit({{ $leccion->id }})" data-bs-toggle="modal" data-bs-target="#customer-edit_add-modal">
                                                    <i class="ti ti-edit-circle f-18"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" aria-label="Delete" data-bs-original-title="Delete">
                                                <a href="#" class="avtar avtar-xs btn-link-danger btn-pc-default" wire:click="delete({{ $leccion->id }})">
                                                    <i class="ti ti-trash f-18"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-header">
                    <div class="table-responsive dt-responsive">
                        <div id="dom-jqry_wrapper" class="dataTables_wrapper dt-bootstrap5">
                            <div class="row pagination-center">
                                <div class="col-sm-12 col-md-11">
                                    {{$lecciones->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- QUITAR CUANDO ESTE VENTANA MODAL -->
        <form wire:submit.prevent="update" style="display: none;">
            <input type="hidden" wire:model="leccion_id">

            <label for="">Escoja Profesor</label>
            <select wire:model="profesor_id">
                @forelse ($profesores as $profesor)
                <option value="{{$profesor->id}}">{{$profesor->nombre }}{{$profesor->apellido1}}</option>
                @empty
                <option value=null>No hay profesores churra</option>
                @endforelse
            </select>

            <label for="">Escoja Modulo</label>
            <select wire:model="modulo_id">
                @forelse ($modulos as $modulo)
                <option value="{{$modulo->id}}">{{$modulo->denominacion }}</option>
                @empty
                <option value=null>No hay modulos churra</option>
                @endforelse
            </select>

            <label for="">Escoja Grupo</label>
            <select wire:model="grupo_id">
                @forelse ($grupos as $grupo)
                <option value="{{$grupo->id}}">{{$grupo->denominacion }}</option>
                @empty
                <option value=null>No hay grupo churra</option>
                @endforelse
            </select>
            <button type="submit">Update</button>
        </form>
        <!-- QUITAR CUANDO ESTE VENTANA MODAL -->

        @else
        <p>No lessons register yet...</p>
        @endif
    </div>
</div>