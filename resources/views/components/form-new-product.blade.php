<form method="POST" action="{{route('new.products')}}">
            <!-- CSRF Token -->
            @csrf

            <div>
                <x-input-label for="name" :value="__('Nombre')" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div class="mt-4">
                <x-input-label for="description" :value="__('Descripcion')" />
                <textarea id="description" name="description" class="mt-1 block w-full" required>{{ old('description') }}</textarea>
                <x-input-error class="mt-2" :messages="$errors->get('description')" />
            </div>

            <div class="mt-4">
                <x-input-label for="price" :value="__('Precio')" />
                <x-text-input id="price" name="price" type="number" class="mt-1 block w-full" :value="old('price')" required />
                <x-input-error class="mt-2" :messages="$errors->get('price')" />
            </div>

            <div class="mt-4">
                <x-input-label for="type" :value="__('Tipo')" />
                <x-text-input id="type" name="type" type="text" class="mt-1 block w-full" :value="old('type')" required />
                <x-input-error class="mt-2" :messages="$errors->get('type')" />
            </div>

            <div class="mt-4">
                <x-input-label for="brand" :value="__('Marca')" />
                <x-text-input id="brand" name="brand" type="text" class="mt-1 block w-full" :value="old('brand')" required />
                <x-input-error class="mt-2" :messages="$errors->get('brand')" />
            </div>

            <div class="mt-4">
                <x-input-label for="discount" :value="__('Descuento')" />
                <x-text-input id="discount" name="discount" type="number" step="0.01" class="mt-1 block w-full" :value="old('discount')" required />
                <x-input-error class="mt-2" :messages="$errors->get('discount')" />
            </div>

            <div class="mt-4">
                <x-input-label for="quantity_in_stock" :value="__('Stock')" />
                <x-text-input id="quantity_in_stock" name="quantity_in_stock" type="number" class="mt-1 block w-full" :value="old('quantity_in_stock')" required />
                <x-input-error class="mt-2" :messages="$errors->get('quantity_in_stock')" />
            </div>

            <div class="mt-4">
                <x-input-label for="color" :value="__('Color')" />
                <x-text-input id="color" name="color" type="text" class="mt-1 block w-full" :value="old('color')" required />
                <x-input-error class="mt-2" :messages="$errors->get('color')" />
            </div>

            <div class="mt-4">
                <x-input-label for="status" :value="__('Status')" />
                <x-text-input id="status" name="status" type="text" class="mt-1 block w-full" :value="old('status')" required />
                <x-input-error class="mt-2" :messages="$errors->get('status')" />
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-success">Nuevo Producto</button>
            </div>
        </form>
