<?php

namespace App\Http\Controllers\Front;

use App\Bus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class FrontController extends Controller
{
    public function index()
    {
        $buses = Bus::latest()->take(4)->get();

        return view('front.index', compact('buses'));
    }
}
