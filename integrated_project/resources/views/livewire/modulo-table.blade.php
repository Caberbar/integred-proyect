<div>
    <!-- Modal -->
    <div class="modal fade" id="ModuloModal" tabindex="-1" aria-labelledby="ModuloModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ModuloModalLabel"> {{$accion}} Formacion</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"  id='cerrar_modal'></button>
                </div>
                <div class="modal-body">
                    @error('horas')
                        <p>{{$message}}</p>
                    @enderror
                    <label for="">Horas</label>
                    <input type="number" required wire:model="horas">
                    @error('denominacion')
                        <p>{{$message}}</p>
                    @enderror
                    <label for="">Denominacion</label>
                    <input type="text" required wire:model="denominacion">
                    @error('especialidad')
                        <p>{{$message}}</p>
                    @enderror
                    <label for="">Especialidad</label>
                    <select wire:model="especialidad">
                        <option value="null">Seleccione una especialidad </option>
                        <option value='secundaria'>Secundaria</option>
                        <option value='formacion profesional'>Formacion profesional</option>
                    </select>
                    @error('siglas')
                        <p>{{$message}}</p>
                    @enderror
                    <label for="">Siglas</label>
                    <input type="text" required wire:model="siglas">

                    @error('curso')
                        <p>{{$message}}</p>
                    @enderror
                    <label for="">Curso</label>
                    <select wire:model="curso">
                        <option value="null">Seleccione un curso </option>
                        <option value='1'>1º</option>
                        <option value='2'>2º</option>
                        <option value='3'>3º</option>
                        <option value='4'>4º</option>
                    </select>

                    @error('formacion_id')
                        <p>{{$message}}</p>
                    @enderror
                    <label for="">Formacion</label>
                    <select wire:model="formacion_id">
                        <option value="null">Seleccione una formacion</option>
                        @forelse ($formaciones as $formacion)
                            <option value='{{ $formacion->id }}'>{{$formacion->denominacion}}</option>
                        @empty
                            <option>No hay formaciones registradas</option>
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
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#ModuloModal" wire:click='modal()'>
                                        Create teacher
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive dt-responsive">
                    @if ($modulos->isNotEmpty())
                        <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th wire:click="doSort('denominacion')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="denominacion" columnName="Denomination" /></th>
                                    <th wire:click="doSort('especialidad')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="especialidad" columnName="Speciality" /></th>
                                    <th wire:click="doSort('siglas')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="siglas" columnName="Acronym" /></th>
                                    <th wire:click="doSort('curso')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="curso" columnName="Cours" /></th>
                                    <th wire:click="doSort('horas')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="horas" columnName="Hours" /></th>
                                    <th wire:click="doSort('formacion_siglas')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="formacion_siglas" columnName="Acronym" /></th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($modulos as $modulo)
                                <tr>
                                    <td>{{ $modulo->denominacion }}</td>
                                    <td>{{ $modulo->especialidad }}</td>
                                    <td>{{ $modulo->siglas }}</td>
                                    <td>{{ $modulo->curso }}</td>
                                    <td>{{ $modulo->horas }}</td>
                                    <td>{{ $modulo->formacion->siglas}}</td>
                                    <td>
                                        <ul class="list-inline me-auto mb-0">
                                            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" aria-label="Edit" data-bs-original-title="Edit">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModuloModal" wire:click="modal({{ $modulo->id }})">
                                                    EDIT
                                                </button>
                                            </li>
                                            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" aria-label="Delete" data-bs-original-title="Delete">
                                                <button class="btn btn-primary" wire:click="delete({{ $modulo->id }})" wire:loading.attr='disable' wire:target='delete'>
                                                    DELETE
                                                </button>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @elseif($modulos->isEmpty() && $search != '')
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
                        <p>No modules found.</p>
                        @endif
                    </div>
                </div>
                <div class="card-header">
                    <div class="table-responsive dt-responsive">
                        <div id="dom-jqry_wrapper" class="dataTables_wrapper dt-bootstrap5">
                            <div class="row pagination-center">
                                <div class="col-sm-12 col-md-11">
                                    {{$modulos->links()}}
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
