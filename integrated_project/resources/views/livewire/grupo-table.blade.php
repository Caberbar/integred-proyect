<div>
        <!-- Modal -->
        <div class="modal fade" id="GrupoModal" tabindex="-1" aria-labelledby="GrupoModalLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="GrupoModalLabel"> {{ $accion }} Grupo</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @error('denominacion')
                            <p class="alert alert-danger">Denominacion</p>
                        @enderror
                        <label for="">Denominacion</label>
                        <input type="text" required wire:model="denominacion">
                        @error('turno')
                            <p class="alert alert-danger">turno</p>
                        @enderror
                        <label for="">Turno</label>
                        <select wire:model="turno">
                            <option value="null">Seleccione un curso </option>
                            <option value="Mañana">Mañana</option>
                            <option value="Tarde">Tarde</option>
                        </select>
                        @error('curso_escolar')
                            <p class="alert alert-danger">curso_escolar</p>
                        @enderror
                        <label for="">Curso Escolar</label>
                        <input type="text" required wire:model="curso_escolar">
                        @error('curso')
                            <p class="alert alert-danger">curso</p>
                        @enderror
                        <label for="">Curso</label>
                        <select wire:model="curso">
                            <option value="null">Seleccione un curso </option>
                            <option value="1">1º</option>
                            <option value="2">2º</option>
                            <option value="3">3º</option>
                            <option value="4">4º</option>
                        </select>
                        @error('formacion_id')
                            <p class="alert alert-danger">formacion_id</p>
                        @enderror
                        <label for="">Formación</label>
                        <select wire:model="formacion_id">
                            <option value="null">Seleccione un curso </option>
                            @forelse ($formaciones as $formacion)
                                <option value="{{$formacion->id}}">{{$formacion->denominacion}}</option>
                            @empty
                                <option value=null>No hay formaciones registradas</option>
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
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#GrupoModal" wire:click='modal()'>
                                        Create group
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive dt-responsive">
                        @if ($grupos->isNotEmpty())

                        <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th wire:click="doSort('denominacion')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="denominacion" columnName="Denomination" /></th>
                                    <th wire:click="doSort('turno')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="turno" columnName="Turn" /></th>
                                    <th wire:click="doSort('curso_escolar')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="curso_escolar" columnName="School course" /></th>
                                    <th wire:click="doSort('curso')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="curso" columnName="Course" /></th>
                                    <th wire:click="doSort('formacion_denominacion')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="formacion_denominacion" columnName="Formation denomination" /></th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($grupos as $grupo)
                                <tr>
                                    <td>
                                        {{$grupo->denominacion}}
                                    </td>
                                    <td>
                                        {{$grupo->turno}}
                                    </td>
                                    <td>
                                        {{$grupo->curso_escolar}}
                                    </td>
                                    <td>
                                        {{$grupo->curso}}
                                    </td>
                                    <td>
                                        {{$grupo->formacion->denominacion}}
                                    </td>
                                    <td>
                                        <ul class="list-inline me-auto mb-0">
                                            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" aria-label="Edit" data-bs-original-title="Edit">
                                                <button class="btn btn-primary" wire:click="modal({{ $grupo->id }})" wire:loading.attr='disable' wire:target='modal'>
                                                    EDIT
                                                </button>
                                            </li>
                                            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" aria-label="Delete" data-bs-original-title="Delete">
                                                <button class="btn btn-primary" wire:click="delete({{ $grupo->id }})" wire:loading.attr='disable' wire:target='delete'>
                                                    DELETE
                                                </button>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @elseif($grupos->isEmpty() && $search != '')
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
                        <p>No groups found.</p>
                        @endif
                    </div>
                </div>
                <div class="card-header">
                    <div class="table-responsive dt-responsive">
                        <div id="dom-jqry_wrapper" class="dataTables_wrapper dt-bootstrap5">
                            <div class="row pagination-center">
                                <div class="col-sm-12 col-md-11">
                                    {{$grupos->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--
        AÑADIRLO A UN JS Y LINKEARLO NO DEJAR LA CHAPUZA ESTA
    -->
    <script>
        window.addEventListener('cerrar_modal', event => {
            document.getElementById('cerrar_modal').click();
        });
    </script>
</div>
