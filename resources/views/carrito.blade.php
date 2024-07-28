<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Carrito") }}
                    <div class="container">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                        <th>Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if (session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                        <tr>
                                            <td>{{ $details['name'] }}</td>
                                            <td>
                                                <form id="updateCartForm-{{ $id }}"  action="{{ route('cart.update') }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                        <select id="countCartSelect-{{ $id }}" class="form-select" name="count_cart" aria-label="Default select example">
                                                                <option value="{{ $details['count_cart'] }}">{{ $details['count_cart'] }}</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                        </select>
                                                            <!-- <input type="number" name="count_cart" value="{{ $details['count_cart'] }}" class="form-control"> -->
                                                        </div>
                                                        <div class="col-md-6">
                                                            <!-- <button type="submit" class="btn btn-primary">Actualizar</button> -->
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="id" value="{{ $id }}">


                                                </form>
                                            </td>
                                            <td> ${{ $details['price'] }}</td>
                                            <td>
                                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @endif

                                </tbody>
                            </table>
                            <p class="mb-2">Total: {{$total}}</p>
                            @if(session('success'))
                            <x-alerts type="warning">{{ session('success') }}</x-alerts>
                            @endif
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
        document.addEventListener('DOMContentLoaded', function () {
            const selects = document.querySelectorAll('.form-select');
            selects.forEach(select => {
                select.addEventListener('change', function () {
                    const id = this.id.split('-')[1];
                    const form = document.getElementById(`updateCartForm-${id}`);
                    form.submit();
                });
            });
        });
</script>

