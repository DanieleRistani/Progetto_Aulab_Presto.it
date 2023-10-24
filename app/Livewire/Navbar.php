<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class Navbar extends Component
{
    public function render()
    {
        $categories=Category::all();
        return view('livewire.navbar',compact('categories'));
    }
}
