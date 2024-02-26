<div>
    <!-- Modal -->
    <div class="modal fade" id="FormacionModal" tabindex="-1" aria-labelledby="FormacionModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="FormacionModalLabel"> {{ $accion }} Teacher</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @error('usu_seneca')
                        <p>
                            The user of seneca formad isn´t valid
                        </p>
                    @enderror
                    <label for="">Seneca User</label>
                    <input type="text" required wire:model="usu_seneca">
                    @error('nombre')
                        <p>
                            The named formad isn´t valid
                        </p>
                    @enderror
                    <label for="">Name</label>
                    <input type="text" required wire:model="nombre">
                    @error('apellido1')
                        <p>
                            The first name formad isn´t valid
                        </p>
                    @enderror
                    <label for="">First Name</label>
                    <input type="text" required wire:model="apellido1">

                    @error('apellido2')
                        <p>
                            The last name formad isn´t valid
                        </p>
                    @enderror
                    <label for="">Last Name</label>
                    <input type="text" required wire:model="apellido2">

                    @error('especialidad')
                        <p>
                            The speciality formad isn´t valid
                        </p>
                    @enderror
                    <label for="">Speciality</label>
                    <select wire:model="especialidad">
                        <option value="null">Select a specialty </option>
                        <option value="secundaria">high school</option>
                        <option value="formacion profesional">Vocational training</option>
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
                                            <select name="dom-jqry_length" aria-controls="dom-jqry"
                                                class="form-select form-select-sm" wire:model.live="perPage">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>&nbsp; entries
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div id="dom-jqry_filter" class="dataTables_filter"><label>Search:<input
                                                type="search" wire:model.live.debounce.300ms="search"
                                                class="form-control form-control-sm" placeholder=""
                                                aria-controls="dom-jqry"></label></div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <!-- BOTON VENTANA MODAL -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#FormacionModal" wire:click='modal()'>
                                        Create teacher
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive dt-responsive">

                        @if ($teachers->isNotEmpty())
                            <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th wire:click="doSort('usu_seneca')" class="column-tables"><x-datatable-item
                                                :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="usu_seneca"
                                                columnName="Seneca User" /></th>
                                        <th wire:click="doSort('nombre')" class="column-tables"><x-datatable-item
                                                :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="nombre"
                                                columnName="Name" /></th>
                                        <th wire:click="doSort('apellido1')" class="column-tables"><x-datatable-item
                                                :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="apellido1"
                                                columnName="First Name" /></th>
                                        <th wire:click="doSort('apellido2')" class="column-tables"><x-datatable-item
                                                :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="apellido2"
                                                columnName="Last Name" /></th>
                                        <th wire:click="doSort('especialidad')" class="column-tables"><x-datatable-item
                                                :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="especialidad"
                                                columnName="Speciality" /></th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teachers as $teacher)
                                        <tr>
                                            <td>{{ $teacher->usu_seneca }}</td>
                                            <td>{{ $teacher->nombre }}</td>
                                            <td>{{ $teacher->apellido1 }}</td>
                                            <td>{{ $teacher->apellido2 }}</td>
                                            <td>{{ $teacher->especialidad }}</td>
                                            <td>
                                                <ul class="list-inline me-auto mb-0">
                                                    <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                                                        aria-label="Edit" data-bs-original-title="Edit">
                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#FormacionModal" wire:click="modal({{ $teacher->id }})">
                                                            EDIT
                                                        </button>
                                                    </li>
                                                    <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                                                        aria-label="Delete" data-bs-original-title="Delete">
                                                        <button class="btn btn-primary" wire:click="delete({{ $teacher->id }})" wire:loading.attr='disable' wire:target='delete'>
                                                            DELETE
                                                        </button>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @elseif($teachers->isEmpty() && $search != '')
                            <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th wire:click="doSort('usu_seneca')" class="column-tables"><x-datatable-item
                                                :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="usu_seneca"
                                                columnName="Seneca User" /></th>
                                        <th wire:click="doSort('nombre')" class="column-tables"><x-datatable-item
                                                :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="nombre"
                                                columnName="Name" /></th>
                                        <th wire:click="doSort('apellido1')" class="column-tables"><x-datatable-item
                                                :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="apellido1"
                                                columnName="First Name" /></th>
                                        <th wire:click="doSort('apellido2')" class="column-tables"><x-datatable-item
                                                :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="apellido2"
                                                columnName="Last Name" /></th>
                                        <th wire:click="doSort('especialidad')" class="column-tables">
                                            <x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection"
                                                columnNameVar="especialidad" columnName="Speciality" /></th>
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
                            <p>No teachers found.</p>
                        @endif
                    </div>
                </div>
                <div class="card-header">
                    <div class="table-responsive dt-responsive">
                        <div id="dom-jqry_wrapper" class="dataTables_wrapper dt-bootstrap5">
                            <div class="row pagination-center">
                                <div class="col-sm-12 col-md-11">
                                    {{ $teachers->links() }}
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
