<div class="bg-white p-2 sm:p-5 grid gap-2 border-r ">
    <div class="flex justify-between">
        <a href="{{ route('categories.wise_page', ['slug' => $product->category->slug, 'type' => 'category']) }}"
            class="text-sm hover:text-fave-500">{{ $product->category->name }}</a>
    </div>
    <a href="{{ route('frontend.product.details', ['slug' => $product->slug, 'id' => $product->id]) }}">
        @if ($product->product_image == 'default-product-image.png')
            <img src="{{ asset('default/' . $product->product_image) }}" alt="product-img"
                class="w-full max-h-[220px] object-contain">
        @else
            <img src="{{ asset('uploads/product/' . $product->product_image) }}" alt="product-img"
                class="w-full max-h-[220px] object-contain">
        @endif
    </a>
    <div class="flex">
        @php
            $ratings = App\Models\Review::where('product_id', $product->id)
                ->where('status', App\Enums\StatusEnum::Active->value)
                ->pluck('rating');
            $averageRating = $ratings->isEmpty() ? 0 : $ratings->avg();
        @endphp
        @for ($i = 1; $i <= 5; $i++)
            @if ($i <= $averageRating)
                <svg xmlns="http://www.w3.org/2000/svg" class="text-yellow-300" width="16"
                    height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path
                        d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                        stroke-width="0" fill="currentColor"></path>
                </svg>
            @endif
        @endfor
    </div>
    <a href="{{ route('frontend.product.details', ['slug' => $product->slug, 'id' => $product->id]) }}"
        class="line-clamp-2 text-sm hover:text-fave-500 cursor-pointer">{{ $product->product_name }}</a>
    @if ($product->status == App\Enums\ProductStatus::Comming->value)
        <button
            class="slider-button bg-fave-500 px-5 py-2 hover:shadow-lg hover:shadow-fave-100 rounded border-b-2 border-fave-700 text-black font-semibold">Coming
            Soon </button>
    @else
        <div class="flex justify-between">
            <div class="flex items-center gap-1 sm:gap-3">
                <p class="font-semibold sm:text-lg">TK.{{ $product->userPrice->discount_fixed }}</p>
                <div class="flex items-center gap-1 sm:gap-2 text-xs sm:text-sm">
                    @if ($product->userPrice->discount_fixed != $product->userPrice->regular_price)
                        <del class="text-slate-500">TK.{{ $product->userPrice->regular_price }}</del>
                        <span
                            class="hidden sm:block">{{ $product->userPrice->discount_percentage }}%</span>
                    @endif
                </div>
                {{-- @can('isDealer')
                    <p class="font-semibold text-lg">TK.{{ $product->dealerPrice->dealer_dis_fixed }}</p>
                    <div class="flex items-center gap-2 text-sm">
                        @if ($product->dealerPrice->dealer_dis_fixed != $product->dealerPrice->dealer_price)
                            <del class="text-slate-500">TK.{{ $product->dealerPrice->dealer_price }}</del>
                            <span>{{ $product->dealerPrice->dealer_dis_percentage }}%</span>
                        @endif
                    </div>
                @endcan --}}
            </div>
            {{-- <form action="{{ route('add.cart', $product->id) }}" method="post" id="addCart">
                @csrf
                <input type="hidden" name="quantity" value="1">
                @can('isUser')
                    <input type="hidden" name="price" value="{{ $product->userPrice->discount_fixed }}">
                @endcan
                @can('isAdmin')
                    <input type="hidden" name="price" value="{{ $product->userPrice->discount_fixed }}">
                @endcan
                <button type="submit"
                    class="bg-slate-100 hover:bg-fave-500 hover:text-white p-2 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="1.3" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                        <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                        <path d="M17 17h-11v-14h-2"></path>
                        <path d="M6 5l14 1l-1 7h-13"></path>
                    </svg>
                </button>
            </form> --}}
            <a href="{{ route('frontend.product.details', ['slug' => $product->slug, 'id' => $product->id]) }}"
                class="bg-slate-100 hover:bg-fave-500 p-2 rounded-lg hidden sm:block">
                <img src="{{ asset('frontend/images/Cart-50pix.png') }}" alt="img"
                    style="width: 15px;">
            </a>
        </div>
    @endif
</div>
