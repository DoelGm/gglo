<form method="post" action="{{ route('product.update', ['id' => $product->id]) }}" class="mt-6 space-y-6">
            @csrf
            @method('patch')

            <div>
                <x-input-label for="name" :value="__('Nombre')" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $product->name)" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div>
                <x-input-label for="description" :value="__('Descripcion')" />
                <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" :value="old('description', $product->description)" required autocomplete="description" />
                <x-input-error class="mt-2" :messages="$errors->get('description')" />
            </div>

            <div>
                <x-input-label for="price" :value="__('Precio')" />
                <x-text-input id="price" name="price" type="number" class="mt-1 block w-full" :value="old('price', $product->price)" required />
                <x-input-error class="mt-2" :messages="$errors->get('price')" />
            </div>

            <div>
                <x-input-label for="type" :value="__('Tipo')" />
                <x-text-input id="type" name="type" type="text" class="mt-1 block w-full" :value="old('type', $product->type)" required autocomplete="type" />
                <x-input-error class="mt-2" :messages="$errors->get('type')" />
            </div>

            <div>
                <x-input-label for="brand" :value="__('Marca')" />
                <x-text-input id="brand" name="brand" type="text" class="mt-1 block w-full" :value="old('brand', $product->brand)" required autocomplete="brand" />
                <x-input-error class="mt-2" :messages="$errors->get('brand')" />
            </div>

            <div>
                <x-input-label for="discount" :value="__('Descuento')" />
                <x-text-input id="discount" name="discount" type="number" step="0.01" class="mt-1 block w-full" :value="old('discount', $product->discount)" required />
                <x-input-error class="mt-2" :messages="$errors->get('discount')" />
            </div>

            <div>
                <x-input-label for="quantity_in_stock" :value="__('Stock')" />
                <x-text-input id="quantity_in_stock" name="quantity_in_stock" type="number" class="mt-1 block w-full" :value="old('quantity_in_stock', $product->quantity_in_stock)" required />
                <x-input-error class="mt-2" :messages="$errors->get('quantity_in_stock')" />
            </div>

            <div>
                <x-input-label for="color" :value="__('Color')" />
                <x-text-input id="color" name="color" type="text" class="mt-1 block w-full" :value="old('color', $product->color)" required />
                <x-input-error class="mt-2" :messages="$errors->get('color')" />
            </div>

            <div>
                <x-input-label for="status" :value="__('Status')" />
                <x-text-input id="status" name="status" type="text" class="mt-1 block w-full" :value="old('status', $product->status)" required />
                <x-input-error class="mt-2" :messages="$errors->get('status')" />
            </div>

            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Actualizar Producto') }}</x-primary-button>

                @if (session('status') === 'product-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600"
                    >{{ __('Product updated successfully.') }}</p>
                @endif
            </div>
        </form>
