<!-- resources/views/components/table-users.blade.php -->
<h2 class="fs-3 mb-2">Productos:</h2>
<table class="table table-bordered border-dark-subtle shadow">
    <thead>
        <tr>
            <th class=" bg-primary-subtle">ID</th>
            <th class=" bg-primary-subtle">Nombre</th>
            <th class=" bg-primary-subtle">Descripcion</th>
            <th class=" bg-primary-subtle">Precio</th>
            <th class=" bg-primary-subtle">Tipo</th>
            <th class=" bg-primary-subtle">Stock</th>
            <th class=" bg-primary-subtle">Status</th>
            <th class=" bg-primary-subtle">Acciones</th>

        </tr>
    </thead>

    <tbody  class="table-group-divider">
        @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id}}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price}}</td>
                    <td>{{ $product->type }}</td>
                    <td>{{ $product->quantity_in_stock }}</td>
                    <td>{{ $product->status}}</td>
                    <td>
                    <x-dropdown-link class="bg-info text-center text-white border border-dark-subtle rounded-3 shadow-sm mb-2" :href="route('product.edit', ['id' => $product->id])">
                                {{ __('Editar') }}
                    </x-dropdown-link>
                    <x-dropdown-link class="bg-danger text-center text-white border border-dark-subtle shadow-sm rounded-3" :href="route('product.delete', ['id' => $product->id])">
                                {{ __('Borrar') }}
                            </x-dropdown-link>
                    </td>
                </tr>
        @endforeach

    </tbody>
</table>
