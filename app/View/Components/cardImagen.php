<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardImagen extends Component
{
    public $type;
    public $img;

    public function __construct($type, $img)
    {
        $this->type = $type;
        $this->img = $this->getImageForType($type);
    }

    protected function getImageForType($type)
    {
        switch ($type) {
            case 'gorras':
                return 'gorras.jpg';
            case 'playeras':
                return 'playeras.jpg';
            case 'pantalones':
                return 'pantalones.jpg';
            default:
                return 'placeholder.png';
        }
    }

    public function render(): View|Closure|string
    {
        return view('components.card-imagen');
    }
}
