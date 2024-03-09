<?php
namespace App\views\components;

use Illuminate\View\Component;

class Alert extends Component
{

    public function __construct()
    {
        //
    }

    public function render()
    {
        return view('components.alert');
    }
}
