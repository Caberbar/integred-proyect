<div>
    <!-- Modal -->
    <div class="modal fade" id="LeccionModal" tabindex="-1" aria-labelledby="LeccionModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="LeccionModalLabel"> {{ $accion }} Lesson</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="horas" class="col-form-label">Hours:</label>
                        <input type="number" class="form-control" required wire:model="horas" id="horas">
                        <p class="error" id="error_horas">The hours isn´t valid.</p>
                        @error('horas')
                        <p class="alert alert-danger">The hours isn´t valid.</p>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="profesor_id" class="col-form-label">Teacher:</label>
                        <select class="form-control" wire:model="profesor_id" id="profesor_id" required="" aria-describedby="bouncer-error_select" aria-invalid="true">
                            <option value="null">Select any teacher</option>
                            @forelse ($profesores as $profesor)
                            <option value={{$profesor->id}}>{{$profesor->nombre}}&nbsp;{{$profesor->apellido1}}&nbsp;{{$profesor->apellido2}}</option>
                            @empty
                            <option value="null">No teacher register yet...</option>
                            @endforelse
                        </select>
                        <p class="error" id="error_profesor_id">Select a speciality.</p>
                        @error('profesor_id')
                        <p class="alert alert-danger">The teacher isn´t valid.</p>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="modulo_id" class="col-form-label">Module:</label>
                        <select class="form-control" wire:model="modulo_id" id="modulo_id" required="" aria-describedby="bouncer-error_select" aria-invalid="true">
                            <option value="null">Select any module</option>
                            @forelse ($modulos as $modulo)
                            <option value={{$modulo->id}}>{{$modulo->denominacion}}</option>
                            @empty
                            <option value="null">No modules register yet...</option>
                            @endforelse
                        </select>
                        <p class="error" id="error_modulo_id">Select a speciality.</p>
                        @error('modulo_id')
                        <p class="alert alert-danger">>The module isn´t valid.</p>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="grupo_id" class="col-form-label">Group:</label>
                        <select class="form-control" wire:model="grupo_id" id="grupo_id" required="" aria-describedby="bouncer-error_select" aria-invalid="true">
                            <option value="null">Select any group </option>
                            @forelse ($grupos as $grupo)
                            <option value={{$grupo->id}}>{{$grupo->denominacion}}</option>
                            @empty
                            <option value="null">No group register yet...</option>
                            @endforelse
                        </select>
                        <p class="error" id="error_grupo_id">Select a speciality.</p>
                        @error('grupo_id')
                        <p class="alert alert-danger">The group isn´t valid</p>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id='cerrar_modal'>Close</button>
                    <button type="button" class="btn btn-primary" wire:click='save' wire:loading.attr='disable' wire:target='save'> {{ $accion }}</button>
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
                            @auth
                            @if(auth()->user()->roles->contains('id', 1))
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <!-- BOTON VENTANA MODAL -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#LeccionModal" wire:click='modal()'>
                                        Create lesson
                                    </button>
                                </div>
                            </div>
                            @endif
                            @endauth
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
                                    @auth
                                    @if(auth()->user()->roles->contains('id', 1))
                                    <th>Actions</th>
                                    @endif
                                    @endauth
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
                                    @auth
                                    @if(auth()->user()->roles->contains('id', 1))
                                    <td>
                                        <ul class="list-inline me-auto mb-0">
                                            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                <a href="#" class="avtar avtar-xs btn-link-success btn-pc-default" data-bs-toggle="modal" data-bs-target="#LeccionModal" wire:click="modal({{ $leccion->id }})">
                                                    <i class="ti ti-edit-circle f-18"></i>
                                                </a>
                                            </li>

                                            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                <a href="#" onclick="return false;" class="avtar avtar-xs btn-link-danger btn-pc-default" wire:click="delete({{ $leccion->id }})" wire:loading.attr='disable' wire:target='delete'>
                                                    <i class="ti ti-trash f-18"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                    @endif
                                    @endauth
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @elseif($lecciones->isEmpty() && $search != '')
                        <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th wire:click="doSort('horas')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="horas" columnName="Hours" /></th>
                                    <th wire:click="doSort('profesor_nombre')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="profesor_nombre" columnName="Teachers" /></th>
                                    <th wire:click="doSort('modulo_nombre')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="modulo_nombre" columnName="Module" /></th>
                                    <th wire:click="doSort('grupo_nombre')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="grupo_nombre" columnName="Group" /></th>
                                    @auth
                                    @if(auth()->user()->roles->contains('id', 1))
                                    <th>Actions</th>
                                    @endif
                                    @endauth
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