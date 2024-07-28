<!-- resources/views/dashboard.blade.php -->
<x-app-layout>

    <x-carrusel></x-carrusel>

    <div class="card m-4 shadow">
        <div class="bg-white overflow-hidden mx-auto m-4">
            <div class="badge text-bg-primary text-wrap mx-auto fs-3">
                {{ __("Produtos en descuento") }}
            </div>
        </div>
        <section>
            <div class="container">
                <div class="row justify-content-center">
                    @foreach ($products as $product)
                         @if ($product->descuento > 0)
                            <div class="col-md-4 mb-3">
                                <x-cardProduct :product="$product"/>
                            </div>
                         @endif

                    @endforeach
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
