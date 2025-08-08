<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{
    public function cartDetails()
    {
        return view('frontend.cart.index');
    }
    public function addToCart($id)
    {
        $color_id = session()->get('color_id');
        $quantity = session()->get('quantity');
        if($color_id == null){
            return response()->json(['error' => 'Please Choose Color!'], 401);
        }
        if($quantity == null){
            $quantity = 1;
        }
        $product = Product::with('userPrice')->findOrFail($id);
        $cart = session()->get('cart', []);
        $inventoryGet = Inventory::select('id', 'quantity', 'color_id')->where('product_id', $product->id);
        $inventory = $inventoryGet->where('color_id', $color_id)->first();
        $inventoryExists = $inventoryGet->exists();
        if($inventoryExists == true) {
            // if ($inventory->quantity > 5) {
                if(isset($cart[$id])) {
                    if ($inventory->quantity <= $cart[$id]['quantity']) {
                        return response()->json(['Stock not available!']);
                    }
                    $cart[$id]['quantity']++;
                    $sub_total = Session::get('sub_total') + $product->userPrice->discount_fixed ?? 0;
                    Session::put('sub_total', $sub_total);
                    session()->put('cart', $cart);
                    Session::forget('color_id');
                    return response()->json(['It has already added & Increment quantity!']);
                } else {
                    $cart[$id] = [
                        "id" => $product->id,
                        "name" => $product->product_name,
                        "quantity" => $quantity,
                        "price" => $product?->userPrice?->discount_fixed ?? 0,
                        "image" => $product->product_image,
                        "brand" => $product->brand_id,
                        "color_id" => $color_id
                    ];
                    Session::put('sub_total', $product?->userPrice?->discount_fixed ?? 0);
                    session()->put('cart', $cart);
                    Session::forget('color_id');
                    return response()->json(['Item has been added to cart!']);
                }
            // } elseif (isset($inventory) == null) {
            //     return response()->json(['error' => 'Stock not available!'], 401);
            // }
        }
        return response()->json(['error' => 'Stock not available!'], 401);
    }
     public function buyNow($id)
    {
        $cart = session()->get('cart');
        $cart = session()->forget('cart');
        $quantity = session()->get('quantity');
        if($quantity == null){
            $quantity = 1;
        }
        $color_id = session()->get('color_id');
        if($color_id == null){
            return back()->with('error','Please Choose Color!');
        }
        $product = Product::with('userPrice')->findOrFail($id);
        $cart = session()->get('cart', []);
        $inventoryGet = Inventory::select('id', 'quantity')->where('product_id', $product->id);
        $inventory = $inventoryGet->where('color_id', $color_id)->first();
        $inventoryExists = $inventoryGet->exists();

        if($inventoryExists == true) {
            if ($inventory->quantity > $quantity) {
                    $cart[$id] = [
                        "id" => $product->id,
                        "name" => $product->product_name,
                        "quantity" => $quantity,
                        "price" => $product->userPrice->discount_fixed ?? 0,
                        "image" => $product->product_image,
                        "brand" => $product->brand_id,
                        "color_id" => $color_id
                    ];
                    session()->put('cart', $cart);
                    Session::put('buy_now', $product->userPrice->discount_fixed ?? 0);
                    Session::forget('color_id');
                    Session::forget('quantity');
                    return redirect()->route('checkout');

            } elseif (isset($inventory) == null) {
                return back()->with('error','Stock not available!');
            }
        }
        return back()->with('error','Stock not available!');
    }

    public function updateCart(Request $request)
    {
        $cart = session()->get('cart');
        Session::put('quantity', $request->quantity);
        if(!empty($cart)){
            $inventory = Inventory::select('id', 'quantity')->where('product_id', $request->product_id)->first();
            if ($inventory->quantity <= $request->quantity) {
                return response()->json(['Stock not available!']);
            }
            $cart[$request->product_id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }
        return response()->json(['Item quantity customized!']);
    }

    public function deleteCart(Request $request)
    {
        Session::forget('coupon_code');
        Session::forget('sub_total');
        Session::forget('buy_now');
        Session::forget('quantity');
        if($request->cart_id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->cart_id])) {
                unset($cart[$request->cart_id]);
                session()->put('cart', $cart);
            }
            // session()->flash('success', 'Item successfully deleted.');
            return response()->json(['Item successfully deleted!']);
        }
    }

    public function withOutVariantCart($id)
    {
        $product = Product::with('userPrice')->findOrFail($id);
        $cart = session()->get('cart', []);
        $quantity = session()->get('quantity');
        if($quantity == null){
            $quantity = 1;
        }
        $inventoryGet = Inventory::select('id', 'quantity')->where('product_id', $product->id);
        $inventory = $inventoryGet->first();
        $inventoryExists = $inventory->exists();

        if($inventoryExists == true) {
            if ($inventory->quantity > 0) {
                if(isset($cart[$id])) {
                    if ($inventory->quantity <= $cart[$id]['quantity']) {
                        return response()->json(['Stock not available!']);
                    }
                    $cart[$id]['quantity']++;
                    $sub_total = Session::get('sub_total') + $product->userPrice->discount_fixed ?? 0;
                    Session::put('sub_total', $sub_total);
                    session()->put('cart', $cart);
                    return response()->json(['It has already added & Increment quantity!']);
                } else {
                    $cart[$id] = [
                        "id" => $product->id,
                        "name" => $product->product_name,
                        "quantity" => $quantity,
                        "price" => $product?->userPrice?->discount_fixed ?? 0,
                        "image" => $product->product_image,
                        "brand" => $product->brand_id
                    ];
                    Session::put('sub_total', $product?->userPrice?->discount_fixed ?? 0);
                    session()->put('cart', $cart);
                    return response()->json(['Item has been added to cart!']);
                }
            } elseif (isset($inventory) == null) {
                return response()->json(['error' => 'Stock not available!'], 401);
            }
        }
        return response()->json(['error' => 'Stock not available!'], 401);
    }
     public function withOutVariantbuyNow($id)
    {
        $product = Product::with('userPrice')->findOrFail($id);
        $cart = session()->get('cart', []);
        $quantity = session()->get('quantity');
        if($quantity == null){
            $quantity = 1;
        }
        $inventoryGet = Inventory::select('id', 'quantity')->where('product_id', $product->id);
        $inventory = $inventoryGet->first();
        $inventoryExists = $inventoryGet->exists();

        if($inventoryExists == true) {
            if ($inventory->quantity > $quantity) {
                    $cart[$id] = [
                        "id" => $product->id,
                        "name" => $product->product_name,
                        "quantity" => $quantity,
                        "price" => $product->userPrice->discount_fixed ?? 0,
                        "image" => $product->product_image,
                        "brand" => $product->brand_id
                    ];
                    session()->put('cart', $cart);
                    Session::put('buy_now', $product->userPrice->discount_fixed ?? 0);
                    Session::forget('quantity');
                    return redirect()->route('checkout');

            } elseif (isset($inventory) == null) {
                return back()->with('error','Stock not available!');
            }
        }
        return back()->with('error','Stock not available!');
    }
}
