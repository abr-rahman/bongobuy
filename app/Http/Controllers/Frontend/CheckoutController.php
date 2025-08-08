<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderStoreRequest;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderList;
use App\Models\Shipping;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

class CheckoutController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function checkout()
    {
        $currentTotal = Session::get('sub_total');
        $buyNow = Session::get('buy_now');
        $cart = session()->get('cart');
        if(Session::get('coupon_code') != "") {
            $coupon = Coupon::where('code', Session::get('coupon_code'))->first();
            $coupon->decrement('use_limit', 1);
            $newId = auth()->user()->id ?? '';
            $existingUserIds = $coupon['user_id'];
            $existingUserIds = empty($existingUserIds) ? [] : explode(',', $existingUserIds);
            $existingUserIds[] = $newId;
            $coupon['user_id'] = implode(',', $existingUserIds);
            $coupon->save();
        } else {
            if($buyNow != null) {
                $after_link = explode('/', url()->previous());
                if(end($after_link) == ""){
                    $currentTotal = $buyNow;
                }
            }
        }
        return view('frontend.checkout.index', compact('currentTotal'));
    }
    public function disTiShipping(Request $request)
    {
        $shipping = Shipping::where('status', StatusEnum::Active->value)->where('district_id', $request->district_id)->first();
        $charge = $shipping->charge;

        return response()->json([
            'shippingCharge' => $charge,
        ]);
    }

    public function orderConfirm(OrderStoreRequest $request)
    {
        if (session('cart') != null) {
            if( $request->payment_method == 'online'){
                $request->validate([
                    'email' => 'required|email',
                ]);
            }
            if(!auth()->check()) {
                if($request->account_check == 'on'){
                    $request->validate([
                        'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
                    ]);
                    $user = User::create([
                        'name' => $request->customer_name,
                        'email' => $request->email,
                        'profile_photo' => 'default-profile-image.png',
                        'password' => Hash::make($request->password ?? $request->email),
                    ]);
                    event(new Registered($user));
                }
            }
            $after_link = explode('/', url()->previous());
            if(end($after_link) != "checkout"){
                return abort(404);
            }
            $sub_total = $request->grand_total - 0; //  $request->shipping_charge ( 0 will be $request->shipping_charge)
            $discount = 0;
            if (Session::get('coupon_code') != '') {
                $coupon = Coupon::where('code', Session::get('coupon_code'))->first();
                if ($coupon->fixed_amount != 00){
                    $discount = $coupon->fixed_amount;
                }else{
                    $discount =  ($request->sub_total * ($coupon->percent_amount/100));
                }
            }
            $randomInvoice = mt_rand(1000000000, 9999999999);
            $order_id = Order::insertGetId([
                'user_id' => $user->id ?? null,
                'customer_name' => $request->customer_name,
                'email' => $request->email ?? null,
                'phone' => $request->phone,
                'address' => $request->address,
                'division_id' => $request->division_id ?? null,
                'district_id' => $request->district_id ?? null,
                'upazila_id' => $request->upazila_id ?? null,
                'thana' => $request->thana ?? null,
                'payment_method' => $request->payment_method ?? null,
                'landmark' => $request->landmark ?? null,
                'shipping_charge' => $request->shipping_charge ?? 00,
                'grand_total' => $request->grand_total,
                'sub_total' => $request->sub_total,
                'payable_amount' => 00,
                'due_amount' => $request->grand_total,
                'coupon_code' => Session::get('coupon_code'),
                'discount_amount' => $discount,
                'brand_id' => $request->brand_id,
                'invoice_number' => str_replace([' ', '/', ',', '.', '-', '+'], '-',  $randomInvoice) ?? null,
                'created_at' => Carbon::now(),
                'role' => 'user',
            ]);

            foreach (session('cart') as $cart) {
                OrderList::insert([
                    'order_id' => $order_id,
                    'product_id' => $cart['id'],
                    'quantity' => $cart['quantity'],
                    'color_id' => $cart['color_id'] ?? null,
                    // 'size_id' => $cart->size_id,
                    'product_price' => $cart['price'],
                    'created_at' => Carbon::now(),
                ]);
                // $cart->forceDelete();
                Session::forget('cart');
            }
            Session::forget('sub_total');
            Session::forget('buy_now');
            Session::forget('coupon_code');
            // $notifyMessage = [
            //     'title' => 'Your Order has been placed successfully!',
            //     'name' => 'Thank You'.' '.$request->customer_name,
            // ];
            // Notification::route('mail', $request->email)
            //    ->notify(new OrderConfirmation($notifyMessage));

            if( $request->payment_method == 'online'){
                Session::put('s_order_id', $order_id);
                return redirect('pay');
            }else{
                if (auth()->check()) {
                    return redirect()->route('user.dashboard')->with('success', 'Order created successfully!');
                } else {
                    return redirect()->route('frontend.index')->with('success', 'Order created successfully!');
                }
            }
        }
        return back()->with('error', 'Please add to cart a product!');;
    }
}
