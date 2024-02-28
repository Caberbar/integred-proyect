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
                    <label for="">The name of user:</label>
                    <p>{{$nombre_usuario}}</p>

                    @error('rol')
                        <p>El rol escogido esta mal garrulo</p>
                    @enderror
                    <select wire:model="rol">
                        <option value="null">Select any rol</option>
                        @foreach ($roles as $rol)
                            <option value="{{$rol->id}}">{{$rol->name}}</option>
                        @endforeach
                    </select>
                </div>
                <br><br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id='cerrar_modal'>Close</button>
                    <button type="button" class="btn btn-primary" id="insert-submit" wire:click='save' wire:loading.attr='disable' wire:target='save' > {{ $accion }}</button>
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
                            <table>
                                <thead>
                                    <tr>
                                        <th>Usuario</th>
                                        <th>Rol</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($usuarios as $usuario)
                                        <tr>
                                            <td>{{ $usuario->name }}</td>
                                            <?php
                                                $roles = $usuario->roles;
                                                $rol;
                                                if($roles->isEmpty()){
                                                    $rol = 'They don´t have any rol';
                                                }else{
                                                    $rol = $roles->pluck('name')->implode(', ');
                                                }
                                            ?>
                                            <td><?php echo $rol ?></td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#RolModal" wire:click='modal({{$usuario->id}})'>
                                                    EDIT
                                                </button>
                                            </td>
                                        </tr>
                                    @empty

                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-header">
                        <div class="table-responsive dt-responsive">
                            <div id="dom-jqry_wrapper" class="dataTables_wrapper dt-bootstrap5">
                                <div class="row pagination-center">
                                    <div class="col-sm-12 col-md-11">
                                        {{-- {{$modulos->links()}} --}}
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
