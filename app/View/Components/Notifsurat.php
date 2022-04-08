<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Notifsurat extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $kode;

    public function __construct($kode=null)
    {
        $this->kode = $kode;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.notifsurat');
    }
}
