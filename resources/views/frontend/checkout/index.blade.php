@extends('frontend.layouts.master_frontend')
@section('pageTitle'){{ __('Checkout') }}@endsection
@section('section')
    <div class="relative">
        <img src="{{ asset('frontend/images/contact-about-bg.webp') }}" alt="img"
            class="min-h-[220px] object-cover">
        <div class="absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
            <h2 class="text-[18px] text-center sm:text-[30px] font-bold text-white bg-white/50 py-2 px-5 rounded uppercase">
                Checkout</h2>
        </div>
    </div>
    <div class="container mx-auto my-16 bg-gray-50 border px-5">
        <form method="post" action="{{ route('confirm.order') }}" enctype="multipart/form-data">
            @csrf
            <div class="grid lg:grid-cols-5 gap-5 sm:gap-10 p-5">
                <div class="lg:col-span-1"></div>
                <div class="lg:col-span-1">
                    <h2 class="font-semibold">Payment Method <b>*</b></h2>
                    <div class="flex flex-col sm:flex-row gap-2 justify-between items-center py-5 border-b">
                        <div class="grid gap-2 w-full" style="display: flex; cursor: pointer;">
                            <a class="border p-1 flex bg-gray-300 text-[10px]" style=""  id="selectCOD">
                                <svg class="fill-gradient-2" version="1.1" xmlns="http://www.w3.org/2000/svg" width="15px" style="padding: 2px;" id="selectCODIcon" height="20px" viewBox="0 0 78.369 78.369">
                                    <g>
                                      <path d="M78.049,19.015L29.458,67.606c-0.428,0.428-1.121,0.428-1.548,0L0.32,40.015c-0.427-0.426-0.427-1.119,0-1.547l6.704-6.704   c0.428-0.427,1.121-0.427,1.548,0l20.113,20.112l41.113-41.113c0.429-0.427,1.12-0.427,1.548,0l6.703,6.704   C78.477,17.894,78.477,18.586,78.049,19.015z" fill="blue"></path>
                                    </g>
                                  </svg>
                                 <strong style="font-size: 12px; font-weight: 800;">Cash On Delevery</strong>
                            </a>
                            <a class="border p-1  text-[10px]" style="display: flex; " id="selectOnline">
                                <svg class="fill-gradient-2 hidden" version="1.1" xmlns="http://www.w3.org/2000/svg" width="15px" style="padding: 2px;" id="selectOnlineIcon" height="20px" viewBox="0 0 78.369 78.369">
                                    <g>
                                      <path d="M78.049,19.015L29.458,67.606c-0.428,0.428-1.121,0.428-1.548,0L0.32,40.015c-0.427-0.426-0.427-1.119,0-1.547l6.704-6.704   c0.428-0.427,1.121-0.427,1.548,0l20.113,20.112l41.113-41.113c0.429-0.427,1.12-0.427,1.548,0l6.703,6.704   C78.477,17.894,78.477,18.586,78.049,19.015z" fill="blue"></path>
                                    </g>
                                  </svg>
                                <strong style="font-size: 12px; font-weight: 800;">Online Payment</strong>
                            </a>
                            <select name="payment_method" id="" class="p-2 border w-full hidden">
                                <option value="cod" id="pMethodStatus"></option>
                            </select>
                        </div>
                    </div>
                    <div class="">
                        <h2 class="font-semibold">Customer Information</h2>
                        <div class="pt-2">
                                <div class="">
                                    <label for="fname">Full Name <b>*</b></label>
                                    <input type="text" id="fname" required name="customer_name" placeholder="Full Name*" value="{{ auth()->user()->name ?? '' }}" class="border text-sm p-2 mt-1 rounded w-full">
                                </div>
                                <div class="hidden" id="emailId">
                                    <label for="email">Email <b>*</b></label>
                                    <input type="text" id="email" name="email" value="{{ auth()->user()->email ?? '' }}" placeholder="Email*" class="border text-sm p-2 mt-1 rounded w-full">
                                </div>
                                <div class="">
                                    <label for="phone">Phone <b>*</b></label>
                                    <input type="text" id="phone" required name="phone" value="{{ old('phone') }}" placeholder="Phone Number*" class=" border text-sm p-2 mt-1 rounded w-full">
                                </div>

                                <div class="">
                                    <label for="address">Address <b>*</b></label>
                                    <input type="text" id="address" required name="address" value="{{ old('address') }}" placeholder="Address" class="border text-sm p-2 mt-1 rounded w-full my-5">
                                </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-2">
                    <div class="">
                        <h2 class="text-center font-semibold">Order Overview</h2>
                        <div class="max-h-[350px] overflow-y-auto">
                            <div class="py-2 border-b grid grid-cols-5 font-semibold">
                                <p class="col-span-4">Product Name</p>
                                <p class="hidden">Price</p>
                                <p class="">Total</p>
                            </div>
                            @php
                                $grand_total_amount = 0;
                            @endphp
                            @if(session('cart'))
                                @foreach(session('cart') as $id => $cart)
                                @php
                                    $quantityPrice = $cart['quantity'] * $cart['price'];
                                    $color = App\Models\Color::where('id', $cart['color_id'] ?? '')->first();
                                @endphp
                                    <div class="py-2 border-b grid grid-cols-5 ">
                                        <p class="col-span-4 flex">
                                            <img src="{{ asset('uploads/product/' . $cart['image']) }}"
                                            alt="img" class="px-2" style="width: 22%;
                                            height: 78%;"> {{ $cart['name'] }} ({{ $cart['quantity'] }}) @if(!empty($color->color_name))  ({{ $color->color_name ?? '' }}) @endif</p>
                                        {{-- <p class="">{{ $cart['price'] }}</p> --}}
                                        <p class="font-semibold">{{  number_format($quantityPrice, 0, '.', ',') }} ৳</p>
                                        <input type="hidden" name="brand_id" value="{{ $cart['brand'] }}">
                                    </div>
                                    @php
                                        $grand_total_amount += ($cart['quantity'] * $cart['price']);
                                        // dd($grand_total_amount);
                                    @endphp
                                @endforeach
                            @endif
                        </div>
                        <div class="coupon_area">
                            <div class="flex justify-between py-2 border-b">
                                <input type="text" id="coupon_input_field"  placeholder="Coupon Code"
                                    class="w-[150px] sm:w-auto outline-fave-500 p-1 border">
                                <span id="apply_coupon_btn" role="button"
                                    class=" p-1 bg-fave-500 text-white px-2 rounded font-semibold whitespace-nowrap">Apply</span>
                            </div>
                        </div>

                        <div id="shippingForLoadCod">
                            <div class="py-2" id="shippingForLoad">
                                <div class="grid grid-cols-5 justify-between py-2 border-b">
                                    <p class="col-span-4 font-semibold hidden discount">Discount :</p>
                                    <p class="font-semibold hidden" id="discount_amount">00</p>
                                    <p class="col-span-4 font-semibold">Total :</p>
                                    <p class="font-semibold" id="grandTotal">{{ number_format($grand_total_amount, 0, '.', ',') ?? $currentTotal }} ৳</p>
                                    <input type="hidden" name="grand_total" value="{{ $currentTotal ?? $grand_total_amount }}" id="grandTotalValue">
                                    <input type="hidden" name="sub_total" value="{{ $grand_total_amount }}">
                                    <div id="currentTotal" data-current-total="{{ $currentTotal ?? $grand_total_amount }}"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-5 items-center justify-between mt-5">
                        <label class="flex items-center">
                            <input type="checkbox" name="account_check" id="accountCheck" class="form-checkbox text-indigo-600">
                            <p style="margin-left: 5px;">Create an Account ?</p>
                            <div class="hidden" id="showPassword">
                                <input  type="password" name="password" id="password" placeholder="New Password"  class="border text-sm p-2 rounded">
                                <input  type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password"  class="border text-sm p-2 mt-1 rounded" >
                           </div>
                        </label>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-5 items-center justify-between mt-5">
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox text-indigo-600" required>
                            <p class="ml-2 text-sm select-none">I have read and agree to the <a target="blank" class="underline text-fave-500 " href="{{ route('frontend.terms') }}">Terms and Conditions</a> , <a target="blank" class="underline text-fave-500 " href="{{ route('frontend.privacy.policy') }}">Privacy Policy</a> and <a target="blank" class="underline text-fave-500 " href="{{ route('frontend.refund.policy') }}">Refund and Return Policy</a></p>
                        </label>
                        <button type="submit" class="bg-fave-500 text-white px-2 rounded font-semibold py-1 whitespace-nowrap">Confirm Order</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('js')
    <script>
        $('#apply_coupon_btn').click(function() {
            var coupon_name = $('#coupon_input_field').val();
            var sub_total = {{ $grand_total_amount }};
            $.ajax({
                type: 'POST',
                url: "{{ route('frontend.coupon_add') }}",
                data: {
                    coupon_name: coupon_name,
                    sub_total: sub_total
                },
                success: function(data) {
                    $('#discount_amount').html(data.coupon_amount).removeClass('hidden');
                    $('.discount').removeClass('hidden');
                    $('#grandTotal').text(data.grand_total);
                    $('#currentTotal').val(data.grand_total);
                    $('#grandTotalValue').val(data.grand_total);
                    $('.coupon_area').css('display', 'none');
                    toastr.success(data.success);
                },
                error: function(xhr) {
                    // On error, display an error message with Toastr
                    if (xhr.responseJSON && xhr.responseJSON.error) {
                        toastr.error('Error: ' + xhr.responseJSON.error);
                    } else {
                        toastr.error('Please First Login.');
                    }
                }
            });
        });

        // $('body').on('change', '#selectArea', function(e) {
        //     var selectedValue = $(this).val();
        //     if (selectedValue == 0) {
        //         $('#paymentMethod').val('online');
        //         $('#paymentMethod option[value="cod"]').prop('disabled', true);
        //     } else {
        //         $('#paymentMethod').val('cod');
        //         $('#paymentMethod option[value="cod"]').prop('disabled', false);
        //     }
        //     var currentTotalData = $("#currentTotal").data('current-total');
        //     if (typeof currentTotalData === 'string') {
        //         var currentTotalValue = currentTotalData.replace(/[^0-9]/g, '');
        //         var currentTotalValue = {{ $currentTotal }};
        //     } else {
        //         var currentTotalValue = $("#currentTotal").data('current-total');
        //     }
        //     if (!isNaN(currentTotalValue)) {
        //         const grandTotal = parseFloat(selectedValue) + parseInt(currentTotalValue);
        //         $('#deliveryAmount').html(selectedValue);
        //         $('#grandTotal').html(grandTotal.toFixed(2)); // Display the grand total with two decimal places
        //         $('#deliveryValue').val(selectedValue);
        //         $('#grandTotalValue').val(grandTotal.toFixed(2)); // Set the grand total value with two decimal places
        //     } else {
        //         console.error('Invalid current total value');
        //     }
        //     // const grandTotal = parseInt(selectedValue) + parseInt(currentTotalValue);
        //     // $('#deliveryAmount').html(selectedValue);
        //     // $('#grandTotal').html(grandTotal);
        //     // $('#deliveryValue').val(selectedValue);
        //     // $('#grandTotalValue').val(grandTotal);
        // });

        // $('body').on('click', '#divisionSelect', function(e) {
        //     var division_id = $(this).val();
        //     $.ajax({
        //         type: 'POST',
        //         url: "{{ route('division.to_district') }}",
        //         data: {division_id:division_id },
        //         success: function(data){
        //             $('#district_dropdown').html(data);
        //         }
        //     });
        // });
        $('body').on('click', '#accountCheck', function(e) {
            var account_val = $(this).prop('checked');
            $('#emailId').removeClass('hidden');
            if (account_val) {
                $('#showPassword').removeClass('hidden');
            } else {
                $('#showPassword').addClass('hidden');
            }
        });
        $('body').on('click', '#selectOnline', function(e) {
            e.preventDefault();
            $("#selectCOD").removeClass('bg-gray-300');
            $(this).addClass('bg-gray-300');
            $('#pMethodStatus').val('online');
            $('#emailId').removeClass('hidden');
            $("#selectOnlineIcon").css({'color':'green'}).removeClass('hidden');
            $("#selectCODIcon").css({'color':'green'}).addClass('hidden');
        });
        $('body').on('click', '#selectCOD', function(e) {
            e.preventDefault();
            $(this).addClass('bg-gray-300');
            $('#pMethodStatus').val('cod');
            $('#emailId').addClass('hidden');
            $('#selectOnline').removeClass('bg-gray-300');
            $("#selectOnline").removeClass('bg-gray-300');
            $("#selectOnlineIcon").css({'color':'green'}).addClass('hidden');
            $("#selectCODIcon").css({'color':'green'}).removeClass('hidden');
        });

        // $('#district_dropdown').change(function(){
        //     var district_id = $(this).val();
        //     $.ajax({
        //         type: 'POST',
        //         url: "{{ route('district.to_upazila') }}",
        //         data: {district_id:district_id },
        //         success: function(data){
        //             $('#upazila_dropdown').html(data);
        //         }
        //     });
        // });

        // $('body').on('change', '#district_dropdown', function(e) {
        //     var district_id = $(this).val();

        //     var currentTotalData = $("#currentTotal").data('current-total');
        //     if (typeof currentTotalData === 'string') {
        //         var currentTotalValue = currentTotalData.replace(/[^0-9]/g, '');
        //     } else {
        //         var currentTotalValue = $("#currentTotal").data('current-total');
        //     }
        //     // var current_total = $("#currentTotal").val();
        //     // alert(current_total);
        //     $.ajax({
        //         type: 'POST',
        //         url: "{{ route('district.to_shipping') }}",
        //         data: {district_id:district_id},
        //         success: function(data){
        //             var grandTotal = parseInt(data.shippingCharge) + parseFloat(currentTotalValue);
        //             $('#deliveryAmount').html(data.shippingCharge);
        //             $('#grandTotal').html(grandTotal);
        //             $('#deliveryValue').val(data.shippingCharge);
        //             $('#grandTotalValue').val(grandTotal);
        //         }
        //     });
        // });
    </script>
@endpush
