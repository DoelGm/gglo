<?php
    if(isset($products)){

    }else{
        $products = [];
    }

?>
<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-md-6"><h2 class="text-light  fs-3">
            <x-icons><i class="text-light bi bi-boxes"></i>  Catalogo de Ropa</x-icons></h2>
            </div>
            <div class="col-md-6"><x-search></x-search></div>
        </div>


    </x-slot>
    <div class="row m-2">
        <div class="col-md-4"><x-link :href="route('clothes.playeras')"><x-card-imagen type="playeras" img="playeras.jpg"></x-card-imagen></x-link></div>
        <div class="col-md-4"><x-link :href="route('clothes.gorras')"><x-card-imagen type="gorras" img="gorras.jpg"></x-card-imagen></x-link></div>
        <div class="col-md-4"><x-link :href="route('clothes.pantalones')"><x-card-imagen type="pantalones" img="pantalones.jpg"></x-card-imagen></x-link></div>
    </div>
    <div class="card m-4 shadow">
    <div class="bg-white overflow-hidden mx-auto m-4">
                <div class="mx-auto badge text-bg-primary text-wrap  fs-3">
                    {{ __("Produtos") }}
                </div>
            </div>
    <div class="container">
        <div class="row justify-content-center">
            @if ($products == true)
                @foreach ($products as $product)
                <div class="col-md-4 mb-3">
                    <x-cardProduct :product="$product"/>
                </div>
                @endforeach
            @else
                <x-alerts type="warning"><x-icons><i class="bi bi-info-circle"></i>  {{'No hay productos que mostrar'}}</x-icons> </x-alerts>
            @endif


        </div>
    </div>
    </div>
</x-app-layout>
