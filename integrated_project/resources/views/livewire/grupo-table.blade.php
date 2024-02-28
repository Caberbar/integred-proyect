<div>
    <!-- Modal -->
    <div class="modal fade" id="GrupoModal" tabindex="-1" aria-labelledby="GrupoModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="GrupoModalLabel"> {{ $accion }} Group</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <div class="form-group">
                        <label for="denominacion" class="col-form-label">Denomination:</label>
                        <input type="text" class="form-control" required wire:model="denominacion" id="denominacion">
                        <p class="error" id="error_denominacion">The denomination isn´t valid.</p>
                        @error('denominacion')
                        <p class="alert alert-danger">The denomination isn´t valid.</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="turno" class="col-form-label">Turn:</label>
                        <select class="form-control" wire:model="turno" id="turno" required="" aria-describedby="bouncer-error_select" aria-invalid="true">
                            <option value="null">Select any turn</option>
                            <option value="Mañana">Morning</option>
                            <option value="Tarde">Afternoon</option>
                        </select>
                        <p class="error" id="error_turno">The turn isn´t valid.</p>
                        @error('turno')
                        <p class="alert alert-danger">The turn isn´t valid.</p>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="curso_escolar" class="col-form-label">School year:</label>
                        <input type="text" class="form-control" required wire:model="curso_escolar" id="curso_escolar">
                        <p class="error" id="error_curso_escolar">The school year is not valid.</p>
                        @error('curso_escolar')
                        <p class="alert alert-danger">The school year is not valid.</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="curso" class="col-form-label">Course:</label>
                        <select class="form-control" wire:model="curso" id="curso" required="" aria-describedby="bouncer-error_select" aria-invalid="true">
                            <option value="null">Select any course</option>
                            <option value="1">1º</option>
                            <option value="2">2º</option>
                            <option value="3">3º</option>
                            <option value="4">4º</option>
                        </select>
                        <p class="error" id="error_curso">The school year is not valid.</p>
                        @error('curso')
                        <p class="alert alert-danger">The school year is not valid.</p>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="formacion_id" class="col-form-label">Formation:</label>
                        <select class="form-control" wire:model="formacion_id" id="formacion_id" required="" aria-describedby="bouncer-error_select" aria-invalid="true">
                            <option value="null">Select any formation</option>
                            @forelse ($formaciones as $formacion)
                            <option value="{{$formacion->id}}">{{$formacion->denominacion}}</option>
                            @empty
                            <option value=null>No formation register yet...</option>
                            @endforelse
                        </select>
                        <p class="error" id="error_formacion_id">The school year is not valid.</p>
                        @error('formacion_id')
                        <p class="alert alert-danger">The formation isn´t valid</p>
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
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#GrupoModal" wire:click='modal()'>
                                        Create group
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
                        @if ($grupos->isNotEmpty())

                        <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th wire:click="doSort('denominacion')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="denominacion" columnName="Denomination" /></th>
                                    <th wire:click="doSort('turno')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="turno" columnName="Turn" /></th>
                                    <th wire:click="doSort('curso_escolar')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="curso_escolar" columnName="School course" /></th>
                                    <th wire:click="doSort('curso')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="curso" columnName="Course" /></th>
                                    <th wire:click="doSort('formacion_denominacion')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="formacion_denominacion" columnName="Formation denomination" /></th>
                                    @auth
                                    @if(auth()->user()->roles->contains('id', 1))
                                    <th>Actions</th>
                                    @endif
                                    @endauth
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
                                    @auth
                                    @if(auth()->user()->roles->contains('id', 1))
                                    <td>
                                        <ul class="list-inline me-auto mb-0">

                                            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                <a href="#" class="avtar avtar-xs btn-link-success btn-pc-default" data-bs-toggle="modal" data-bs-target="#GrupoModal" wire:click="modal({{ $grupo->id }})">
                                                    <i class="ti ti-edit-circle f-18"></i>
                                                </a>
                                            </li>

                                            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                <a href="#" onclick="return false;" class="avtar avtar-xs btn-link-danger btn-pc-default" wire:click="delete({{ $grupo->id }})" wire:loading.attr='disable' wire:target='delete'>
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
                        @elseif($grupos->isEmpty() && $search != '')
                        <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th wire:click="doSort('denominacion')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="denominacion" columnName="Denomination" /></th>
                                    <th wire:click="doSort('turno')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="turno" columnName="Turn" /></th>
                                    <th wire:click="doSort('curso_escolar')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="curso_escolar" columnName="School course" /></th>
                                    <th wire:click="doSort('curso')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="curso" columnName="Course" /></th>
                                    <th wire:click="doSort('formacion_denominacion')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="formacion_denominacion" columnName="Formation denomination" /></th>
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