<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Contracts\View\View;

class Home extends Component
{
    public function render():View
    {
        return view('livewire.home');
    }
}
