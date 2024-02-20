<div>
    <h1>Modules</h1>
    @if ($formaciones != null)
        <table>
            <thead>
                <tr>
                    <th>Acronym</th>
                    <th>Denomination</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($formaciones as $formacion)
                    <tr>
                        <td>{{ $formacion->siglas }}</td>
                        <td>{{ $formacion->denominacion }}</td>
                        <td>
                            <button wire:click="edit({{ $formacion->id }})">Edit</button>
                            <button wire:click="delete({{ $formacion->id }})">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <form wire:submit.prevent="update">
            @csrf
            <input type="hidden" wire:model="formacion_id">

            @if ($error != null)
                <p class="alert alert-danger">{{$error}}</p>
            @endif

            <label for="">Acronym</label>
            <input type="text" wire:model="siglas" required max="3">

            <label for="">Denomination</label>
            <input type="text" wire:model="denominacion" required>

            <button type="submit">Update</button>
        </form>
        <a href="{{route('formaciones.create')}}">Insert Training</a>
    @else
        <p>No Training register yet...</p>
    @endif
</div>
