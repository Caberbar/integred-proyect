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
                                    <div class="dataTables_length" id="dom-jqry_length"><label>Show <select name="dom-jqry_length" aria-controls="dom-jqry" class="form-select form-select-sm">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select> entries</label>
                                        <a href="{{route('profesor.create')}}">Insert Teacher</a>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div id="dom-jqry_filter" class="dataTables_filter"><label>Search:<input type="search" wire:model.live="search" class="form-control form-control-sm" placeholder="" aria-controls="dom-jqry"></label></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive dt-responsive">
                        @if ($teachers != null)
                        <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th>User Seneca</th>
                                    <th>Name</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Speciality</th>
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
                                        <button class="btn btn-datatable btn-icon btn-transparent-dark me-2" wire:click="edit({{ $teacher->id }})"><i data-feather="more-vertical"></i></button>
                                        <button class="btn btn-datatable btn-icon btn-transparent-dark" wire:click="delete({{ $teacher->id }})"><i data-feather="trash-2"></i></button>
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
                                    {{$teachers->links()}}
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
            <input type="hidden" wire:model="profesor_id">

            <label for="">Name</label>
            <input type="text" required wire:model="nombre">
            @error('name')
            <p>
                The named formad isn´t valid
            </p>
            @enderror
            <label for="">First Name</label>
            <input type="text" required wire:model="apellido1">
            @error('apellido1')
            <p>
                The first name formad isn´t valid
            </p>
            @enderror
            <label for="">Last Name</label>
            <input type="text" required wire:model="apellido2">
            @error('apellido2')
            <p>
                The last name formad isn´t valid
            </p>
            @enderror
            <label for="">Speciality</label>
            <input type="text" required wire:model="especialidad">
            @error('especialidad')
            <p>
                The speciality formad isn´t valid
            </p>
            @enderror
            <label for="">Speciality</label>
            <select wire:model="especialidad">
                <option value="secundaria">Secundaria</option>
                <option value="formacion profesional">Formacion Profesional</option>
            </select>

            <button type="submit">Update</button>
        </form>
        <!-- QUITAR CUANDO ESTE VENTANA MODAL -->

        @else
        <p>No teachers register yet...</p>
        @endif
    </div>
</div>