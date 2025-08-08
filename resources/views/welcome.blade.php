@extends('frontend.layouts.master_frontend')
@section('section')
    <!-- hero slider -->

    <div class="mx-auto container sm:px-5 -z-10">
        <!-- Swiper -->
        <div class="swiper heroSlider select-none ">

            <div class="swiper-wrapper text-gray-700" style="z-index: -1; height: 60vh; ">
                @foreach ($sliders as $slider)
                    <div class="swiper-slide">
                        <div class="w-full h-full block">
                            <img src="{{ asset('uploads/slider/' . $slider->image) ?? asset($slider->image) }}" alt="img"
                                class="w-full h-full object-cover relative">
                            <div class="slider_head" style="position: absolute;  top: 50px; left: 50%; transform: translateX(-50%);">
                                <h2 style="line-height: 120%; text-align: center; font-weight: bold; "
                                    class="slider-sub-title uppercase text-[24px] md:text-[34px] xl:text-[40px] animate__animated animate__bounce bg-transparent">
                                    {{ $slider->heading }}
                                </h2>
                                <p style="text-align: center; font-size: 18px;" class="slider-descriptions py-2">
                                    {{ $slider->short_para }}</p>
                                <div style="display: flex; align-items: center; justify-content: center; gap: 30px; padding-top: 15px;">
                                    <div style="position: relative;">
                                        <div style="display: flex; align-items: center; white-space: nowrap; color: blue; cursor: pointer;"
                                            class="slider-learn-more-btn font-semibold">
                                            Lern more
                                            <svg style="width: 18px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                                                xml:space="preserve">
                                                <path style="fill:none;stroke:#0000ff;stroke-width:2;stroke-miterlimit:10"
                                                    d="m12.25 5 11 11-11 11" />
                                            </svg>
                                        </div>
                                        {{-- learn more model --}}
                                        <div class="slider-learn-more-content">
                                            <div class="slider-close-btn"
                                                style="padding: 10px; cursor: pointer; display: flex; justify-content: space-between; border-bottom: 1px solid #ddd;">
                                                <span style="font-weight: 600; ">Details</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-x">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M18 6l-12 12" />
                                                    <path d="M6 6l12 12" />
                                                </svg>
                                            </div>
                                            <div style="padding: 5px 10px 10px 10px; text-align: justify;">
                                                {!! $slider->paragraph !!}
                                            </div>
                                        </div>
                                    </div>
                                    <a style="display: flex; align-items: center; white-space: nowrap; color: blue; "
                                        href="{{ $slider->url }}" class="font-semibold">
                                        Shop now
                                        <svg style="width: 18px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                                            xml:space="preserve">
                                            <path style="fill:none;stroke:#0000ff;stroke-width:2;stroke-miterlimit:10"
                                                d="m12.25 5 11 11-11 11" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="swiper-slide grid items-center justify-center gap-5 lg:gap-10 block sm:hidden">
                        <h2 style="line-height: 120%"
                            class="slider-sub-title text-center uppercase text-[20px] font-[400] md:text-[34px] xl:text-[40px] animate__animated animate__bounce">
                            {{ $slider->heading }}
                        </h2>
                        <div class="flex-1 w-full h-full block">
                            <img src="{{ asset('uploads/slider/' . $slider->image) ?? asset($slider->image) }}"
                                alt="img" class="w-full h-full object-contain">
                        </div>
                        <p class="!visible hidden text-center slider-descriptions py-5 font-[200]"
                            id="{{ $slider->id }}_learnPara">{!! $slider->paragraph !!}</p>
                        <div class="justify-center flex gap-10 text-xs">
                            <a href="#" data-slider-id="{{ $slider->id }}" onclick="learnMoreBtn($(this))">Learn
                                More ></a>
                            <a href="{{ $slider->url }}"> Shop Now ></a>
                        </div>
                    </div> --}}
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <div class="mx-auto w-full xl:container px-6 my-10 text-gray-700">
        <div class="max-w-[800px] mx-auto">
            <h2 class="text-center text-[26px] sm:text-[36px]">Featured Items</h2>
            <p class="text-center font-Exo">Stay charged on the go with our powerful, fast-charging mobile solutions. Power
                up your life with convenience and style!</p>
        </div>
        <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-y-10 mt-10">
            @foreach ($products as $product)
                @include('frontend.product.components.product-content')
                {{-- <div class="bg-white p-2 sm:p-5 grid gap-2 border-r ">
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
                            </div>
                            <a href="{{ route('addproduct.to.cart', $product->id) }}" id="addCartUpdate"
                                class="bg-slate-100 hover:bg-fave-500 p-2 rounded-lg hidden sm:block">
                                <img src="{{ asset('frontend/images/Cart-50pix.png') }}" alt="img"
                                    style="width: 15px;">
                            </a>
                        </div>
                    @endif
                </div> --}}
            @endforeach
        </div>
    </div>
    <!-- ABOUT VOLTME start -->
    <!-- ABOUT VOLTME end  -->
    @if($bannars->count() > 0)
    <div class="mx-auto container sm:px-5 -z-10 mt-16">
        <!-- Swiper -->
        <div class="swiper heroSlider">
            <div class="swiper-wrapper text-gray-700" style="z-index: -1; height: 60vh; ">
                @foreach ($bannars as $bannar)
                    <div class="swiper-slide">
                        <div class="w-full h-full block">
                            <a href="{{ $bannar->url }}">
                                <img src="{{ asset('uploads/slider/' . $bannar->image) ?? asset($bannar->image) }}" alt="img"
                                    class="w-full h-full object-cover relative">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
             <!-- If we need pagination -->
            <div class="swiper-pagination"></div>
            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            {{-- <div class="swiper-scrollbar"></div> --}}
        </div>
    </div>
    @else
        <div class="mt-16">
            <div class="grid lg:flex items-center justify-between bg-fave-500"
                style="background: url('{{ asset('frontend/images/bg-pattarn.jpg') }}')">
                <div class="flex-1 text-white">
                    <div class="w-full lg:max-w-[600px] mx-auto grid gap-2 p-5 sm:p-14 xl:px-5">
                        <h2 style="color: #000; font-weight: 600;"
                            class="text-[24px]  md:text-[34px] xl:text-[40px] text-center sm:text-left">ABOUT VOLTME
                        </h2>
                        <p style="color: #000;  font-weight: 400;" class=" aboutVoltme">VOLTME believes being
                            at the forefront of innovation is the key to sustainability. Technology and discovery are key agents
                            driving our world forward. We continue to push enginnering limits in expanding upon key technologies
                            beyond what they can do and ask how can it apply to our lives, how it can affect us, and how we can
                            make it better.</p>
                    </div>
                </div>
                <div class="flex-1">
                    <img src="{{ asset('frontend/images/gan.jpeg') }}" alt="img" class="w-full sm:h-[500px] object-cover">
                </div>
            </div>
        </div>
    @endif
    <!-- ABOUT VOLTME testing -->


    <!-- Arrival section -->
    <div class="swiper heroSlider select-none ">
        <div class="swiper-wrapper">
            @if ($arrivals == null)
                <div class="swiper-slide">
                    <div class="relative overflow-hidden text-gray-700 w-full bg-fixed bg-contain">
                        <div class=" py-10 w-full h-full grid items-center">
                            <div class="mx-auto w-full xl:max-w-screen-xl px-6">
                                <div class="grid lg:flex items-center lg:gap-10 justify-between ">
                                    <div class="flex-1">
                                        <img src="{{ asset('default/default-arrival.jpg') }}" alt="img"
                                            class="object-cover" data-aos="fade-right">
                                    </div>
                                    <div class="flex-1 bg-white/70 backdrop-blur-sm p-5 sm:p-8 xl:py-10 xl:px-16 grid gap-2 rounded"
                                        data-aos="fade-left">
                                        <div class="block grid justify-center sm:hidden">
                                            <span style="font-weight: 600"
                                                class="text-[24px] md:text-[34px] xl:text-[40px]font-semibold bg-fave-500 py-2 px-5 rounded">New
                                                Arrival</span>
                                        </div>
                                        <div class="block hidden sm:block">
                                            <span style="font-weight: 600"
                                                class="text-[24px] md:text-[34px] xl:text-[40px]font-semibold bg-fave-500 py-2 px-5 rounded">New
                                                Arrival</span>
                                        </div>
                                        <p style="font-weight: 400;"
                                            class="text-center sm:text-left text-lg sm:text-xl font-semibold ">Voltme
                                            Hypercore 10K Portable Power Bank</p>
                                        <p class="aboutVoltMeDetails line-clamp-[7] lg:line-clamp-5 !font-[200]">
                                            Voltme Hypercore 10K Portable Power Bank, is a cutting-edge solution to keep
                                            your devices charged and ready to go, wherever life takes you. With a robust
                                            battery capacity of 10000mAh, it offers reliable power support for your gadgets,
                                            ensuring you stay connected on the move.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                @foreach ($arrivals as $arrival)
                    <div class="swiper-slide">
                        <div class="relative overflow-hidden text-gray-700 w-full bg-fixed bg-contain">
                            <div class=" py-10 w-full h-full grid items-center">
                                <div class="mx-auto w-full xl:max-w-screen-xl px-6">
                                    <div class="grid lg:flex items-center lg:gap-10 justify-between ">
                                        <div class="flex-1">
                                            @if (isset($arrival->product_image))
                                                <img src="{{ asset('uploads/product/' . $arrival->product_image) }}"
                                                    alt="img" class="object-cover" data-aos="fade-right">
                                            @else
                                                <img src="{{ asset('default/default-slider.jpeg') }}" alt="img"
                                                    class="object-cover" data-aos="fade-right">
                                            @endif
                                        </div>
                                        <div class="flex-1 bg-white/70 backdrop-blur-sm p-5 sm:p-8 xl:py-10 xl:px-16 grid gap-2 rounded"
                                            data-aos="fade-left">
                                            <div class="block grid justify-center sm:hidden">
                                                <span style="font-weight: 600"
                                                    class="text-[24px] md:text-[34px] xl:text-[40px]font-semibold bg-fave-500 py-2 px-5 rounded">New
                                                    Arrival</span>
                                            </div>
                                            <div class="block hidden sm:block">
                                                <span style="font-weight: 600"
                                                    class="text-[24px] md:text-[34px] xl:text-[40px]font-semibold bg-fave-500 py-2 px-5 rounded">New
                                                    Arrival</span>
                                            </div>
                                            <p style="font-weight: 400;"
                                                class="text-center sm:text-left text-lg sm:text-xl font-semibold ">
                                                {{ $arrival->product_name ?? 'Voltme Hypercore 10k' }}</p>
                                            <p class="aboutVoltMeDetails line-clamp-[7] lg:line-clamp-5 !font-[200]">
                                                {!! Str::limit(strip_tags($arrival->long_description), 200, '...') !!}</p>
                                            <div class="grid justify-center sm:hidden">
                                                <a href="{{ route('frontend.product.details', ['slug' => $arrival->slug, 'id' => $arrival->id]) }}"
                                                    class="text-center sm:text-left bg-fave-500 py-2 px-5 hover:shadow-lg hover:shadow-fave-100 rounded border-b-2 border-fave-700 text-white font-semibold max-w-[150px] text-center mt-2">
                                                    Details
                                                </a>
                                            </div>
                                            <div class="hidden sm:block">
                                                <a href="{{ route('frontend.product.details', ['slug' => $arrival->slug, 'id' => $arrival->id]) }}"
                                                    class="text-center sm:text-left bg-fave-500 py-2 px-5 hover:shadow-lg hover:shadow-fave-100 rounded border-b-2 border-fave-700 text-white font-semibold max-w-[150px] text-center mt-2">
                                                    Details
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="swiper-pagination"></div>
    </div>
    <!-- Youtube section -->
    @if (!empty($siteSettings->first()->youtube_link_two))
        <div class="mt-16">
            <div class="grid lg:flex items-center bg-fave-500">
                <iframe width="100%" height="500" src="{{ $siteSettings->first()->youtube_link_two }}"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
            </div>
        </div>
    @endif
@endsection
@push('js')
    <script>
        function learnMoreBtn(elem) {
            var slider = elem.data('slider-id');
            var learnPara = $('#' + slider + '_learnPara');
            if (learnPara.hasClass('hidden')) {
                learnPara.removeClass('hidden');
            } else {
                learnPara.addClass('hidden');
            }
        }
    </script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const learnMoreBtns = document.querySelectorAll('.slider-learn-more-btn');
            const closeBtns = document.querySelectorAll('.slider-close-btn');

            learnMoreBtns.forEach((btn, index) => {
                btn.addEventListener('click', () => {
                    const content = document.querySelectorAll('.slider-learn-more-content')[index];
                    content.classList.toggle('slider-learn-more-content-active');
                });
            });

            closeBtns.forEach((closeBtn, index) => {
                closeBtn.addEventListener('click', () => {
                    const content = document.querySelectorAll('.slider-learn-more-content')[index];
                    content.classList.remove('slider-learn-more-content-active');
                });
            });
        });
    </script>
@endpush
