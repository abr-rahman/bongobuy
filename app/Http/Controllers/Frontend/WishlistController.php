<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function addWishlist($product_id)
    {
        $product = Product::with('userPrice')->findOrFail($product_id);
        $wishList = session()->get('wishList', []);

        $wishList[$product_id] = [
            "id" => $product->id,
            "name" => $product->product_name,
            "price" => $product->userPrice->discount_fixed,
            "product_image" => $product->product_image,
            "userPrice" => $product->userPrice,
            "slug" => $product->slug
        ];
        session()->put('wishList', $wishList);
        return response()->json(['Item has been added to wishlist!']);


        // $exist = Wishlist::where(['product_id' => $product_id, 'user_id' => auth()->id()])->exists();
        // if (auth()->check()) {
        //     if ($exist) {
        //         return response()->json(['It has already added!']);
        //     } else {
        //         $wishList = new Wishlist();
        //         $wishList->product_id = $product_id;
        //         $wishList->user_id = auth()->id();
        //         $wishList->save();
        //         return response()->json(['Item has been added to wishlist!']);
        //     }
        // } else {
        //     return response()->json(['error' => 'Please first login!'], 401);
        // }

        
    }

    public function removeWishlist($wishlist_id)
    {
        // $exist = Wishlist::where(['id' => $wishlist_id, 'user_id' => auth()->id()])->get();
        // $exist->each->forceDelete();
        // return back()->with('success', 'Wishlist remove successfully!');

        if($wishlist_id) {
            $wishList = session()->get('wishList');
            if(isset($wishList[$wishlist_id])) {
                unset($wishList[$wishlist_id]);
                session()->put('wishList', $wishList);
            }
            return back()->with('success', 'Wishlist remove successfully!');
        }
    }

    public function index()
    {
        return view('frontend.wishlist.index');
    }
}
