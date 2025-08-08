<div style="background: #484848; ">
    <div class="mx-auto w-full xl:container px-6 text-white py-10">
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5" style="border-bottom: 1px solid #ff9900; padding-bottom: 15px; ">
            <div class="rounded flex items-center justify-center gap-5 backdrop-blur-sm p-2">
                <div class="">
                    <img src="{{ asset("frontend/images/Hotline-number-icone.png") }}" alt="img" style="width: 20px">
                </div>
                <div class="grid" style="color: #fff">
                    <a href="tel:{{ $siteSettings->first()->phone_one }}"
                        class="text-[18px] hover:underline">{{ $siteSettings->first()->phone_one }}</a>
                </div>
            </div>
            <div class="rounded flex items-center justify-center gap-5 backdrop-blur-sm pl-2 pr-2 py-4 sm:p-2">
                <div class="">
                    <img src="{{ asset("frontend/images/Authentic-Product-icone.png") }}" alt="img" style="width: 30px">
                </div>
                <div class=""  style="color: #fff">
                    <a href="https://www.voltme.com/wheretobuy.html" target="blank" class="text-[18px] hover:underline">Authentic Product.</a>
                </div>
            </div>
            <div class="rounded flex items-center justify-center gap-5 backdrop-blur-sm p-2">
                <div class="">
                    <img src="{{ asset("frontend/images/Hassel-free-Warranty-icone.png") }}" alt="img" style="width: 20px">
                </div>
                <div style="color: #fff">
                    <a href="{{ route('frontend.warranty.policy') }}"
                        class="text-[18px] hover:underline">24 Months
                        Warranty</a>
                </div>
            </div>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5 py-10" style="color: #fff;">
            <div>
                <h2 class="text-[18px] pb-8 font-semibold" style="color: #ff9900">Corporate Office</h2>
                <div class="grid gap-3">
                    <div class="grid grid-cols-12 gap-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="col-span-1" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M4 18h9v-12l-5 2v5l-4 2v-8l9 -4l7 2v13l-7 3z"></path>
                        </svg>
                        <a href="https://maps.app.goo.gl/EmerxnDLt34uufcC7" target="_blank" class="col-span-11 hover:text-white text-dark-footer">
                            <p>{{ $siteSettings->first()->address_one }}</p>
                        </a>
                    </div>
                    <div class="grid grid-cols-12 gap-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="col-span-1" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path
                                d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2">
                            </path>
                            <path d="M15 7a2 2 0 0 1 2 2"></path>
                            <path d="M15 3a6 6 0 0 1 6 6"></path>
                        </svg>
                            <a class="col-span-11 hover:text-white text-dark-footer" href="https://wa.me/+8801897715225" target="_blank">
                                <p>{{ $siteSettings->first()->phone_one }}</p>
                            </a>
                    </div>
                    <div class="grid grid-cols-12 gap-5 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="col-span-1" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z">
                            </path>
                            <path d="M3 7l9 6l9 -6"></path>
                        </svg>
                        <a href="mailto:{{ $siteSettings->first()->support_email }}" target="_blank" class="col-span-11 hover:text-white text-dark-footer">
                            <p>{{ $siteSettings->first()->support_email }}</p>
                        </a>
                    </div>
                    <div class="flex items-center gap-1">
                        <a href="{{ $siteSettings->first()->fb_link }}" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" class="hover:text-white" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3">
                                </path>
                            </svg>
                        </a>
                        <a href="{{ $siteSettings->first()->insta_link }}" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" class="hover:text-white" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z">
                                </path>
                                <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                <path d="M16.5 7.5l0 .01"></path>
                            </svg>
                        </a>
                        <a href="{{ $siteSettings->first()->youtube_link }}" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" class="hover:text-white" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M2 8a4 4 0 0 1 4 -4h12a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-12a4 4 0 0 1 -4 -4v-8z">
                                </path>
                                <path d="M10 9l5 3l-5 3z"></path>
                            </svg>
                        </a>
                        <a href="{{ $siteSettings->first()->linkedin_link }}" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" class="hover:text-white" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z">
                                </path>
                                <path d="M8 11l0 5"></path>
                                <path d="M8 8l0 .01"></path>
                                <path d="M12 16l0 -5"></path>
                                <path d="M16 16v-3a2 2 0 0 0 -4 0"></path>
                            </svg>
                        </a>
                        <a href="{{ $siteSettings->first()->tiktok_link }}" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" class="hover:text-white" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M21 7.917v4.034a9.948 9.948 0 0 1 -5 -1.951v4.5a6.5 6.5 0 1 1 -8 -6.326v4.326a2.5 2.5 0 1 0 4 2v-11.5h4.083a6.005 6.005 0 0 0 4.917 4.917z">
                                </path>
                            </svg>
                        </a>
                    </div>
                    <div>
                        <h2 class="text-[18px] py-5 font-semibold" style="color: #ff9900">Certified By</h2>
                        <div style="display: flex; gap: 5px; ">
                            <img src="{{ asset ('frontend/images/Certified-icones/Dbid-logo.png')}}" alt="img" width="">
                            <img src="{{ asset ('frontend/images/Certified-icones/Ecab-logo.png')}}" alt="img" width="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <h2 class="text-[18px] pb-8 font-semibold" style="color: #ff9900">Important Link</h2>
                <div class="grid gap-3">
                    <a href="{{ route('dealerships.register') }}" class="hover:text-white text-dark-footer">Become A Dealer</a>
                    {{-- <a href="{{ route('product.verify') }}" class="hover:text-white text-dark-footer">Verify Your Product</a> --}}
                    <a href="{{ route('frontend.refund.policy') }}" class="hover:text-white text-dark-footer">Return & Refund Policy</a>
                    <a href="{{ route('frontend.warranty.policy') }}" class="hover:text-white text-dark-footer">Warranty Policy</a>
                    <a href="{{ route('warranty.index') }}" class="hover:text-white text-dark-footer">Claim Your Warranty</a>
                    <a href="{{ route('warranty.activate_guide') }}" class="hover:text-white text-dark-footer">How to Activate Your Warranty</a>
                    <a href="{{ route('frontend.privacy.policy') }}" class="hover:text-white text-dark-footer">Privacy Policy</a>
                    <a href="{{ route('frontend.terms') }}" class="hover:text-white text-dark-footer">Terms & Conditions</a>
                    <a href="{{ route('frontend.career.index') }}" class="hover:text-white text-dark-footer">Careers</a>
                </div>
            </div>
            <div class="">
                <h2 class="text-[18px] pb-3 sm:pb-8 font-semibold text-center sm:text-left" style="color: #ff9900">We Accept</h2>
                <div style="display: flex; flex-wrap: wrap; gap: 5px; ">
                    <img src="{{ asset('frontend/images/SSLCommerz-logo/01.png') }}" alt="img">
                    <img src="{{ asset('frontend/images/SSLCommerz-logo/02.png') }}" alt="img">
                    <img src="{{ asset('frontend/images/SSLCommerz-logo/03.png') }}" alt="img">
                    <img src="{{ asset('frontend/images/SSLCommerz-logo/04.png') }}" alt="img">
                    <img src="{{ asset('frontend/images/SSLCommerz-logo/05.png') }}" alt="img">
                    <img src="{{ asset('frontend/images/SSLCommerz-logo/06.png') }}" alt="img">
                    <img src="{{ asset('frontend/images/SSLCommerz-logo/07.png') }}" alt="img">
                    <img src="{{ asset('frontend/images/SSLCommerz-logo/08.png') }}" alt="img">
                    <img src="{{ asset('frontend/images/SSLCommerz-logo/09.png') }}" alt="img">
                    <img src="{{ asset('frontend/images/SSLCommerz-logo/10.png') }}" alt="img">
                    <img src="{{ asset('frontend/images/SSLCommerz-logo/11.png') }}" alt="img">
                    <img src="{{ asset('frontend/images/SSLCommerz-logo/12.png') }}" alt="img">
                    <img src="{{ asset('frontend/images/SSLCommerz-logo/13.png') }}" alt="img">
                    <img src="{{ asset('frontend/images/SSLCommerz-logo/14.png') }}" alt="img">
                    <img src="{{ asset('frontend/images/SSLCommerz-logo/15.png') }}" alt="img">
                    <img src="{{ asset('frontend/images/SSLCommerz-logo/16.png') }}" alt="img">
                    <img src="{{ asset('frontend/images/SSLCommerz-logo/17.png') }}" alt="img">
                    <img src="{{ asset('frontend/images/SSLCommerz-logo/18.png') }}" alt="img">
                    <img src="{{ asset('frontend/images/SSLCommerz-logo/19.png') }}" alt="img">
                    <img src="{{ asset('frontend/images/SSLCommerz-logo/20.png') }}" alt="img">
                    <img src="{{ asset('frontend/images/SSLCommerz-logo/21.png') }}" alt="img">
                    <img src="{{ asset('frontend/images/SSLCommerz-logo/22.png') }}" alt="img">
                    <img src="{{ asset('frontend/images/SSLCommerz-logo/23.png') }}" alt="img">
                    <img src="{{ asset('frontend/images/SSLCommerz-logo/24.png') }}" alt="img">
                    <img src="{{ asset('frontend/images/SSLCommerz-logo/25.png') }}" alt="img">
                    <img src="{{ asset('frontend/images/SSLCommerz-logo/26.png') }}" alt="img">
                    <img src="{{ asset('frontend/images/SSLCommerz-logo/27.png') }}" alt="img">
                    <img src="{{ asset('frontend/images/SSLCommerz-logo/28.png') }}" alt="img">
                    <img src="{{ asset('frontend/images/SSLCommerz-logo/29.png') }}" alt="img">
                    <img src="{{ asset('frontend/images/SSLCommerz-logo/30.png') }}" alt="img">
                    <img src="{{ asset('frontend/images/SSLCommerz-logo/31.png') }}" alt="img">
                </div>
            </div>
        </div>
        <div class="flex flex-wrap items-center justify-center gap-5 md:justify-between">
            <p class="text-xs text-center">© 2023 Salamat Innovation | All Rights Reserved. Trade Lisence No- <a href="{{ asset('frontend/Trade Lincence.jpg') }}" target="_blank" style="">013835 ,</a> DBID No- 6 6 1 6 0 4 0 3 0
            </p>
        </div>
    </div>
</div>
