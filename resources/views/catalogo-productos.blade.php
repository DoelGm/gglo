<x-app-layout>
<div class="row mt-3 ml-3">
    <div class="col-md-2 mt-3 ml-3"><a href="/products/nuevo producto" class="btn btn-success shadow fs-5"><i class="bi bi-plus-circle-fill"></i> Nuevos Productos</a></div>
</div>

<div class="py-12">
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow sm:rounded-lg p-3">
                <x-table-product :products="$products" />
            </div>
        </div>
    </div>

</x-app-layout>
