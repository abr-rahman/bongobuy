<nav role="navigation" class="backdrop-blur web_nav">
    <div class="mx-auto container px-6">
        <div class="flex items-center justify-between height-43">
            <div class="inset-y-0 left-0 flex items-center xl:hidden">
                <div class="inline-flex items-center justify-center  hover:text-gray-100">
                    <div class="visible xl:hidden">
                        <svg onclick="MenuHandler(this,true)" aria-haspopup="true" aria-label="Main Menu"
                            xmlns="http://www.w3.org/2000/svg" class="show-m-menu icon icon-tabler icon-tabler-menu"
                            width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"></path>
                            <line x1="4" y1="8" x2="20" y2="8"></line>
                            <line x1="4" y1="16" x2="20" y2="16"></line>
                        </svg>
                    </div>
                    <div class="" onclick="MenuHandler(this,false)">
                        <svg aria-label="Close" xmlns="http://www.w3.org/2000/svg" width="70" height="70"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <line x1="18" y1="6" x2="6" y2="18" />
                            <line x1="6" y1="6" x2="18" y2="18" />
                        </svg>
                    </div>
                </div>
            </div>
            <a href="/" style="width: 88px; height: 16px;">
                <img src="{{ asset('uploads/logo/' . $siteSettings->first()->logo) ?? asset('frontend/images/logo.png') }}"
                    alt="logo">
            </a>
            <ul class="hidden xl:flex md:mr-6 xl:mr-16">
                <li class="group">
                    <div class="focus:text-fave-500 hover:text-fave-500 flex px-5 items-center py-2 text-white cursor-pointer">
                        <span><a href="{{ route('all.categories', ['type' => 'category']) }}">Shop</a></span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-down"
                            width="18" height="18" viewBox="0 0 24 24" stroke-width="1.7" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M6 9l6 6l6 -6"></path>
                        </svg>
                    </div>
                    <div class="w-full absolute left-0 opacity-0 invisible group-hover:visible group-hover:opacity-100 -mt-4 group-hover:mt-0 shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] whitespace-nowrap text-white"
                        style="background-color: #4c4c4c;  min-height: 400px;">
                        <span style="position: absolute; width: 100vw; height: 100vh; background: #000000b9; display: block; z-index: -1; "></span>
                        <ul style="width: 700px;  margin: 0 auto; display: grid;">
                            @php
                                $categories = App\Models\Category::select('id', 'name')
                                    ->where('status', App\Enums\StatusEnum::Active->value)
                                    ->with('subCategory')
                                    ->orderBy('created_at', 'desc')
                                    ->get();
                            @endphp
                            <li class="flex items-start gap-10"
                                style="position: relative; width: 100%; display: block;">
                                <div class="grid">
                                    @foreach ($categories as $category)
                                        <div class="nav_sub_menu"
                                            style="display: grid; grid-template-columns: 1fr 1fr;">
                                            <div class="focus:text-fave-500 hover:text-fave-500"
                                                style="display: flex; align-items: center;">
                                                <a href="{{ route('categories.wise_page', ['slug' => $category->slug, 'type' => 'category']) }}"
                                                    class="p-2 inline-block "
                                                    style="font-size: 22px; font-weight: 800">{{ $category->name }}</a>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M9 6l6 6l-6 6" />
                                                </svg>
                                            </div>
                                            <ul class="pt-4 nav_sub_child_menu">
                                                @foreach ($category->subCategory as $subCategory)
                                                    <li>
                                                        <a href="{{ route('categories.wise_page', ['slug' => $subCategory->slug, 'type' => 'sub-category']) }}"
                                                            class="hover:text-fave-500">{{ $subCategory->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="group">
                    <div
                        class="focus:text-fave-500 hover:text-fave-500 flex px-5 items-center py-2 text-white cursor-pointer">
                        <span><a href="{{ route('all.categories', ['type' => 'category']) }}">Brand</a></span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-down"
                            width="18" height="18" viewBox="0 0 24 24" stroke-width="1.7"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M6 9l6 6l6 -6"></path>
                        </svg>
                    </div>
                    <div class="w-full absolute left-0 opacity-0 invisible group-hover:visible group-hover:opacity-100 -mt-4 group-hover:mt-0 shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] whitespace-nowrap text-white"
                        style="background-color: #4c4c4c;  min-height: 400px;">
                        <span style="position: absolute; width: 100vw; height: 100vh; background: #000000b9; display: block; z-index: -1; "></span>
                        <ul style="width: 700px;  margin: 0 auto; display: grid;">
                            @php
                                $brands = App\Models\Brand::select('id', 'name', 'status')
                                    ->where('status', App\Enums\StatusEnum::Active->value)
                                    ->with('product')
                                    ->orderBy('created_at', 'desc')
                                    ->get();
                            @endphp
                            <li class="flex items-start gap-10"
                                style="position: relative; width: 100%; display: block;">
                                <div class="grid">
                                    @foreach ($brands as $brand)
                                        <div class="nav_sub_menu"
                                            style="display: grid; grid-template-columns: 1fr 1fr;">
                                            <div class="focus:text-fave-500 hover:text-fave-500"
                                                style="display: flex; align-items: center;">
                                                <a href="{{ route('categories.wise_page', ['slug' => $brand->slug, 'type' => 'brand']) }}"
                                                    class="p-2 inline-block "
                                                    style="font-size: 22px; font-weight: 800">{{ $brand->name }}</a>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M9 6l6 6l-6 6" />
                                                </svg>
                                            </div>
                                            <ul class="pt-4 nav_sub_child_menu">
                                                @foreach ($brand->product as $item)
                                                    @if ($item->category)
                                                        <li>
                                                            <a href="{{ route('categories.wise_page', ['slug' => $item->category->slug, 'type' => 'category']) }}"
                                                                class="hover:text-fave-500">{{ $item->category->name }}</a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>




                <li class="relative group">
                    <a class="focus:text-fave-500 hover:text-fave-500 flex px-5 items-center py-2 text-white"
                        href="{{ route('frontend.outlets') }}">Outlets</a>
                </li>
                <li>
                    <a href="{{ route('forntend.news') }}"
                        class="focus:text-fave-500 hover:text-fave-500 flex px-5 items-center py-2 text-white">News</a>
                </li>
                <li>
                    <a href="{{ route('about.salamat') }}"
                        class="focus:text-fave-500 hover:text-fave-500 flex px-5 items-center py-2 text-white">About
                        us</a>
                </li>
                {{-- <li class="relative group">
                    <div
                        class="focus:text-fave-500 hover:text-fave-500 flex px-5 items-center py-2 text-white cursor-pointer whitespace-nowrap">
                        <span>About Us</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-down"
                            width="18" height="18" viewBox="0 0 24 24" stroke-width="1.7"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M6 9l6 6l6 -6"></path>
                        </svg>
                    </div>
                    <ul
                        class="absolute bg-white opacity-0 invisible group-hover:visible group-hover:opacity-100 mt-4 group-hover:mt-0 duration-200 shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] whitespace-nowrap min-w-[200px]">
                        <li class="hover:bg-slate-100 focus:text-fave-500 hover:text-fave-500 "><a
                                href="{{ route('about.salamat') }}" class="p-4 block font-[400] text-[15px]">About
                                Salamat
                                Innovation</a></li>
                        <li class="hover:bg-slate-100 focus:text-fave-500 hover:text-fave-500 "><a
                                href="{{ route('about.volt_me') }}" class="p-4 block font-[400] text-[15px]">About
                                Voltme</a></li>
                    </ul>
                </li> --}}
                <li>
                    <a href="{{ route('contact') }}"
                        class="focus:text-fave-500 hover:text-fave-500 flex px-5 items-center py-2 text-white whitespace-nowrap">Contact
                        Us</a>
                </li>
            </ul>
            <div class="flex items-center gap-5">
                <div>
                    <div class="flex items-center search-bar">
                        <div class="grid">
                            <button class="web_search_btn">
                                <img src="{{ asset('frontend/images/Search-icone.png') }}" alt="img">
                            </button>
                            <div class="web_search_sec"
                                style="position: absolute; top: -100vh; left: 0; width: 100%; height: 500px; background: #484848; padding: 20px 0; transition: 0.5s;">
                                <span style="position: absolute; top: 0; width: 100vw; height: 100vh; background: #000000b9; display: block; z-index: -1; "></span>
                                <div style="max-width: 660px; margin: 0 auto; ">
                                    <form method="POST" action="{{ route('search') }}"
                                        class="navbar_search_section">
                                        @csrf
                                        <div class="flex items-center"
                                            style="border-radius: 10px; background: #484848; ">
                                            <input type="search" name="query" class="search_product"
                                                placeholder="Search...."
                                                style="width: 100%; font-size: 25px; outline: none; padding: 5px 10px; color: #fff; background: #484848; border-radius: 10px;">
                                            <div>
                                                <button type="submit">
                                                    <img src="{{ asset('frontend/images/Search-icone.png') }}"
                                                        alt="img">
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    {{-- <div style="margin-top: 20px; color: #ddd;">
                                        <h1 style="font-size: 20px; padding: 10px 0;">Quick Links</h1>
                                        <ul>
                                            <li>
                                                <a href="#"
                                                    style="padding: 5px 0; display: flex; align-items: center; gap: 8px; ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-right">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M5 12l14 0" />
                                                        <path d="M13 18l6 -6" />
                                                        <path d="M13 6l6 6" />
                                                    </svg>
                                                    <span>Wall Charger</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    style="padding: 5px 0; display: flex; align-items: center; gap: 8px; ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-right">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M5 12l14 0" />
                                                        <path d="M13 18l6 -6" />
                                                        <path d="M13 6l6 6" />
                                                    </svg>
                                                    <span>Power Cable</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    style="padding: 5px 0; display: flex; align-items: center; gap: 8px; ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-right">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M5 12l14 0" />
                                                        <path d="M13 18l6 -6" />
                                                        <path d="M13 6l6 6" />
                                                    </svg>
                                                    <span>Power Bank</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    style="padding: 5px 0; display: flex; align-items: center; gap: 8px; ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-right">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M5 12l14 0" />
                                                        <path d="M13 18l6 -6" />
                                                        <path d="M13 6l6 6" />
                                                    </svg>
                                                    <span>Car Charger</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    style="padding: 5px 0; display: flex; align-items: center; gap: 8px; ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-right">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M5 12l14 0" />
                                                        <path d="M13 18l6 -6" />
                                                        <path d="M13 6l6 6" />
                                                    </svg>
                                                    <span>Power Station</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="{{ route('index.wishlist') }}" class="" id="wishlistReload">
                    <div class="relative cursor-pointer">
                        <img src="{{ asset('frontend/images/Wish-icone.png') }}" alt="img">
                        <span
                            class="absolute w-4 h-4 text-center text-xs -bottom-2 -right-2 bg-white rounded-full">{{ count((array) session('wishList')) }}</span>
                    </div>
                </a>
                <a href="{{ route('shopping.cart') }}" class="">
                    <div class="relative cursor-pointer" id="cartQuantityReload">
                        <img src="{{ asset('frontend/images/Cart-icone.png') }}" alt="img">
                        <span class="absolute w-4 h-4 text-center text-xs -bottom-2 -right-2 bg-white rounded-full"
                            id="">{{ count((array) session('cart')) }}</span>
                    </div>
                    <div class=""></div>
                </a>
                @guest
                    <a href="{{ route('login') }}" class="" target="blank">
                        <img src="{{ asset('frontend/images/Profile-Account-icone.png') }}" alt="img">
                    </a>
                @else
                    @can('isAdmin')
                        <a href="{{ route('admin.dashboard') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-white"
                                width="28" height="28" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 13m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                <path d="M13.45 11.55l2.05 -2.05"></path>
                                <path d="M6.4 20a9 9 0 1 1 11.2 0z"></path>
                            </svg>
                        </a>
                    @else
                        <a href="{{ route('user.dashboard') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-white"
                                width="28" height="28" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 13m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                <path d="M13.45 11.55l2.05 -2.05"></path>
                                <path d="M6.4 20a9 9 0 1 1 11.2 0z"></path>
                            </svg>
                        </a>
                    @endcan
                @endguest
            </div>
        </div>
    </div>
</nav>
@push('js')
    <script>
        let popoverVisible = false;

        $(document).on('click', '#searchbox', function(e) {
            e.preventDefault();
            const $popoverContent = $('.popover__content');

            if (!popoverVisible) {
                $popoverContent.css({
                    'z-index': 10,
                    'right': '1%',
                    'opacity': 1,
                    'border': 'none',
                    'visibility': 'visible',
                    'transform': 'translate(0, -20px)'
                });
                popoverVisible = true;
            } else {
                $popoverContent.css('visibility', 'hidden');
                popoverVisible = false;
            }
        });


        //    $(document).on('click', '#searchbox', function(e) {
        //         e.preventDefault();
        //         $('.popover__content').css({
        //             'z-index': 10,
        //             'right': '166px',
        //             'opacity': 1,
        //             'border': 'none',
        //             'visibility': 'visible',
        //             'transform': 'translate(0, -20px)'
        //         });
        //     });
    </script>
@endpush
