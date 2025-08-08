<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\ProductStatus;
use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Inventory;
use App\Models\News;
use App\Models\Order;
use App\Models\OrderList;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\Review;
use App\Models\Slider;
use App\Models\SubCategory;
use App\Models\Utils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        $product = Product::select('id', 'slug', 'product_image', 'sku', 'product_name', 'category_id', 'status', 'long_description', 'a_status')
        ->with('dealerPrice')
        ->with('userPrice');
        $items = clone $product;
        $products = $items->whereIn('status', [ProductStatus::Active->value, ProductStatus::Comming->value])
            ->where('a_status', ProductStatus::Featured->value)
            ->limit(8)->orderBy('numbering', 'asc')->get();
        $arrivals = clone $product;
        $arrivals = $arrivals->whereIn('status', [ProductStatus::Active->value, ProductStatus::Comming->value])
            ->where('a_status', ProductStatus::Arrival->value)->get();
        $slider = Slider::select('id', 'heading', 'paragraph', 'url', 'button_type', 'short_para', 'image', 'numbering', 'status');
        $sliderMain = clone $slider;
        $sliders = $sliderMain->where('status', StatusEnum::Active->value)->orderBy('numbering', 'asc')->get();
        $bannars = $slider->where('status', StatusEnum::Bannar->value)->get();
        return view('welcome', compact('products','arrivals','sliders', 'bannars'));
    }

    public function productDetails($slug, $id)
    {
        $product = Product::select('id', 'category_id', 'brand_id', 'product_image', 'slug', 'sku', 'tag', 'short_description', 'long_description', 'warranty_day', 'product_name', 'status', 'thumbnail_image')
        ->with('userPrice', 'inventory', 'brand')->where('status', ProductStatus::Active)->find($id);
        $days = $product->warranty_day;
        $days_per_month = 30.44;

        $months = $days / $days_per_month;

        $inventory = Inventory::select('id', 'product_id', 'quantity', 'color_id')
        ->with('product','color')->where('product_id', $id);
        $inventories = $inventory->get();
        $totalQuantity = $inventory->sum('quantity');
        $inventory = $inventory->first();
        $relatedProducts = $product->where('category_id', $product->category_id)->where('id', '!=', $id)->limit(4)->with('dealerPrice')->where('status', ProductStatus::Active)->with('userPrice')->get();
        $reviews = Review::select('id', 'name', 'rating', 'comment')->where('product_id', $id)->where('status', StatusEnum::Active)
            ->get();

        $averageRating = $reviews->isEmpty() ? 0 : $reviews->average('rating');
        $orderList = null;
        if (auth()->check()) {
            $order = Order::select('id', 'user_id', 'status')
                ->where('user_id', auth()->user()->id)->where('status', StatusEnum::Complete->value)->first();
            if (isset($order->id)) {
                $orderList = OrderList::select('id')->where('order_id', $order->id)->where('product_id', $product->id)->first();
            }
        }

        $allCart = session('cart', []);

        // if (isset($inventory->quantity) && $inventory->quantity > 30) {
        //     $inventory->quantity = 30;
        // }

        $productColors = ProductColor::with('color')->where('product_id', $product->id)->get();
        return view('frontend.product.details', compact('months', 'product', 'inventory', 'averageRating', 'orderList', 'reviews', 'relatedProducts', 'allCart', 'inventories', 'productColors', 'totalQuantity'));
    }

    public function categoryWisePage($slug, $type)
    {
        $category = Category::select('id', 'name', 'slug')->where('status', StatusEnum::Active->value);
        $subCategory = SubCategory::select('id', 'name', 'slug')->where('status', StatusEnum::Active->value);
        $brand = Brand::select('id', 'name', 'slug')->where('status', StatusEnum::Active->value);
        $product = Product::select(
            'products.id',
            'products.slug',
            'products.product_image',
            'products.sku',
            'products.product_name',
            'products.category_id',
            'products.sub_category_id',
            'products.brand_id',
            'products.status',
            'products.long_description'
        )
        ->with(['dealerPrice', 'userPrice', 'category']) // Eager load category and other relationships
        ->whereIn('products.status', [ProductStatus::Active->value, ProductStatus::Comming->value])
        ->distinct();

        if($type == 'category') {
            $category = $category->where('slug', $slug)->first();
            $products = $product->where('products.category_id', $category->id)
            ->whereIn('products.status', [ProductStatus::Active->value, ProductStatus::Comming->value])
            ->orderBy('products.id', 'DESC') // Order by product ID or any other column as needed
            ->get();
        } elseif ($type == 'sub-category') {
            $subCategory = $subCategory->where('slug', $slug)->first();
            $products = $product->where('products.sub_category_id', $subCategory->id)
            ->whereIn('products.status', [ProductStatus::Active->value, ProductStatus::Comming->value])
            ->orderBy('products.id', 'DESC') // Order by product ID or any other column as needed
            ->get();
        } else {
            $brand = $brand->where('slug', $slug)->first();
            $products = $product->where('products.brand_id', $brand->id)
            ->whereIn('products.status', [ProductStatus::Active->value, ProductStatus::Comming->value])
            ->orderBy('products.id', 'DESC') // Order by product ID or any other column as needed
            ->get();
        }
        $categories = $category->orderBy('created_at', 'desc')->get();
        $brands = $brand->orderBy('created_at', 'desc')->get();
        return view('frontend.product.category', compact('products','categories', 'brands'));
    }

    public function aboutSalamat()
    {
        return view('frontend.about.salamat');
    }

    public function aboutVolt()
    {
        return view('frontend.about.volt-me');
    }

    public function newsIndex()
    {
        $newses = News::where('status', StatusEnum::Active->value)->orderBy('created_at', 'desc')->get();
        return view('frontend.news.index', compact('newses'));
    }

    public function newsDetails(News $news)
    {
        return view('frontend.news.details', compact('news'));
    }

    public function warrantyPrivacy()
    {
        $policy = Utils::where('status', StatusEnum::Active->value)->first();;
        return view('frontend.utils.warranty-policy', compact('policy'));
    }

    public function privacy()
    {
        $policy = Utils::where('status', StatusEnum::Active->value)->first();;
        return view('frontend.utils.privacy', compact('policy'));
    }

    public function terms()
    {
        $policy = Utils::where('status', StatusEnum::Active->value)->first();;
        return view('frontend.utils.terms', compact('policy'));
    }

    public function refundPolicy()
    {
        $policy = Utils::where('status', StatusEnum::Active->value)->first();;
        return view('frontend.utils.refund-policy', compact('policy'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = Product::select('id', 'slug', 'product_image', 'product_name', 'category_id', 'status')
        ->where('status', ProductStatus::Active)
        ->with('dealerPrice')->with('userPrice')
        ->where('product_name', 'LIKE', '%' . $query . '%')->get();

        return view('frontend.search-results.index', ['results' => $results]);
    }

    public function searchIndex()
    {
        $products = Product::select('product_name')->where('status', ProductStatus::Active)->get();
        $data = [];

        foreach ($products as $product) {
            $data[] = $product['product_name'];
        }
        return $data;
    }

    public function allCategory($type)
    {
        // if($type == 'category') {
            $categories = Category::select('id', 'name', 'slug', 'status')->where('status', StatusEnum::Active->value)->orderBy('created_at', 'desc')->get();
            $brands = Brand::select('id', 'name', 'slug', 'status')->where('status', StatusEnum::Active->value)->orderBy('created_at', 'desc')->get();
        // }
        $products = Product::select(
            'products.id',
            'products.slug',
            'products.product_image',
            'products.sku',
            'products.product_name',
            'products.category_id',
            'products.status',
            'products.long_description'
        )
        ->with(['userPrice'])
        ->distinct()
        ->whereIn('products.status', [ProductStatus::Active->value])
        ->get();

        return view('frontend.product.all-category', compact('products','categories', 'brands'));
    }

    public function colorImages(Request $request)
    {
        Session::forget('color_id');
        session()->put('color_id', $request->color_id);
        $colorImages = ProductColor::select('id', 'product_id', 'color_id', 'color_images')->where('product_id', $request->product_id)
                                ->where('color_id', $request->color_id)
                                ->pluck('color_images')
                                ->flatten();
        $colorImages = $colorImages->map(function($images) {
            return json_decode($images, true);
        })->flatten();
        $colorQuantity = Inventory::select('id', 'quantity', 'color_id', 'product_id')
                        ->where('product_id', $request->product_id)
                        ->where('color_id', $request->color_id)->sum('quantity');

        if ($colorQuantity == 0) {
            $showColorQty = '0';
        } elseif ($colorQuantity > 30) {
            $showColorQty = 30;
        } else {
            $showColorQty = $colorQuantity;
        }
        return response()->json(['images' => $colorImages, 'showColorQty' => $showColorQty]);
    }
}
