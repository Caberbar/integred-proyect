<div>
    <h1>Modules</h1>
    @if ($modulos != null)
        <table>
            <thead>
                <tr>
                    <th>Denomination</th>
                    <th>Specialty</th>
                    <th>Acronym</th>
                    <th>course</th>
                    <th>Hours</th>
                    <th>Training</th>
                    <th></th>
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
                        <td>{{ $modulo->formacion->denominacion}}</td>
                        <td>
                            <button wire:click="edit({{ $modulo->id }})">Edit</button>
                            <button wire:click="delete({{ $modulo->id }})">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <form wire:submit.prevent="update">
            @csrf
            <input type="hidden" wire:model="modulo_id">
            @if ($error != null)
                <p class="alert alert-danger">{{$error}}</p>
            @endif
            @error('denominacion')
                <p class="alert alert-danger">La denominacion no es valida</p>
            @enderror
            <label for="">Denominacion</label>
            <input type="text" required wire:model="denominacion">

            @error('siglas')
                <p class="alert alert-danger">La siglas no es valida</p>
            @enderror
            <label for="">Siglas</label>
            <input type="text" required wire:model="siglas">

            @error('curso')
                <p class="alert alert-danger">El curso no es valida</p>
            @enderror
            <label for="">Course</label>
            <select wire:model="curso">
                <option value="1">1º</option>
                <option value="2">2º</option>
                <option value="3">3º</option>
                <option value="4">4º</option>
            </select>

            @error('horas')
                <p class="alert alert-danger">Las horas no es valida</p>
            @enderror
            <label for="">Hours</label>
            <input type="text" wire:model="horas" required>

            @error('formacion')
                <p class="alert alert-danger">La formacion no es valida</p>
            @enderror
            <label for="">Formación</label>
            <select wire:model="formacion">
                @forelse ($formaciones as $formacion)
                    <option value="{{ $formacion->id }}">{{ $formacion->denominacion }}</option>
                @empty
                    <option value=null>You cant create a update, becuase we don´t have Training</option>
                @endforelse
            </select>

            <button type="submit">Update</button>
        </form>
        <a href="{{route('modulos.create')}}">Insert Module</a>
    @else
        <p>No teachers register yet...</p>
    @endif
</div>
