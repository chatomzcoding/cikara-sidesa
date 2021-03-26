<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $slider = Slider::where('status','aktif')->get();
        return view('homepage.index', compact('slider'));
    }
}
