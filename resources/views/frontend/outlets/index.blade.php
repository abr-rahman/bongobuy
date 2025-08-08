@extends('frontend.layouts.master_frontend')
@section('pageTitle')
    {{ __('Out-Lets') }}
@endsection
@section('section')
    <div class="font-exo font-light text-slate-700">
        <div class="relative">
            <img src="{{ asset('frontend/images/contact-about-bg.webp') }}" alt="img"
                class="min-h-[220px] object-cover">
            <div class="absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
                <h1 class="text-[18px] text-center sm:text-[30px] font-bold text-white bg-white/50 py-2 px-5 rounded uppercase">
                    OUTLETS</h1>
            </div>
        </div>
        <h1 class="text-[18px] text-center sm:text-[30px] text-black bg-white/50 py-2 mt-2 px-5 rounded uppercase">
            ONLINE PLATFORM</h1>
        <!-- Swiper -->
        <div class="swiper heroSlider select-none ">
            <div class="swiper-wrapper">
                @foreach ($sliders as $slider)
                <div class="swiper-slide">
                    <div class="relative overflow-hidden text-gray-700 w-full bg-fixed bg-contain">
                        <div class=" py-10 w-full h-full grid items-center">
                            <div class="mx-auto w-full xl:max-w-screen-xl px-6">
                                <div class="grid lg:flex items-center lg:gap-10 justify-between ">
                                <div class="flex-1 bg-white/70 backdrop-blur-sm p-5 sm:p-8 xl:py-10 xl:px-16 grid gap-2 rounded"
                                        data-aos="fade-left">
                                    </div>
                                    <div class="flex-1">
                                        @if (isset($slider->image))
                                        <a href="{{ $slider->url }}" target="_blank">
                                            <img src="{{ asset('uploads/slider/' . $slider->image) ?? asset($slider->image) }}"
                                                alt="img"
                                                class="object-cover"
                                                data-aos="fade-right">
                                        </a>
                                        @else
                                            <img src="{{ asset('default/default-slider.jpeg') }}" alt="img"
                                                class="object-cover"
                                                data-aos="fade-right">
                                        @endif
                                    </div>
                                    <div class="flex-1 bg-white/70 backdrop-blur-sm p-5 sm:p-8 xl:py-10 xl:px-16 grid gap-2 rounded"
                                        data-aos="fade-left">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <h1 class="text-[18px] text-center sm:text-[30px] text-black bg-white/50 py-2 mt-2 px-5 rounded uppercase">
            OFFLINE PLATFORM</h1>
        <div class="mx-auto w-full xl:container px-6 py-10">
            <div class="grid grid-cols-1 md:grid-cols-3 justify-between gap-5">
                <div class="col-span-1">
                    <ul class="f-m-m grid gap-1">
                        <li class="">
                            <div
                                class="parent_menu focus:outline-none border-b xl:text-base md:text-lg text-base flex items-center justify-between py-2  md:py-3  cursor-pointer">
                                <span class="text-lg font-semibold">District</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 md:w-6 md:h-6" width="18"
                                    height="18" viewBox="0 0 24 24" stroke-width="1.7" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M6 9l6 6l6 -6"></path>
                                </svg>
                            </div>
                            <div class="child_menu !mx-0">
                                <div class="text-base md:text-lg grid gap-px">
                                    @forelse ($districts as $outlet)
                                        <a href="{{ route('outlets.district', ['id' => $outlet->id]) }}" id="outlet_review"
                                            class="p-2 bg-slate-200 hover:bg-fave-500 hover:text-white">{{ optional($outlet->district)->name }}</a>
                                    @empty
                                    <span class="p-2 bg-slate-200 hover:bg-fave-500 hover:text-white">No Outlets</span>
                                    @endforelse
                                </div>
                            </div>
                        </li>
                        <li class="">
                            <div
                                class="parent_menu focus:outline-none border-b xl:text-base md:text-lg text-base flex items-center justify-between py-2  md:py-3  cursor-pointer">
                                <span class="text-lg font-semibold">Area</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 md:w-6 md:h-6" width="18"
                                    height="18" viewBox="0 0 24 24" stroke-width="1.7" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M6 9l6 6l6 -6"></path>
                                </svg>
                            </div>
                            <div class="child_menu !mx-0">
                                <div class="text-base md:text-lg grid gap-px">
                                    @forelse ($upazilas as $outlet)
                                        <a href="{{ route('outlets.area', ['id' => $outlet->id]) }}" id="outlet_area"
                                            class="p-2 bg-slate-200 hover:bg-fave-500 hover:text-white">{{ optional($outlet->upazila)->name }}</a>
                                    @empty
                                        <span class="p-2 bg-slate-200 hover:bg-fave-500 hover:text-white">No Outlets</span>
                                    @endforelse
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-span-2">
                    <div class="grid grid-cols-1 md:grid-cols-2 justify-between gap-5" id="outletParts">
                        <div class="col-span-1 grid gap-5 items-start">
                             <div class=" grid gap-5 lg:p-5 max-h-[250px] overflow-auto middleOut">
                                <div class="flex items-center gap-8 border p-2 shadow cursor-pointer">
                                    <div class="text-[30px] p-5 inline-block font-bold text-white bg-fave-500 uppercase">sa</div>
                                    <div class="grid">
                                        <h2 class="text-lg font-semibold">Salamat Innovation</h2>
                                        <p class="">Ka/32/5/A (2nd Floor, Polash Tower, Dhaka 1212)</p>
                                        <p class="">01897715222</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-1 middleOut">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14603.264874658285!2d90.4249061!3d23.7895579!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7bdace19033%3A0x1537c1709d64b620!2sSalamat%20Innovation!5e0!3m2!1sen!2sbd!4v1695705657651!5m2!1sen!2sbd" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $('body').on('click', '#outlet_review', function(e) {
            e.preventDefault();
            var percent_amount = $(".middleOut");
            percent_amount.addClass('hidden');

            $.ajax({
                url: $(this).attr('href'),
                success: function(html) {
                    $('#outletParts').html(html);
                }
            });
        });
        $('body').on('click', '#outlet_area', function(e) {
            e.preventDefault();
            var percent_amount = $(".middleOut");
            percent_amount.addClass('hidden');

            $.ajax({
                url: $(this).attr('href'),
                success: function(html) {
                    $('#outletParts').html(html);
                }
            });
        });
    </script>
@endpush
