<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dealership;
use App\Models\Product;
use App\Models\ProductColor;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function deleteProductImage(Request $request)
    {
        $photo = $request->photo;
        if(isset($request->color_id)){
            $color_id = $request->color_id;
            $productColor = ProductColor::find($color_id);
            if (isset($productColor) && $request->photo)
            {
                $photoArr = json_decode($productColor->color_images, true);
                $newArr = array_filter($photoArr, fn ($item) => $item != $photo);
                $productColor->color_images = json_encode($newArr);
                \public_path('uploads/product/color/' . $photo);
                $productColor->save();
            }
        }else {
            $product_id = $request->product_id;
            $product = Product::find($product_id);
            if (isset($product) && $request->photo) {

                $photoArr = json_decode($product->thumbnail_image, true);
                $newArr = array_filter($photoArr, fn ($item) => $item != $photo);
                $product->thumbnail_image = json_encode($newArr);
                \public_path('uploads/product/' . $photo);
                $product->save();

            }
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully deleted',
            'photo' => $photo,
        ]);
    }

    public function deleteDealerAttachment(Request $request)
    {
        // dd($request->all());
        $attachment = $request->attachment;
        $dealer_id = $request->dealer_id;
        $dealer = Dealership::find($dealer_id);
        if (isset($dealer) && $request->attachment) {

            $photoArr = json_decode($dealer->attachment, true);
            $newArr = array_filter($photoArr, fn ($item) => $item != $attachment);
            $dealer->attachment = json_encode($newArr);
            \public_path('uploads/dealership/' . $attachment);
            $dealer->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Successfully deleted',
                'attachment' => $attachment,
            ]);
        }
    }
}
