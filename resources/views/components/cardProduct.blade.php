<!-- resources/views/components/card-product.blade.php -->
<div class="card shadow mx-auto" style="width: 100%;">
<img src="{{ asset($product->image_url ? 'img/'.$product->image_url : 'img/placeholder.png') }}" class="card-img-top" style="height: 16rem;" alt="...">
  <div class="card-body">
    <h5 class="card-title text-primary "><x-link :href="route('info', ['id'=> $product->id])">{{ $product->name }}</x-link></h5>

    <p class="card-text">{{ $product->description}}</p>
    @if ($product->discount > 0)
                <?php
                    $descuento = $product->discount;
                    $precio = $product->price;
                    $desc =  $descuento*$precio/100;
                    $precioDescuento = $precio-$desc;
                ?>
                <!-- <p class="fs-6 badge text-bg-success text-wrap">En oferta</p> -->
                <p class="fs-6 text-danger text-decoration-line-through">Precio: $ {{ $product->price}}</p>
                <p class="fs-6 text-success">Precio actual: ${{$precioDescuento}} <small class="badge text-bg-warning text-wrap card-text ">{{ $product->discount}}% OFF</small></p>
                @else
                <p class="card-text text-success">Precio: ${{ $product->price}}</p>
    @endif
    <!-- <p class="card-text text-body-secondary fs-6">Precio: ${{ $product->price}}</p>
    <p class="card-text text-success fs-6"><strong>Descuento del: {{$product->descuento}}%</strong></p> -->
    <!-- <a href="/info-producto" class="btn btn-primary mt-2 mr-2">Info</a> -->
    <a href="{{ route('cart.add', $product->id) }}" class="btn btn-success mt-4"><x-icons><i class="bi bi-cart"></i>  Agregar al Carrito</x-icons></a>

  </div>
</div>
