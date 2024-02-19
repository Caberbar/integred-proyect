<div>
    <h1>Grupos</h1>
    @if ($grupos != null)
        <table>
            <thead>
                <tr>
                    <th>Denomination</th>
                    <th>turno</th>
                    <th>curso escolar</th>
                    <th>curso</th>
                    <th>formacion</th>

                    <th></th>
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
                        <td>
                            <button wire:click="edit({{ $grupo->id }})">Edit</button>
                            <button wire:click="delete({{ $grupo->id }})">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <form wire:submit.prevent="update">
            <input type="hidden" wire:model="grupo_id">

            <label for="">Denominacion</label>
            <input type="text" required wire:model="denominacion">

            <label for="">Turno</label>
            <select wire:model="turno">
                <option value="Mañana">Mañana</option>
                <option value="Tarde">Tarde</option>
            </select>

            <label for="">Curso Escolar</label>
            <input type="text" required wire:model="curso_escolar">

            <label for="">Curso</label>
            <select wire:model="curso">
                <option value="1">1º</option>
                <option value="2">2º</option>
                <option value="3">3º</option>
                <option value="4">4º</option>
            </select>

            <label for="">Formación</label>
            <select wire:model="formacion_id">
                @forelse ($formaciones as $formacion)
                    <option value="{{$formacion->id}}">{{$formacion->denominacion}}</option>
                @empty
                    <option value=null>No hay formaciones registradas</option>
                @endforelse
            </select>

            <button type="submit">Update</button>
        </form>
        <a href="{{route('grupos.create')}}">Insert Group</a>
    @else
        <p>No groups register yet...</p>
    @endif
</div>
