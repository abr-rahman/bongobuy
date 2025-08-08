<nav>
    <div class="px-5 sm:px-10 py-3 w-full flex xl:hidden shadow justify-between items-center z-40"
        style="background-color: #000000b7; backdrop-filter: blur(1px); ">
        <a href="/" style="width: 40px; ">
            <img src="{{ asset('uploads/logo/' . $siteSettings->first()->icon) ?? asset('frontend/images/logo.png') }}"
                alt="logo Img">
        </a>
        <div class="flex gap-4">
            <div>
                <img src="{{ asset('frontend/images/Search-icone.png') }}" alt="img"
                    class="phone_search_btn w-full cursor-pointer">
                <div class="phone_search_sec"
                    style="width: 100%; height: 100vh; position: absolute; top: -100vh; left: 0; background: #484848; padding: 100px 20px 0 20px; display: flex; flex-direction: column; align-items: center; z-index: 100; transition: 0.5s; ">
                    <div style="position: absolute; top: 20px; right: 20px; cursor: pointer;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="phone_search_close_btn" width="30"
                            height="30" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-x">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M18 6l-12 12" />
                            <path d="M6 6l12 12" />
                        </svg>
                    </div>
                    <div>
                        <form method="POST" action="{{ route('search') }}" class="navbar_search_section">
                            @csrf
                            <div class="flex items-center" style="border-radius: 10px; background: #2b2b2b; ">
                                <input type="search" name="query" class="search_product" placeholder="Search...."
                                    style="width: 100%; font-size: 25px; outline: none; padding: 5px 10px; color: #fff; background: #2b2b2b; border-radius: 10px;">
                                <div
                                    style="display: flex; align-items: center; background: #181818; padding: 16px 12px; border-radius: 0 10px 10px 0; cursor: pointer; ">
                                    <button type="submit">
                                    <img src="{{ asset('frontend/images/Search-icone.png') }}" alt="img">
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <a href="{{ route('shopping.cart') }}" class="">
                <div class="relative cursor-pointer" id="cartQuantity">
                    <img src="{{ asset('frontend/images/Cart-icone.png') }}" alt="img" class="w-full">
                    <span
                        class="absolute w-4 h-4 text-center text-xs -bottom-2 -right-2 bg-fave-500 rounded-full text-white"
                        id="">{{ count((array) session('cart')) }}</span>
                </div>
                <div class=""></div>
            </a>
            <button id="menu" aria-label="open menu" onclick="sidebarHandler(true)">
                <img src="{{ asset('frontend/images/three-lines.png') }}" alt="bars"
                    style="width: 30px; user-select: none;">
            </button>
        </div>
    </div>
</nav>
