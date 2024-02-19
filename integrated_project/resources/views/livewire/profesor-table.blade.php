<!--
    Es el elemento raiz de la plantilla profesor, esto quiere decir que si quereis añadir estilos al div raíz podeis sin problema,
    pero no podeis poner otro div fueram solo dentro.
-->
<div>
    <h1>Teachers</h1>
    @if ($teachers != null)
        <table>
            <thead>
                <tr>
                    <th>User Seneca</th>
                    <th>Name</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Speciality</th>
                    <th></th>
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
                            <button wire:click="edit({{ $teacher->id }})">Edit</button>
                            <button wire:click="delete({{ $teacher->id }})">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <form wire:submit.prevent="update">
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
<<<<<<< HEAD
            <label for="">Speciality</label>
            <input type="text" required wire:model="especialidad">
=======
>>>>>>> logicaApp
            @error('especialidad')
                <p>
                    The speciality formad isn´t valid
                </p>
            @enderror
<<<<<<< HEAD
=======
            <label for="">Speciality</label>
            <select wire:model="especialidad">
                <option value="secundaria">Secundaria</option>
                <option value="formacion profesional">Formacion Profesional</option>
            </select>

>>>>>>> logicaApp

            <button type="submit">Update</button>
        </form>
        <a href="{{route('profesor.create')}}">Insert Teacher</a>
    @else
        <p>No teachers register yet...</p>
    @endif
</div>
