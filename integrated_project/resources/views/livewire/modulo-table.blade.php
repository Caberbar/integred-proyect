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
                                    <a href="{{route('modulos.create')}}" class="btn btn-primary d-inline-flex align-item-center">
                                        <i class="ti ti-plus f-18"></i> Add Module
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
                                                <a href="#" class="avtar avtar-xs btn-link-success btn-pc-default" wire:click="edit({{ $modulo->id }})" data-bs-toggle="modal" data-bs-target="#customer-edit_add-modal">
                                                    <i class="ti ti-edit-circle f-18"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" aria-label="Delete" data-bs-original-title="Delete">
                                                <a href="#" class="avtar avtar-xs btn-link-danger btn-pc-default" wire:click="delete({{ $modulo->id }})">
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
                                    {{$modulos->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- QUITAR CUANDO ESTE VENTANA MODAL -->
        <form wire:submit.prevent="update" style="display: none;">
        @csrf
                    <input type="hidden" wire:model="modulo_id">

                    @error('denominacion')
                    <p>La denominacion no es valida</p>
                    @enderror
                    <label for="">Denominacion</label>
                    <input type="text" required wire:model="denominacion">

                    @error('siglas')
                    <p>La siglas no es valida</p>
                    @enderror
                    <label for="">Siglas</label>
                    <input type="text" required wire:model="siglas">


                    @error('curso')
                    <p>El curso no es valida</p>
                    @enderror
                    <label for="">Course</label>
                    <select wire:model="curso">
                        <option value="1">1º</option>
                        <option value="2">2º</option>
                        <option value="3">3º</option>
                        <option value="4">4º</option>
                    </select>

                    @error('horas')
                    <p>Las horas no es valida</p>
                    @enderror
                    <label for="">Hours</label>
                    <input type="text" wire:model="horas" required>

                    @error('formacion')
                    <p>La formacion no es valida</p>
                    @enderror
                    <label for="">Formación</label>
                    <select wire:model="formacion">
                        
                    </select>

                    <button type="submit">Update</button>
                </form>
        </form>
        <!-- QUITAR CUANDO ESTE VENTANA MODAL -->

        @else
        <p>No modules register yet...</p>
        @endif
    </div>
</div>