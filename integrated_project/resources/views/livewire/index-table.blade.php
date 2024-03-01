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
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive dt-responsive">
                        @if ($lecciones->isNotEmpty())
                        <table id="new-cons" class="display table table-striped table-hover dt-responsive nowrap" style="width: 100%">
                            <thead>
                                <tr>
                                    <th wire:click="doSort('profesor_nombre')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="profesor_nombre" columnName="{{ trans('integrated.index_page.teachers') }}" /></th>
                                    <th wire:click="doSort('formacion_siglas')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="formacion_siglas" columnName="{{ trans('integrated.index_page.acronym_formation') }}" /></th>
                                    <th wire:click="doSort('modulo_nombre')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="modulo_nombre" columnName="{{ trans('integrated.index_page.module') }}" /></th>
                                    <th wire:click="doSort('horas')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="horas" columnName="{{ trans('integrated.index_page.hours') }}" /></th>
                                    <th wire:click="doSort('grupo_nombre')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="grupo_nombre" columnName="{{ trans('integrated.index_page.group') }}" /></th>
                                    <th wire:click="doSort('grupo_year')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="grupo_year" columnName="{{ trans('integrated.index_page.year') }}" /></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lecciones as $leccion)
                                @auth
                                @if(auth()->user()->roles->contains('id', 3))
                                @if ($leccion->grupo->curso_escolar == '2023-2024')
                                <tr>
                                    <td>
                                        {{ $leccion->profesor->nombre }}
                                        {{ $leccion->profesor->apellido1 }}
                                    </td>
                                    <td>
                                        {{ $leccion->modulo->formacion->siglas}}
                                    </td>
                                    <td>
                                        {{ $leccion->modulo->denominacion }}
                                    </td>
                                    <td>
                                        {{ $leccion->horas }}
                                    </td>
                                    <td>
                                        {{ $leccion->grupo->denominacion }}
                                    </td>
                                    <td>
                                        {{ $leccion->grupo->curso_escolar }}
                                    </td>
                                </tr>
                                @endif
                                @else
                                <tr>
                                    <td>
                                        {{ $leccion->profesor->nombre }}
                                        {{ $leccion->profesor->apellido1 }}
                                    </td>
                                    <td>
                                        {{ $leccion->modulo->formacion->siglas}}
                                    </td>
                                    <td>
                                        {{ $leccion->modulo->denominacion }}
                                    </td>
                                    <td>
                                        {{ $leccion->horas }}
                                    </td>
                                    <td>
                                        {{ $leccion->grupo->denominacion }}
                                    </td>
                                    <td>
                                        {{ $leccion->grupo->curso_escolar }}
                                    </td>
                                </tr>
                                @endif
                                @endauth
                                @endforeach
                            </tbody>
                        </table>
                        @elseif($lecciones->isEmpty() && $search != '')
                        <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th wire:click="doSort('profesor_nombre')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="profesor_nombre" columnName="Teachers" /></th>
                                    <th wire:click="doSort('formacion_siglas')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="formacion_siglas" columnName="Acronym formation" /></th>
                                    <th wire:click="doSort('modulo_nombre')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="modulo_nombre" columnName="Module" /></th>
                                    <th wire:click="doSort('horas')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="horas" columnName="Hours" /></th>
                                    <th wire:click="doSort('grupo_nombre')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="grupo_nombre" columnName="Group" /></th>
                                    <th wire:click="doSort('grupo_year')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="grupo_year" columnName="Year" /></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="6">{{ trans('integrated.index_page.no_results_found') }}</td>
                                </tr>
                            </tbody>
                        </table>
                        @else
                        <p>{{ trans('integrated.index_page.no_results_found') }}</p>
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
</div>