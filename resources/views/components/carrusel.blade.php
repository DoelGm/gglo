<div id="carouselExampleIndicators" class="carousel slide mt-3">
  <div class="carousel-indicators">
    @foreach ($imagenes as $key => $imagen)
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}" aria-current="true" aria-label="Slide {{ $key + 1 }}"></button>
    @endforeach
  </div>
  <div class="carousel-inner">
    @foreach ($imagenes as $key => $imagen)
    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
      <img src="{{ asset('img/' . $imagen) }}" class="d-block w-100" alt="...">
    </div>
    @endforeach
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
