<div>
    <!-- Modal -->
    <div class="modal fade" id="FormacionModal" tabindex="-1" aria-labelledby="FormacionModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="FormacionModalLabel"> {{$accion}} Formation</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="">Acronym</label>
                    <input type="text" wire:model="siglas" required id="siglas">
                    <p class="error" id="error_siglas">Acronym must be at least 2 characters long.</p>
                    @error('siglas')
                        <p class="error show">Acronym must be at least 2 characters long.</p>
                    @enderror

                    <label for="">Denomination</label>
                    <input type="text" wire:model="denominacion" required id="denominacion">
                    <p class="error" id="error_denominacion">Denomination must be between 3 and 255 characters long.</p>
                    @error('denominacion')
                        <p class="error show">Denomination must be between 3 and 255 characters long.</p>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id='cerrar_modal'>CLOSE</button>
                    <button type="button" id="insert-submit" class="btn btn-primary" wire:click='save' wire:loading.remove wire:target='save' disabled="true"> {{ $accion }} Changes</button>
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
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#FormacionModal" wire:click='modal()'>
                                        Create Formation
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive dt-responsive">
                        @if ($formaciones->isNotEmpty())
                            <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th wire:click="doSort('siglas')" class="column-tables"><x-datatable-item
                                                :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="siglas"
                                                columnName="Acronym" /></th>
                                        <th wire:click="doSort('denominacion')" class="column-tables"><x-datatable-item
                                                :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="denominacion"
                                                columnName="Denomination" /></th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($formaciones as $formacion)
                                        <tr>
                                            <td>{{ $formacion->siglas }}</td>
                                            <td>{{ $formacion->denominacion }}</td>
                                            <td>
                                                <ul class="list-inline me-auto mb-0">
                                                    <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" aria-label="Edit" data-bs-original-title="Edit">
                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#FormacionModal" wire:click="modal({{ $formacion->id }})">
                                                            EDIT
                                                        </button>
                                                    </li>
                                                    <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" aria-label="Delete" data-bs-original-title="Delete">
                                                        <button  class="btn btn-primary" wire:loading.remove wire:target='delete' wire:click="delete({{ $formacion->id }})">
                                                            DELETE
                                                        </button>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @elseif($formaciones->isEmpty() && $search != '')
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
                            <p>No educations found.</p>
                        @endif
                    </div>
                </div>
                <div class="card-header">
                    <div class="table-responsive dt-responsive">
                        <div id="dom-jqry_wrapper" class="dataTables_wrapper dt-bootstrap5">
                            <div class="row pagination-center">
                                <div class="col-sm-12 col-md-11">
                                    {{ $formaciones->links() }}
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
    <script type="text/javascript" src="{{asset('js/validations/formacion-validation.js')}}"></script>
</div>
