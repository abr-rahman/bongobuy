<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ArrivalDataTable;
use App\DataTables\BrandWiseProductDataTable;
use App\DataTables\ProductDataTable;
use App\DataTables\SliderDataTable;
use App\Enums\ProductStatus;
use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Services\Interfaces\ProductServiceInterface;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\ProductColor;
use App\Models\Purchase;
use App\Models\RegularPrice;
use App\Models\SubCategory;
use App\Utils\FileUploader;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\PseudoTypes\True_;

class ProductController extends Controller
{
    // public function __construct(
    //     private FileUploader $uploader,
    // ) {
    // }

    protected $productService;

    public function __construct(ProductServiceInterface $productService, private FileUploader $uploader)
    {
        $this->productService = $productService;
    }

    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('status', StatusEnum::Active->value)->get();
        $brands = Brand::where('status', StatusEnum::Active->value)->get();
        $subCategories = SubCategory::where('status', StatusEnum::Active->value)->get();
        // $tags = Tag::where('status', StatusEnum::Active->value)->get();
        // $taxs = Tax::where('status', StatusEnum::Active->value)->get();
        // $attribute = Attribute::where('status', StatusEnum::Active->value)->get();
        return view('admin.product.create', compact('categories', 'brands', 'subCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {
        $randomProductId = mt_rand(1000000000, 9999999999);
        $category_name = Category::where('id', $request->category_id)->first();

        if ($request->hasFile('product_image')) {
            $product_image = $this->uploader->upload($request->file('product_image'), 'uploads/product/');
            $product['product_image'] = $product_image;
        }

        if ($request->hasFile('thumbnail_image')) {
            $thumbnail_image = $this->uploader->uploadMultiple($request->file('thumbnail_image'), 'uploads/product/');
            $product['thumbnail_image'] = $thumbnail_image;
        }

        $customerPrice = $request->regular_price;

        $customerDiscountAmount = $request->discount_fixed;
        $customerCurrentPrice = $customerPrice - $customerDiscountAmount;

        if ($customerPrice < $customerDiscountAmount) {
            return back()->with('error', 'Discounted price too long!');
        } else {
            $product = new Product();
            $product->category_id = $request->category_id ?? null;
            $product->sub_category_id = $request->sub_category_id ?? null;
            $product->brand_id = $request->brand_id ?? null;
            $product->tag = $request->tag ?? null;
            $product->added_by = auth()->user()->id ?? null;
            $product->product_name = $request->product_name ?? null;
            $product->sku = $request->product_name . '-' . Str::random(4) ?? null;
            $product->product_code = $randomProductId . '-' . Str::random(4) ?? null;
            $product->slug = str_replace([' ', '/', ',', '.'], '-', $category_name->name . '-' . $request->product_name) ?? null;
            $product->long_description = $request->long_description ?? null;
            $product->warranty_day = $request->warranty_day ?? 0;
            $product->numbering = $request->numbering ?? null;
            $product->thumbnail_image = $thumbnail_image ?? '["default-product-image.png"]';
            $product->product_image = $product_image ?? 'default-product-image.png';
            $product->lowest_price_qty = $request->lowest_price_qty ?? null;
            $product->bulk_quantity = $request->bulk_quantity ?? null;
            $product->seo_title = $request->seo_title ?? null;
            $product->seo_keyword = $request->seo_keyword ?? null;
            $product->seo_description = $request->seo_description ?? null;
            $product->hot_sale = $request->hot_sale ?? false;
            $product->new_arrival = $request->new_arrival ?? false;
            $product->trending = $request->trending ?? false;
            $product->featured = $request->featured ?? false;
            $product->save();

            $priceInsert = new RegularPrice();
            $priceInsert->product_id = $product->id;
            $priceInsert->regular_price = $customerPrice;
            $priceInsert->lowest_price = $request->lowest_price;
            $priceInsert->discount_fixed = $customerCurrentPrice ?? $customerPrice;
            $priceInsert->discount_percentage = $request->discount_percentage ?? 00;
            $priceInsert->save();

            return redirect()->route('products.index')->with('success', 'Created successfully!');
        }
        // $this->productService->store($request->validated());
    }

    public function productShow($id)
    {
        $product = Product::find($id);
        // $dealerPrice = DealerPrice::select('dealer_price', 'dealer_dis_fixed', 'dealer_dis_percentage')->where('product_id', $product->id)->first();
        $userPrice = RegularPrice::select('regular_price', 'discount_fixed', 'discount_percentage')->where('product_id', $product->id)->first();
        return view('admin.product.show', compact('product', 'userPrice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function productEdit($id)
    {
        $product = Product::with('colorImages')->find($id);
        if (is_string($product->thumbnail_image)) {
            $product->thumbnail_image = json_decode($product->thumbnail_image, true);
        }
        $categories = Category::where('status', StatusEnum::Active->value)->get();
        $subCategories = SubCategory::where('status', StatusEnum::Active->value)->get();
        $brands = Brand::where('status', StatusEnum::Active->value)->get();
        $colors = Color::select('id', 'color_name', 'color_code')->get();
        // $dealerPrice = DealerPrice::select('dealer_price', 'dealer_dis_fixed', 'dealer_dis_percentage')->where('product_id', $product->id)->first();
        // $userPrice = RegularPrice::select('regular_price', 'discount_fixed', 'discount_percentage')->where('product_id', $product->id)->first();
        session(['last_visited_url' => url()->current()]);
        // dd($product->colorImages);
        return view('admin.product.edit', compact('product', 'categories', 'brands', 'subCategories', 'colors'));
    }

    public function inventory($id)
    {
        $product = Product::find($id);
        return view('admin.product.inventory', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, $id)
    {
        $category_name = Category::where('id', $request->category_id)->first();
        $randomProductId = mt_rand(1000000000, 9999999999);
        $product = Product::find($id);

        if (!$request['thumbnail_image']) {
            $product->thumbnail_image = $product->thumbnail_image;
            $product->save();
        } else {
            if (isset($request['thumbnail_image'])) {
                $newJson = $this->uploader->uploadMultiple($request['thumbnail_image'], 'uploads/product/');
                $newArr = json_decode($newJson, true);
                $oldArr = json_decode($product->thumbnail_image, true);
                $updatedJson = json_encode(array_merge($oldArr, $newArr));
                $request['thumbnail_image'] = $updatedJson;
                $product->thumbnail_image = $updatedJson ?? null;
                $product->save();
            }
        }
        if (!$request['product_image']) {
            $product->product_image = $product->product_image;
            $product->save();
        } else {
            if (isset($request['product_image'])) {
                $oldFile = \public_path('uploads/product/' . $product->product_image);
                if (isset($product->product_image)) {
                    if (file_exists($oldFile)) {
                        if ($product->product_image != 'default-product-image.png') {
                            unlink($oldFile);
                        }
                    }
                }
                $product_image = $this->uploader->upload($request->file('product_image'), 'uploads/product/');
                $request['product_image'] = $product_image;
                $product->product_image = $product_image;
                $product->save();
            }
        }

        $price = $request->regular_price;
        $disPrice = $request->discount_fixed;
        if ($price < $disPrice) {
            return back()->with('error', 'Discounted price too long!');
        } else {
            $product->category_id = $request->category_id ?? null;
            $product->sub_category_id = $request->sub_category_id ?? null;
            $product->brand_id = $request->brand_id ?? null;
            $product->tag = $request->tag ?? null;
            $product->added_by = auth()->user()->id ?? null;
            $product->product_name = $request->product_name ?? null;
            $product->slug = str_replace([' ', '/', ',', '.'], '-', $category_name->name . '-' . $request->product_name) ?? null;
            $product->sku = $request->product_name . '-' . Str::random(4) ?? null;
            $product->product_code = $randomProductId . '-' . Str::random(4) ?? null;
            $product->short_description = $request->short_description ?? null;
            $product->long_description = $request->long_description ?? null;
            $product->warranty_day = $request->warranty_day ?? null;
            $product->numbering = $request->numbering ?? null;
            $product->lowest_price_qty = $request->lowest_price_qty ?? null;
            $product->bulk_quantity = $request->bulk_quantity ?? null;
            $product->seo_title = $request->seo_title ?? null;
            $product->seo_keyword = $request->seo_keyword ?? null;
            $product->seo_description = $request->seo_description ?? null;
            $product->save();

            return redirect()->route('products.index')->with('success', 'Updated successfully!');
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $purchase = Purchase::select('id', 'product_id')->where('product_id', $id)->exists();
        if ($purchase == true) {
            return response()->json('This product already purchased!');
        } else {
            $product->delete();
        }
        return response()->json('Deleted successfully!');
    }



    public function addFeatured($id)
    {
        $item = Product::find($id);
        $item->featured = true;
        $item->save();
        return response()->json('Featured Added successfully!');
    }

    public function removeFeatured($id)
    {
        $item = Product::find($id);
        $item->featured = false;
        $item->save();
        // return back()->with('Featured remove successfully!');
        return response()->json('Featured remove successfully!');
    }

    public function addTrending($id)
    {
        $item = Product::find($id);
        $item->trending = true;
        $item->save();
        return back()->with('success', 'Added trending successfully!');
    }

    public function removeTrending($id)
    {
        $item = Product::find($id);
        $item->trending = false;
        $item->save();
        return response()->json('Remove trending successfully!');
    }

    public function addArrival($id)
    {
        $item = Product::find($id);
        $item->new_arrival = true;
        $item->save();

        return response()->json('Added arrival successfully!');
    }

    public function removeArrival($id)
    {
        $item = Product::find($id);
        $item->new_arrival = false;
        $item->save();
        return response()->json('Remove arrival successfully!');
    }

    public function addHotSale($id)
    {
        $item = Product::find($id);
        $item->hot_sale = true;
        $item->save();

        return response()->json('Added hot-sale successfully!');
    }

    public function removeHotSale($id)
    {
        $item = Product::find($id);
        $item->hot_sale = false;
        $item->save();
        return response()->json('Remove hot-sale successfully!');
    }

    public function active($id)
    {
        $this->productService->statusInactive($id);
        return response()->json(['Status changed successfully!']);
    }

    public function inActive($id)
    {
        $this->productService->statusActive($id);
        return response()->json(['Status changed successfully!']);
    }
    public function brandWise($id, BrandWiseProductDataTable $dataTable)
    {
        $dataTable->setBrandId($id);
        return $dataTable->render('admin.product.index');
    }
}
