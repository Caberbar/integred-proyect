<div>
    <div>
        <!-- Modal -->
        <div class="modal fade" id="RolModal" tabindex="-1" aria-labelledby="RolModalLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="RolModalLabel"> {{ $accion }} Rol</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="nombre" class="col-form-label">Username:</label>
                            <p>{{$nombre_usuario}}</p>
                        </div>
                        <div class="form-group">
                            <label for="rol" class="col-form-label">Speciality:</label>
                            <select class="form-control" wire:model="rol" id="rol" required="" aria-describedby="bouncer-error_select" aria-invalid="true">
                                <option value="null">Select any rol</option>
                                @forelse ($roles as $rol)
                                <option value="{{$rol->id}}">{{$rol->name}}</option>
                                @empty
                                <option value="null">No Roles register yet...</option>
                                @endforelse
                            </select>
                            <p class="error" id="error_rol">The chosen role is wrong.</p>
                            @error('rol')
                            <p class="error show">The chosen role is wrong.</p>
                            @enderror
                        </div>
                    </div>
                    <br><br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id='cerrar_modal'>Close</button>
                        <button type="button" class="btn btn-primary" id="insert-submit" wire:click='save' wire:loading.attr='disable' wire:target='save'>{{ $accion }}</button>
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

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive dt-responsive">
                            @if ($usuarios->isNotEmpty())
                            <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th wire:click="doSort('name')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="name" columnName="Username" /></th>
                                        <th wire:click="doSort('role_name')" class="column-tables"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnNameVar="role_name" columnName="Rol" /></th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usuarios as $usuario)
                                    <tr>
                                        <td>{{$usuario->name }}</td>
                                        <?php
                                        $roles = $usuario->roles;
                                        $rol;
                                        if ($roles->isEmpty()) {
                                            $rol = 'They don´t have any rol';
                                        } else {
                                            $rol = $roles->pluck('name')->implode(', ');
                                        }
                                        ?>
                                        <td><?php echo $rol ?></td>
                                        <td>
                                            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                <a href="#" class="avtar avtar-xs btn-link-success btn-pc-default" data-bs-toggle="modal" data-bs-target="#RolModal" wire:click="modal({{ $usuario->id }})">
                                                    <i class="ti ti-edit-circle f-18"></i>
                                                </a>
                                            </li>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @elseif($usuarios->isNotEmpty() && $search != '')
                            <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <td>{{ $usuario->name }}</td>
                                        <?php
                                        $roles = $usuario->roles;
                                        $rol;
                                        if ($roles->isEmpty()) {
                                            $rol = 'They don´t have any rol';
                                        } else {
                                            $rol = $roles->pluck('name')->implode(', ');
                                        }
                                        ?>
                                        <td><?php echo $rol ?></td>
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
                            <p>No roles found.</p>
                            @endif
                        </div>
                    </div>
                    <div class="card-header">
                        <div class="table-responsive dt-responsive">
                            <div id="dom-jqry_wrapper" class="dataTables_wrapper dt-bootstrap5">
                                <div class="row pagination-center">
                                    <div class="col-sm-12 col-md-11">
                                        {{$usuarios->links()}}
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

</div>