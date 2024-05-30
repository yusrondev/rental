<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index(){
        $data = Cart::with('cartDetail.place.placeDetails')->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('frontend/cart', ['data' => $data]);
    }

    public function store(Request $request){
        $id = $request->id;

        // memastikan tidak ada duplikasi data
        $check = Cart::whereHas('cartDetail', function($q) use ($id){
            $q->where('place_id', $id)->where('status', 0);
        })->where('user_id', Auth::user()->id)->get();

        if ($check->count() > 0) {
            Session::flash('error', 'Tempat ini sudah ada dalam keranjang!');

            return redirect()->back();
        }

        $cart = Cart::create([
            'status' => 0,
            'user_id' => Auth::user()->id,
        ]);

        CartDetail::create([
            'cart_id' => $cart->id,
            'place_id' => $id
        ]);

        Session::flash('success', 'Berhasil ditambahkan ke keranjang!');

        return redirect()->back();
    }

    public function delete($id){
        return Cart::where('id', $id)->delete();
    }
}
