<x-app-layout>
    <x-slot name="header" class="">
        <div class="row">
            <div class="col-md-12"><h2 class="text-dark  fs-5">Nuevo producto</h2></div>
        </div>
    </x-slot>

    <div class="row mt-4 mb-4">
        <div class="col-2"></div>
        <div class="col-md-8">
            <div class="card p-4 shadow">
                <h2 class="fs-4 mb-2">Nuevo Producto</h2>
                <x-form-new-product></x-form-new-product>
            </div>
        </div>
        <div class="col-2"></div>

    </div>


</x-app-layout>
