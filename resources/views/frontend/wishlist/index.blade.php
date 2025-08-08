@extends('frontend.layouts.master_frontend')
@section('pageTitle')
    {{ __('Wishlist') }}
@endsection
@section('section')
    <div class="relative">
        <img src="{{ asset('frontend/images/contact-about-bg.webp') }}" alt="img" class="min-h-[220px] object-cover">
        <div class="absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
            <h2 class="text-[18px] text-center sm:text-[30px] font-bold text-white bg-white/50 py-2 px-5 rounded uppercase">
                Wishlist Product</h2>
        </div>
    </div>

    <div class="mx-auto xl:container px-5 py-10">
        <div class=" min-w-lg overflow-auto grid gap-5">
            @if (session('wishList'))
                @foreach (session('wishList') as $id => $wishList)
                    <div class="flex justify-between items-center gap-5 border-b py-2">
                        <img src="{{ asset('uploads/product/' . $wishList['product_image']) ?? asset($wishList['product_image']) }}"
                            alt="img" class="w-[100px] border">
                        <a href="{{ route('frontend.product.details', ['slug' => $wishList['slug'], 'id' => $wishList['id']]) }}"
                            style="width: 300px;" class=" min-w-[300px] text-center">{{ $wishList['name'] }}</a>
                        <div class="flex items-center gap-2">
                            <span class=" text-lg whitespace-nowrap">&#2547;.
                                {{ $wishList['userPrice']->discount_fixed }}</span>
                            @if ($wishList['userPrice']->discount_fixed != $wishList['userPrice']->regular_price)
                                <del class="text-sm bg-fave-500 py-1 px-2 text-white rounded-full whitespace-nowrap">&#2547;.
                                    {{ $wishList['userPrice']->regular_price }}</del>
                            @endif
                        </div>
                        <a href="{{ route('addproduct.to.cart', $id) }}" id="addCartUpdate"
                            class="bg-fave-500 py-2 px-5 font-semibold text-white rounded-full whitespace-nowrap">Add To
                            Cart</a>
                        <a href="{{ route('remove.wishlist', $id) }}">
                            <button class="text-red-500 hover:bg-red-500 p-2 rounded-full hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M4 7l16 0"></path>
                                    <path d="M10 11l0 6"></path>
                                    <path d="M14 11l0 6"></path>
                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                </svg>
                            </button>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
