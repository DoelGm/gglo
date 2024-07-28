<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alerts extends Component
{
    public $class;
    public function __construct($type = 'primary')
    {
        switch ($type) {
            case 'danger':
                $class ='alert-danger';
                break;
            case 'warning':
                $class = 'alert-warning';
                break;
            case 'success':
                $class = 'alert-success';
                break;
            default:
                $class = 'alert-primary';
                break;
        }
        $this->class = $class;
    }


    public function render(): View|Closure|string
    {
        return view('components.alerts');
    }
}
