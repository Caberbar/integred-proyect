<div>
    <!-- Modal -->
    <div class="modal fade" id="ModuloModal" tabindex="-1" aria-labelledby="ModuloModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ModuloModalLabel"> {{$accion}} Module</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id='cerrar_modal'></button>
                </div>
                <div class="modal-body">
                    <label for="">Hours</label>
                    <input type="number" required wire:model="horas" id="horas" min="1">
                    <p class="error" id="error_horas">Hours must be a number greater than 0.</p>
                    @error('horas')
                        <p class="error show" id="error_horas">Hours must be a number greater than 0.</p>
                    @enderror
                    
                    <label for="">Denomination</label>
                    <input type="text" required wire:model="denominacion" id="denominacion">
                    <p class="error" id="error_denominacion">Denomination must be between 2 and 255 characters long.</p>
                    @error('denominacion')
                        <p class="error show" id="error_denominacion">Denomination must be between 2 and 255 characters long.</p>
                    @enderror
                    
                    <label for="">Speciality</label>
                    <select wire:model="especialidad" id="especialidad">
                        <option value="-1">Select a specialty</option>
                        <option value='secundaria'>High school</option>
                        <option value='formacion profesional'>Vocational training</option>
                    </select>
                    <p class="error" id="error_speciality">Select a speciality.</p>
                    @error('especialidad')
                        <p class="error show">Select a speciality.</p>
                    @enderror

                    <label for="">Acronym</label>
                    <input type="text" required wire:model="siglas" id="siglas">
                    <p class="error" id="error_siglas">Acronym must be at least 2 characters long.</p>
                    @error('siglas')
                        <p class="error show" id="error_siglas">Acronym must be at least 2 characters long.</p>
                    @enderror

                    <label for="">Course</label>
                    <select wire:model="curso" id="curso">
                        <option value="-1">Select a course</option>
                        <option value='1'>1º</option>
                        <option value='2'>2º</option>
                        <option value='3'>3º</option>
                        <option value='4'>4º</option>
                    </select>
                    <p class="error" id="error_curso2">Select a course.</p>
                    <p class="error" id="error_curso">Vocational Training can't have 3rd or 4th course.</p>
                    @error('curso')
                        <p class="error show" id="error_curso">Course doesn't have a valid value.</p>
                    @enderror

                    <label for="">Formation</label>
                    <select wire:model="formacion_id" id="formacion">
                        <option value="-1">Select a formation</option>
                        @forelse ($formaciones as $formacion)
                            <option value='{{ $formacion->id }}'>{{$formacion->denominacion}}</option>
                        @empty
                            <option value="-1">No formation register yet</option>
                        @endforelse
                    </select>
                    <p class="error" id="error_formacion">Select a formation.</p>
                    @error('formacion_id')
                        <p class="error show">Select a formation.</p>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id='cerrar_modal'>CLOSE</button>
                    <button type="button" class="btn btn-primary" id="insert-submit" disabled="true" wire:click='save' wire:loading.attr='disable' wire:target='save'> {{ $accion }} Changes</button>
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
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModuloModal" wire:click='modal()'>
                                        Create module
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
                        @if ($modulos->isNotEmpty())
                        <table id="new-cons" class="display table table-striped table-hover dt-responsive nowrap" style="width: 100%">
                            <thead>
                                <tr>
                                    <th wire:click="doSort('denominacion')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="denominacion" columnName="Denomination" /></th>
                                    <th wire:click="doSort('especialidad')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="especialidad" columnName="Speciality" /></th>
                                    <th wire:click="doSort('siglas')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="siglas" columnName="Acronym" /></th>
                                    <th wire:click="doSort('curso')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="curso" columnName="Cours" /></th>
                                    <th wire:click="doSort('horas')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="horas" columnName="Hours" /></th>
                                    <th wire:click="doSort('formacion_siglas')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="formacion_siglas" columnName="Formation" /></th>
                                    @auth
                                    @if(auth()->user()->roles->contains('id', 1))
                                    <th>Actions</th>
                                    @endif
                                    @endauth
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
                                    @auth
                                    @if(auth()->user()->roles->contains('id', 1))
                                    <td>
                                        <ul class="list-inline me-auto mb-0">
                                            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                <a href="#" class="avtar avtar-xs btn-link-success btn-pc-default" data-bs-toggle="modal" data-bs-target="#ModuloModal" wire:click="modal({{ $modulo->id }})">
                                                    <i class="ti ti-edit-circle f-18"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                <a href="#" onclick="return false;" class="avtar avtar-xs btn-link-danger btn-pc-default" wire:click="delete({{ $modulo->id }})" wire:loading.attr='disable' wire:target='delete'>
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
                        @elseif($modulos->isEmpty() && $search != '')
                        <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                <th wire:click="doSort('denominacion')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="denominacion" columnName="Denomination" /></th>
                                    <th wire:click="doSort('especialidad')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="especialidad" columnName="Speciality" /></th>
                                    <th wire:click="doSort('siglas')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="siglas" columnName="Acronym" /></th>
                                    <th wire:click="doSort('curso')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="curso" columnName="Cours" /></th>
                                    <th wire:click="doSort('horas')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="horas" columnName="Hours" /></th>
                                    <th wire:click="doSort('formacion_siglas')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="formacion_siglas" columnName="Formation" /></th>
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
    <script type="text/javascript" src="{{asset('js/validations/modulo-validation.js')}}"></script>
</div>

