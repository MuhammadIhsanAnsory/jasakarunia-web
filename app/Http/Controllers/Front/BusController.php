<?php

namespace App\Http\Controllers\Front;

use App\Bus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BusController extends Controller
{

    public function index()
    {
        $buses = Bus::latest()->paginate(12);

        return view('front.bus.index', compact('buses'));
    }

    public function show($id)
    {
        $bus = Bus::findOrFail($id);

        return view('front.bus.show', compact('bus'));
    }
}
