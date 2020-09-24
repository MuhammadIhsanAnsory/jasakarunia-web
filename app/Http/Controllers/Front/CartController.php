<?php

namespace App\Http\Controllers\Front;

use App\Bus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{


    public function index()
    {
        $carts = json_decode(request()->cookie('jasakarunia_cart'), true);
        // dd($carts);

        return view('front.cart', compact('carts'));
    }

    public function store($id)
    {
        $bus = Bus::FindOrFail($id);

        $carts = json_decode(request()->cookie('jasakarunia_cart'), true);

        if ($carts && array_key_exists($id, $carts)) {
            Alert::toast('Bus sudah ada di keranjang!', 'success');
            return back();
        } else {
            $carts[$id] = [
                'id' => $id,
                'name' => $bus->name,
                'slug' => $bus->slug,
                'images' => $bus->images
            ];
        }

        $cookie = cookie('jasakarunia_cart', json_encode($carts), 1200);
        Alert::toast('Bus berhasil ditambahkan ke keranjang!', 'success');

        return back()->cookie($cookie);
    }

    public function destroy($id)
    {
        $carts = json_decode(request()->cookie('jasakarunia_cart'), true);

        unset($carts[$id]);


        $cookie = cookie('jasakarunia_cart', json_encode($carts), 1200);
        Alert::toast('Bus dihapus dari keranjang!', 'warning');
        return back()->cookie($cookie);
    }

    public function order()
    {
        $carts = json_decode(request()->cookie('jasakarunia_cart'), true);
        $messages = 'https://wa.me/089685638179?text=Halo%20Jasakarunia.%20Saya%20ingin%20pesan';

        foreach ($carts as $cart) {
            $messages = $messages . '%20' . $cart['name'] . '%20dengan%20id%20=%20' . $cart['id'] . ',%20';
        }


        return Redirect::to($messages);
    }
}
