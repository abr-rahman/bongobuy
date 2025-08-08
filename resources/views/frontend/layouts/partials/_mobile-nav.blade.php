<div class="w-full h-full transform -translate-x-full xl:hidden fixed top-0 z-[991]" style="transition: 0.5s; " id="mobile-nav">
    <div class="bg-gray-800 opacity-50 w-full h-full" onclick="sidebarHandler(false)"></div>
    <div class="z-40 fixed overflow-y-auto top-0 shadow h-full flex-col justify-between xl:hidden pb-4 transition duration-150 ease-in-out"
        style="width: 100%; background: #3F3F3F">
        <div class="h-full">
            <div class="flex flex-col justify-between h-full w-full">
                <div>
                    <div class="p-5" style="position: absolute; top: 0; right: 0;">
                        <button id="cross" aria-label="close menu"
                            class="focus:outline-none focus:ring-2 rounded-md " onclick="sidebarHandler(false)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x"
                                width="35" height="35" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>

                    <div>
                        <div style="margin-top: 100px; color: White; padding: 10px 20px;">
                            @guest
                                <a href="{{ route('login') }}" class="flex items-center gap-2">
                                    <img src="{{ asset('frontend/images/Profile-Account-icone.png') }}" alt="img"
                                        style="width: 10px;">
                                    <samp>Profile</samp>
                                </a>
                            @else
                                @can('isAdmin')
                                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-white" width="15" height="15"
                                            viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M12 13m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                            <path d="M13.45 11.55l2.05 -2.05"></path>
                                            <path d="M6.4 20a9 9 0 1 1 11.2 0z"></path>
                                        </svg>
                                        <samp>Dashboard</samp>
                                    </a>
                                @else
                                    <a href="{{ route('user.dashboard') }}" class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-white" width="15" height="15"
                                            viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M12 13m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                            <path d="M13.45 11.55l2.05 -2.05"></path>
                                            <path d="M6.4 20a9 9 0 1 1 11.2 0z"></path>
                                        </svg>
                                        <samp>Dashboard</samp>
                                    </a>
                                @endcan
                            @endguest
                            <a href="{{ route('index.wishlist') }}" class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-heart">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                </svg>
                                <samp>Wishlist</samp>
                            </a>
                        </div>
                        <ul class="f-m-m" style="margin-top: 30px; color: White;">
                            <li style="font-size: 30px;">
                                <a href="{{ route('frontend.index') }}" tabindex="0" class="py-1" style="padding: 0 20px;">
                                    Home</a>
                            </li>
                            <li style="font-size: 30px;">
                                <div class="sub_menu flex items-center justify-between cursor-pointer" style="padding: 0 20px;">
                                    <span>Shop</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" style="rotate: -90deg;"
                                        class="w-5 h-5 md:w-6 md:h-6" width="18" height="18" viewBox="0 0 24 24"
                                        stroke-width="1.7" stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M6 9l6 6l6 -6"></path>
                                    </svg>
                                </div>
                                <ul class="sub_menu_ul show_submenu text-base md:text-lg">
                                    <button class="show_sub_menu_ul_close" style="float: right; padding: 20px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x"
                                            width="35" height="35" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="#fff" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"></path>
                                            <line x1="18" y1="6" x2="6" y2="18">
                                            </line>
                                            <line x1="6" y1="6" x2="18" y2="18">
                                            </line>
                                        </svg>
                                    </button>

                                    <div style="margin-top: 100px; color: White; padding: 10px 20px;">
                                        @guest
                                            <a href="{{ route('login') }}" class="flex items-center gap-2">
                                                <img src="{{ asset('frontend/images/Cart-white.png') }}" alt="img"
                                                    style="width: 10px;">
                                                <samp>Profile</samp>
                                            </a>
                                        @else
                                            @can('isAdmin')
                                                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-white" width="15"
                                                        height="15" viewBox="0 0 24 24" stroke-width="1"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M12 13m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                                        <path d="M13.45 11.55l2.05 -2.05"></path>
                                                        <path d="M6.4 20a9 9 0 1 1 11.2 0z"></path>
                                                    </svg>
                                                    <samp>Dashboard</samp>
                                                </a>
                                            @else
                                                <a href="{{ route('user.dashboard') }}" class="flex items-center gap-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-white" width="15"
                                                        height="15" viewBox="0 0 24 24" stroke-width="1"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M12 13m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                                        <path d="M13.45 11.55l2.05 -2.05"></path>
                                                        <path d="M6.4 20a9 9 0 1 1 11.2 0z"></path>
                                                    </svg>
                                                    <samp>Dashboard</samp>
                                                </a>
                                            @endcan
                                        @endguest
                                        <a href="{{ route('index.wishlist') }}" class="flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="1" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-heart">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                            </svg>
                                            <samp>Wishlist</samp>
                                        </a>
                                    </div>


                                    @php
                                        $categories = App\Models\Category::select('id', 'name')
                                            ->where('status', App\Enums\StatusEnum::Active->value)
                                            ->with('subCategory')
                                            ->orderBy('created_at', 'desc')
                                            ->get();
                                    @endphp

                                    <li style="font-size: 30px; padding: 20px; ">
                                        @foreach ($categories as $category)
                                            <div class="sub_sub_menu flex items-center justify-between cursor-pointer">
                                                <a href="{{ route('categories.wise_page', ['slug' => $category->slug, 'type' => 'category']) }}"
                                                    class="p-2 block">{{ $category->name }}</a>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 md:w-6 md:h-6"
                                                    width="18" height="18" viewBox="0 0 24 24"
                                                    stroke-width="1.7" stroke="currentColor" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M6 9l6 6l6 -6"></path>
                                                </svg>
                                            </div>
                                            <ul class="sub_sub_menu_ul show_sub_submenu"
                                                style="font-size: 16px; margin-left: 10%; color: #9E9E9E; ">
                                                @foreach ($category->subCategory as $subCategory)
                                                    <li><a href="{{ route('categories.wise_page', ['slug' => $subCategory->slug, 'type' => 'sub-category']) }}"
                                                            class="p-1 block">{{ $subCategory->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        @endforeach
                                    </li>
                                </ul>
                            </li>
                            <li style="font-size: 30px;">
                                <div class="sub_menu flex items-center justify-between cursor-pointer" style="padding: 0 20px;">
                                    <span>Brand</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" style="rotate: -90deg; z-index: -1;"
                                        class="w-5 h-5 md:w-6 md:h-6" width="18" height="18"
                                        viewBox="0 0 24 24" stroke-width="1.7" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M6 9l6 6l6 -6"></path>
                                    </svg>
                                </div>
                                <ul class="sub_menu_ul show_submenu text-base md:text-lg">

                                    <button class="show_sub_menu_ul_close" style="float: right; padding: 20px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x"
                                            width="35" height="35" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="#fff" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"></path>
                                            <line x1="18" y1="6" x2="6" y2="18">
                                            </line>
                                            <line x1="6" y1="6" x2="18" y2="18">
                                            </line>
                                        </svg>
                                    </button>

                                    <div style="margin-top: 100px; color: White; padding: 10px 20px;">
                                        @guest
                                            <a href="{{ route('login') }}" class="flex items-center gap-2">
                                                <img src="{{ asset('frontend/images/Cart-white.png') }}" alt="img"
                                                    style="width: 10px;">
                                                <samp>Profile</samp>
                                            </a>
                                        @else
                                            @can('isAdmin')
                                                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-white" width="15"
                                                        height="15" viewBox="0 0 24 24" stroke-width="1"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M12 13m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                                        <path d="M13.45 11.55l2.05 -2.05"></path>
                                                        <path d="M6.4 20a9 9 0 1 1 11.2 0z"></path>
                                                    </svg>
                                                    <samp>Dashboard</samp>
                                                </a>
                                            @else
                                                <a href="{{ route('user.dashboard') }}" class="flex items-center gap-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-white" width="15"
                                                        height="15" viewBox="0 0 24 24" stroke-width="1"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M12 13m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                                        <path d="M13.45 11.55l2.05 -2.05"></path>
                                                        <path d="M6.4 20a9 9 0 1 1 11.2 0z"></path>
                                                    </svg>
                                                    <samp>Dashboard</samp>
                                                </a>
                                            @endcan
                                        @endguest
                                        <a href="{{ route('index.wishlist') }}" class="flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="1" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-heart">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                            </svg>
                                            <samp>Wishlist</samp>
                                        </a>
                                    </div>

                                    @php
                                        $brands = App\Models\Brand::select('id', 'name', 'status')
                                            ->where('status', App\Enums\StatusEnum::Active->value)
                                            ->with('product')
                                            ->orderBy('created_at', 'desc')
                                            ->get();
                                    @endphp
                                    <li style="font-size: 30px; padding: 20px; ">
                                        @foreach ($brands as $brand)
                                            <div class="sub_sub_menu flex items-center justify-between cursor-pointer">
                                                <a href="{{ route('categories.wise_page', ['slug' => $brand->slug, 'type' => 'brand']) }}"
                                                    class="p-2 block">{{ $brand->name }}</a>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 md:w-6 md:h-6"
                                                    width="18" height="18" viewBox="0 0 24 24"
                                                    stroke-width="1.7" stroke="currentColor" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M6 9l6 6l6 -6"></path>
                                                </svg>
                                            </div>
                                            <ul class="sub_sub_menu_ul show_sub_submenu"
                                                style="font-size: 16px; margin-left: 10%; color: #9E9E9E; ">
                                                @foreach ($brand->product as $item)
                                                    <li><a href="{{ route('categories.wise_page', ['slug' => $item->category->slug, 'type' => 'category']) }}"
                                                            class="p-1 block">{{ $item->category->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        @endforeach
                                    </li>
                                </ul>
                            </li>
                            <li style="font-size: 30px;">
                                <a href="{{ route('frontend.outlets') }}" tabindex="0"
                                    class="py-1" style="padding: 0 20px;">Outlets</a>
                            </li>
                            <li style="font-size: 30px;">
                                <a href="{{ route('forntend.news') }}" tabindex="0" class="py-1" style="padding: 0 20px;">News</a>
                            </li>
                            <li style="font-size: 30px;">
                                <a href="{{ route('about.salamat') }}" tabindex="0" class="py-1" style="padding: 0 20px;">About
                                    Us</a>
                            </li>
                            <li style="font-size: 30px;">
                                <a href="{{ route('contact') }}" tabindex="0" class="py-1" style="padding: 0 20px;">
                                    Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
                {{-- <div class="">
                    <form method="POST" action="{{ route('search') }}">
                        @csrf
                        <div class="flex items-center border search-bar">
                            <input type="search" name="query" id="search_product" placeholder="Search..."
                                class="w-full p-2 outline-none">
                            <button class="bg-fave-500 text-white p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                    <path d="M21 21l-6 -6"></path>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div> --}}
            </div>
        </div>
    </div>
</div>
