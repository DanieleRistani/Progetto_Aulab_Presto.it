<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class Footer extends Component
{
    
    public function render()
    {
        $veicoli = Category::where('name', 'Veicoli')->first();
        $mobiles = Category::where('name', 'Mobiles')->first();
        $elettronica = Category::where('name', 'Elettronica')->first();
        $moda = Category::where('name', 'Moda')->first();
        return view('livewire.footer', compact('veicoli', 'mobiles', 'elettronica', 'moda'));
    }
}
