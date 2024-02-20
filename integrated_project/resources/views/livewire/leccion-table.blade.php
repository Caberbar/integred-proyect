<div>
    <h1>Lecciones</h1>
    @if ($lecciones != null)
        <table>
            <thead>
                <tr>
                    <th>Horas</th>
                    <th>Profesor</th>
                    <th>Modulo</th>
                    <th>Grupo</th>

                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lecciones as $leccion)
                    <tr>
                        <td>
                            {{ $leccion->horas }}
                        </td>
                        <td>
                            {{ $leccion->profesor->nombre }}
                        </td>
                        <td>
                            {{ $leccion->modulo->denominacion }}
                        </td>
                        <td>
                            {{ $leccion->grupo->denominacion }}
                        </td>
                        <td>
                            <button wire:click="edit({{ $leccion->id }})">Edit</button>
                            <button wire:click="delete({{ $leccion->id }})">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <form wire:submit.prevent="update">
            <input type="hidden" wire:model="leccion_id">

            @error('profesor_id')
                <p class="alert alert-danger">El profesor no es valido</p>
            @enderror
            <label for="">Escoja Profesor</label>
            <select wire:model="profesor_id">
                @forelse ($profesores as $profesor)
                    <option value="{{$profesor->id}}">{{$profesor->nombre }}{{$profesor->apellido1}}</option>
                @empty
                    <option value=null>No hay profesores churra</option>
                @endforelse
            </select>
            @error('modulo_id')
                <p class="alert alert-danger">El modulo no es valido</p>
            @enderror
            <label for="">Escoja Modulo</label>
            <select wire:model="modulo_id">
                @forelse ($modulos as $modulo)
                    <option value="{{$modulo->id}}">{{$modulo->denominacion }}</option>
                @empty
                    <option value=null>No hay modulos churra</option>
                @endforelse
            </select>
            @error('grupo_id')
                <p class="alert alert-danger">El grupo no es valido</p>
            @enderror
            <label for="">Escoja Grupo</label>
            <select wire:model="grupo_id">
                @forelse ($grupos as $grupo)
                    <option value="{{$grupo->id}}">{{$grupo->denominacion }}</option>
                @empty
                    <option value=null>No hay grupo churra</option>
                @endforelse
            </select>
            <button type="submit">Update</button>
        </form>
        <a href="{{ route('lecciones.create') }}">Insert Group</a>
    @else
        <p>No groups register yet...</p>
    @endif
</div>
