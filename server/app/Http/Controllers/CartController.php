<?php

namespace App\Http\Controllers;
use App\Http\Resources\Cart as CartResource;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    //
    public function store(Request $request) {
        $cart = new Cart;
        $cart->title = $request->title;
        $cart->description = $request->description;

        $cart->save();
        return new CartResource($cart);
    }

    public function index() {
        $carts = \DB::table('carts')->get();
        return CartResource::collection($carts);
    }

    public function show(Cart $cart) {
        return new CartResource($cart);
    }

    public function update(Request $request, Cart $cart) {
        $cart->title = $request->get('title', $cart->title);
        $cart->description = $request->get('description', $cart->description);

        $cart-> save();
        return new CartResource($cart);
    }

    public function destroy(Cart $cart) {
        $cart->delete();
        return response(null, 204);
    }
}
