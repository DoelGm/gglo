
<x-app-layout>
    <div class="card shadow m-4 p-2">
        <div class="row">
            <div class="col-md-4">
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="{{ asset('img/placeholder.png' ) }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                        <img src="..." class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                        <img src="..." class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-md-4">
                <p class="fs-6 badge text-bg-warning text-wrap">Mas vendido</p>
                <p class="fw-bold fs-4">{{ $product->name}}</p>
                @if ($product->discount > 0)
                <?php
                    $descuento = $product->discount;
                    $precio = $product->price;
                    $desc =  $descuento*$precio/100;
                    $precioDescuento = $precio-$desc;
                ?>
                <p class="fs-6 badge text-bg-success text-wrap">En oferta</p>
                <p class="fs-5 text-danger text-decoration-line-through">$ {{ $product->price}}</p>
                <p class="fs-4 text-success">$ {{$precioDescuento}} <strong class="badge text-bg-success text-wrap fs-6 ">{{ $product->discount}}% OFF</strong></p>
                @else
                <p class="fs-4 text-success">$ {{ $product->price}}</p>
                @endif

                <p class="fs-6">Iva Incluido</p>
                <p class="fs-5">Marca:</p>
                <p class="fs-6">{{$product->brand}}</p>
                <p class="fs-5">Descripcion: </p>
                <p class="fs-6">{{ $product->description}}</p>
            </div>
            <div class="col-md-4">
                <div class="card p-3">
                    <p class="fs-5 mt-2">Stock disponible:</p>
                    <p class="fs-6 p-2 mt-2 text-nowrap bg-body-secondary border">{{$product->quantity_in_stock}}</p>
                    <p class="fs-5 mt-2">Color</p>
                    <p class="fs-6 mt-2 p-2 mt-2 text-nowrap bg-body-secondary border">{{$product->color}}</p>

                    <!-- <label class="fs-5 mt-2" for="">Cantidad</label>
                    <select class="form-select" name="count_cart" aria-label="Default select example">
                        <option value="1">1</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select> -->
                    <a href="{{ route('cart.add', $product->id) }}" class="btn btn-success mt-4"><x-icons><i class="bi bi-cart"></i>  Agregar al Carrito</x-icons></a>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
