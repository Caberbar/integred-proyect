<div class="container-xl px-4 mt-n4">
    <div class="card mb-4">
        <div class="card-header">Education table <a href="{{route('formaciones.create')}}">Insert Training</a></div>
        <div class="card-body">
            @if ($formaciones != null)
            <table id="datatablesSimple">
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
                            <button class="btn btn-datatable btn-icon btn-transparent-dark me-2" wire:click="edit({{ $formacion->id }})"><i data-feather="more-vertical"></i></button>
                            <button class="btn btn-datatable btn-icon btn-transparent-dark" wire:click="delete({{ $formacion->id }})"><i data-feather="trash-2"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <form wire:submit.prevent="update">
                @csrf
                <input type="hidden" wire:model="formacion_id">

                <label for="">Acronym</label>
                <input type="text" wire:model="siglas" required max="3">

                <label for="">Denomination</label>
                <input type="text" wire:model="denominacion" required>

                <button type="submit">Update</button>
            </form>
            @else
            <p>No Training register yet...</p>
            @endif
        </div>
    </div>
</div>