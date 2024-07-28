<!-- resources/views/components/table-users.blade.php -->
<h2 class="fs-3 mb-2">Usuarios:</h2>
<table class="table table-bordered border-dark-subtle shadow">
    <thead>
        <tr>
            <th class=" bg-primary-subtle">ID</th>
            <th class=" bg-primary-subtle">Nombre</th>
            <th class=" bg-primary-subtle">Email</th>
            <th class=" bg-primary-subtle">Telefono</th>
            <th class=" bg-primary-subtle">Direccion</th>
            <th class=" bg-primary-subtle">Creado en</th>
            <th class=" bg-primary-subtle">Actualizado en</th>
            <th class=" bg-primary-subtle">Acciones</th>

        </tr>
    </thead>

    <tbody  class="table-group-divider">
        @foreach ($users as $user)
            @if (Auth::user()->id === $user->id)
            @else
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->adress }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td>
                    <x-dropdown-link class="bg-info text-center text-white border border-dark-subtle rounded-3 shadow-sm mb-2" :href="route('user.edit', ['id' => $user->id])">
                                {{ __('Editar Cuenta') }}
                    </x-dropdown-link>
                    <x-dropdown-link class="bg-danger text-center text-white border border-dark-subtle shadow-sm rounded-3" :href="route('user.delete', ['id' => $user->id])">
                                {{ __('Borrar cuenta') }}
                            </x-dropdown-link>
                    </td>
                </tr>
            @endif

        @endforeach
    </tbody>
</table>
