<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class carrusel extends Component
{
    public $imagenes;
    public function __construct()
    {
        $this->imagenes = ['gglo.jpg', 'img1.jpg', 'img3.jpg'];
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.carrusel');
    }
}
