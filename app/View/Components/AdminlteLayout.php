<?php

namespace App\View\Components;

use App\Models\Infowebsite;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class AdminlteLayout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title;
    public $menu;

    public function __construct($title,$menu=null)
    {
        $this->title = $title;
        $this->menu = $menu;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $info = Infowebsite::first(); 
        $user = Auth::user();
        return view('components.adminlte-layout', compact('user','info'));
    }
}
