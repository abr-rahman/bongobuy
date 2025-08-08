<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CouponController extends Controller
{
    public function addCoupon(Request $request)
    {
        if (Coupon::where('code', $request->coupon_name)->exists()) {
            $currentDate = now();
            $coupon = Coupon::where('code', $request->coupon_name)->first();

            $userIdsString = $coupon->user_id;
            $userIdsArray = explode(',', $userIdsString);
            $currentUserId = auth()->user()->id;

            switch (true) {
                case $coupon->valid_from <= $currentDate && $coupon->valid_to >= $currentDate:
                    // if (in_array($currentUserId, $userIdsArray) == false) {
                        // Check other conditions here, such as minimum order and use limit
                        if ($coupon->minimum_order <= $request->sub_total && $coupon->use_limit > 0) {
                            if ($coupon->fixed_amount != 00) {
                                Session::put('coupon_code', $request->coupon_name);
                                $grand_total = $request->sub_total - $coupon->fixed_amount;

                                Session::put('sub_total', $grand_total);
                                Session::put('coupon_fixed_amount', $grand_total);
                                return response()->json([
                                    'coupon_type_fixed' => '',
                                    'grand_total' => $grand_total,
                                    'coupon_amount' => $coupon->fixed_amount. ' ৳',
                                    'success' => 'Coupon Applied Successfully!'
                                ]);
                            } else {
                                Session::put('coupon_code', $request->coupon_name);
                                $grand_total = $request->sub_total - ($request->sub_total * ($coupon->percent_amount / 100));
                                Session::put('sub_total', $grand_total);
                                Session::put('coupon_percent_amount', $grand_total);
                                return response()->json([
                                    'coupon_type_percent' => '',
                                    'grand_total' => $grand_total,
                                    'coupon_amount' => $coupon->percent_amount.' %',
                                    'success' => 'Coupon Applied Successfully!'
                                ]);
                            }
                        } else {
                            Session::put('coupon_code', '');
                            return response()->json(['error' => 'Please check use limit or order amount!'], 404);
                        }
                    // }
                    Session::put('coupon_code', '');
                    return response()->json(['error' => 'Already used coupon!'], 404);
                    break;
                default:
                    Session::put('coupon_code', '');
                    return response()->json(['error' => 'Invalid coupon!'], 404 );
            }
        } else {
            Session::put('coupon_code', '');
            return response()->json(['error' => 'Coupon does not match'], 406);
        }
    }
}
