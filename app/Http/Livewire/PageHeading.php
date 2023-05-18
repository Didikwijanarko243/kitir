<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\View;
use Livewire\Component;

class PageHeading extends Component
{
    public $link , $sidebar;
    
    public function mount($link)
    {

        $this->link = $link;
    }

    public function render()
    {
        View::share('sidebar', $this->sidebar);
        return view('livewire.page-heading');
    }
}
