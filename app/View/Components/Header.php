<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Header extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $judul;
    public $p;
    public $active;

    public function __construct($judul,$active,$p='')
    {
        $this->judul = $judul;
        $this->active = $active;
        $this->p = $p;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.header');
    }
}
