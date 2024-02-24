<div>
     <!-- Modal -->
     <div class="modal fade" id="LeccionModal" tabindex="-1" aria-labelledby="LeccionModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="LeccionModalLabel"> {{ $accion }} Leccion</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @error('horas')
                        <p class="alert alert-danger">Las horas no es valido</p>
                    @enderror
                    <label for="">Cantidad de horas</label>
                    <input type="number" wire:model="horas" required>

                    @error('profesor_id')
                        <p class="alert alert-danger">El profesor no es valido</p>
                    @enderror
                    <label for="">Escoja Profesor</label>
                    <select wire:model='profesor_id'>
                        <option value="null">Seleccione un profesor </option>
                        @forelse ($profesores as $profesor)
                            <option value={{$profesor->id}}>{{$profesor->nombre}}</option>
                        @empty
                            <option value="null">No hay profesores</option>
                        @endforelse
                    </select>
                    @error('modulo_id')
                        <p class="alert alert-danger">El modulo no es valido</p>
                    @enderror
                    <label for="">Escoja Modulo</label>
                    <select wire:model='modulo_id'>
                        <option value="null">Seleccione un modulo </option>
                        @forelse ($modulos as $modulo)
                            <option value={{$modulo->id}}>{{$modulo->denominacion}}</option>
                        @empty
                            <option value="null">No hay modulos</option>
                        @endforelse
                    </select>
                    @error('grupo_id')
                        <p class="alert alert-danger">El grupo no es valido</p>
                    @enderror
                    <label for="">Escoja Grupo</label>
                    <select wire:model='grupo_id'>
                        <option value="null">Seleccione un grupo </option>
                        @forelse ($grupos as $grupo)
                            <option value={{$grupo->id}}>{{$grupo->denominacion}}</option>
                        @empty
                            <option value="null">No hay grupos</option>
                        @endforelse
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id='cerrar_modal'>CLOSE</button>
                    <button type="button" class="btn btn-primary" wire:click='save' wire:loading.attr='disable' wire:target='save'> {{ $accion }} Changes</button>
                </div>
            </div>
        </div>
    </div>
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
                                     <!-- BOTON VENTANA MODAL -->
                                     <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#LeccionModal" wire:click='modal()'>
                                        Create leccion
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive dt-responsive">
                        @if ($lecciones->isNotEmpty())
                        <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th wire:click="doSort('horas')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="horas" columnName="Hours" /></th>
                                    <th wire:click="doSort('profesor_nombre')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="profesor_nombre" columnName="Teachers" /></th>
                                    <th wire:click="doSort('modulo_nombre')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="modulo_nombre" columnName="Module" /></th>
                                    <th wire:click="doSort('grupo_nombre')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="grupo_nombre" columnName="Group" /></th>
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
                                                <button class="btn btn-primary" wire:click="modal({{ $leccion->id }})" data-bs-toggle="modal" data-bs-target="#LeccionModal">
                                                    EDIT
                                                </button>
                                            </li>
                                            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" aria-label="Delete" data-bs-original-title="Delete">
                                                <button class="btn btn-primary" wire:click="delete({{ $leccion->id }})" wire:loading.attr='disable' wire:target='delete'>
                                                    DELETE
                                                </button>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @elseif($lecciones->isEmpty() && $search != '')
                        <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th wire:click="doSort('usu_seneca')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="usu_seneca" columnName="Seneca User" /></th>
                                    <th wire:click="doSort('nombre')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="nombre" columnName="Name" /></th>
                                    <th wire:click="doSort('apellido1')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="apellido1" columnName="First Name" /></th>
                                    <th wire:click="doSort('apellido2')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="apellido2" columnName="Last Name" /></th>
                                    <th wire:click="doSort('especialidad')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="especialidad" columnName="Speciality" /></th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="6">No results found.</td>
                                </tr>
                            </tbody>
                        </table>
                        @else
                        <p>No lessons found.</p>
                        @endif
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
    </div>
    <script>
        window.addEventListener('cerrar_modal', event => {
            document.getElementById('cerrar_modal').click();
        });
    </script>
</div>
