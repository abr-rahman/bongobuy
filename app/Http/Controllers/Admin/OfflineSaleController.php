<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CancelOfflineOrderDataTable;
use App\DataTables\OfflineOrderDataTable;
use App\DataTables\PendingOfflineOrderDataTable;
use App\DataTables\ReturnOfflineOrderDataTable;
use App\Enums\ProductStatus;
use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Inventory;
use App\Models\OfflineCustomer;
use App\Models\OfflineOrder;
use App\Models\OfflineOrderList;
use App\Models\Product;
use App\Models\StockOut;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OfflineSaleController extends Controller
{
    public function customerSale($id)
    {
        $customer = OfflineCustomer::find($id);
        $cartCount = Cart::where('offline_customer_id', $customer->id)->with('color');
        $cart = $cartCount->get();
        $totalPrice = $cartCount->sum('price');
        $totalQuantity = $cartCount->sum('quantity');
        $products = Product::select('id', 'product_name')->where('status', ProductStatus::Active->value)->get();
        return view('admin.offline.customer.sale-create', compact('cart', 'products', 'customer', 'totalPrice', 'totalQuantity'));
    }

    public function selectProduct(Request $request)
    {

        $inventory = Inventory::select('id', 'product_id', 'quantity', 'color_id')
            ->with('color')
            ->where('product_id', $request->product_id)
            ->get();

        $select_option = '<option value="">--Select One--</option>';
        foreach($inventory as $item) {
            if ($item->color) {
                $select_option .= "<option value='{$item->color->id}'>{$item->color->color_name}</option>";
            }
        }
        $inventory = Inventory::select('id', 'product_id', 'quantity')->where('product_id', $request->product_id)->first();
        $quantity = $inventory->quantity;

        return response()->json([
            'inventory' => $select_option,
            'quantity' => $quantity,
            'product_id' => $request->product_id,
        ]);
    }

    public function selectColor(Request $request)
    {
        $inventory = Inventory::select('id', 'product_id', 'quantity')
                    ->where('product_id', $request->product_id)
                    ->where('color_id', $request->color_id)
                    ->first();
        $quantity = $inventory->quantity;
        return response()->json([
            'inventory' => $quantity,
        ]);
    }

    public function saleAddCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'customer_id' => 'required',
            'quantity' => 'required',
            'price' => 'required',
        ]);

        $product_id = $request->product_id;
        $customer_id = $request->customer_id;
        $color_id = $request->color_id;

        $inventory = Inventory::select('id', 'quantity', 'product_id')->where('product_id', $product_id)
            ->when($color_id, function ($query, $color_id) {
                return $query->where('color_id', $color_id);
            })
            ->first();
        if ($inventory->quantity < $request->quantity) {
            return back()->with('error', 'Stock Not Available!');
        }

        $addCart = Cart::select('id', 'offline_customer_id', 'product_id', 'quantity')
                    ->where('product_id', $product_id )
                    ->where('offline_customer_id', $customer_id)
                    ->where('color_id', $color_id);
        $exist = $addCart->exists();
        if ($exist == true) {
            $cart = $addCart->first();
            if ($inventory->quantity <= $cart->quantity) {
                return back()->with('error', 'Stock Not Available!');
            }
            $cart->increment('quantity', $request->quantity);
            $cart->save();
            return back()->with('success', 'It has already added & Increment quantity!');
            return response()->json(['']);
        }
        // dd($request->color_id);
        $cart = new Cart();
        $cart->offline_customer_id = $customer_id;
        $cart->product_id = $product_id;
        $cart->quantity = $request->quantity;
        $cart->price = $request->price;
        $cart->color_id = $request->color_id ?? null;
        $cart->size_id = $request->size_id ?? null;
        $cart->save();
        return back()->with('success', 'Added successfully!');
    }
    public function removeEnty($id)
    {
        $cart = Cart::find($id);
        $cart->forceDelete();
        return back()->with('error', 'Remove successfully!');
    }
    public function saleStore(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'grand_total' => 'required',
            'invoice_number' => 'nullable',
            'sub_total' => 'required',
        ]);
        $randomInvoice = mt_rand(1000000000, 9999999999);
        $subTotal = intval($request->sub_total);
        $order_id = OfflineOrder::insertGetId([
            'offline_customer_id' => $request->customer_id,
            'grand_total' => $request->grand_total,
            'due_amount' => $request->due_amount,
            'payable_amount' => $request->payable_amount,
            'sub_total' => $subTotal,
            'invoice_number' => str_replace([' ', '/', ',', '.', '-', '+'], '-',  $randomInvoice) ?? null,
            'shipping_charge' => $request->shipping_charge ?? null,
            'created_at' => Carbon::now(),
            'status' => StatusEnum::Pending->value,
        ]);

        $carts = Cart::where('offline_customer_id', $request->customer_id)->get();

        foreach ($carts as $cart) {
            // dd($cart->color_id);
            // $inventory = Inventory::where('product_id', $cart->product_id)->exists();
            // if($inventory == true) {
            //     // According to size and color quantiy decrement
            //     if ($cart->color_id != null && $cart->size_id != null) {
            //         Inventory::where(['product_id' => $cart->product_id, 'color_id' => $cart->color_id, 'size_id' => $cart->size_id])->decrement('quantity', $cart->quantity);
            //     }

            //     // According to only size and quantiy decrement
            //     if ($cart->color_id == null && $cart->size_id != null) {
            //         Inventory::where(['product_id' => $cart->product_id, 'color_id' => null, 'size_id' => $cart->size_id])->decrement('quantity', $cart->quantity);
            //     }

            //     // According to only color and quantiy decrement
            //     if ($cart->color_id != null && $cart->size_id == null) {
            //         Inventory::where(['product_id' => $cart->product_id, 'color_id' => $cart->color_id, 'size_id' => null])->decrement('quantity', $cart->quantity);
            //     }

            //     // According to size and color both empty only quantiy decrement
            //     if ($cart->color_id == null && $cart->size_id == null) {
            //         Inventory::where(['product_id' => $cart->product_id, 'color_id' => null, 'size_id' => null])->decrement('quantity', $cart->quantity);
            //     }
            // } else {
            //     return response()->json(['Stock not available!']);
            // }
            OfflineOrderList::insert([
                'offline_order_id' => $order_id,
                'product_id' => $cart->product_id,
                'quantity' => $cart->quantity,
                'color_id' => $cart->color_id,
                'size_id' => $cart->size_id,
                'product_price' => $cart->price,
                'created_at' => Carbon::now(),
            ]);
            // StockOut::insert([
            //     'product_id' => $cart->product_id,
            //     'size_id' => $cart->size_id,
            //     'color_id' => $cart->color_id,
            //     'quantity' => $cart->quantity,
            //     'product_price' => $cart->price,
            //     'created_at' => Carbon::now(),
            // ]);
            $cart->forceDelete();
        }
        return back()->with('success', 'Sale created successfully!');
    }

    public function orderUpdate(Request $request, $id)
    {
        $request->validate([
            'grand_total' => 'required',
            'invoice_number' => 'nullable',
        ]);
        $order = OfflineOrder::find($id);
        $order->grand_total = $request->grand_total;
        $order->payable_amount = $request->payable_amount;
        $order->due_amount = $request->due_amount;
        $order->updated_at = Carbon::now();
        $order->status = StatusEnum::Pending->value;
        $order->save();
        return back()->with('success', 'Sale updated successfully!');
    }
    public function orderIndex(OfflineOrderDataTable $dataTable)
    {
        return $dataTable->render('admin.offline.order-index');
    }

    public function offlinePendingOrder(PendingOfflineOrderDataTable $uOdataTable)
    {
        return $uOdataTable->render('admin.order.user');
    }

    public function cancelOfflineOrder(CancelOfflineOrderDataTable $pOdataTable)
    {
        return $pOdataTable->render('admin.order.pending');
    }

    public function returnOfflineOrder(ReturnOfflineOrderDataTable $ppdataTable)
    {
        return $ppdataTable->render('admin.order.processing');
    }

    public function orderShow($id)
    {
        $order = OfflineOrder::find($id);
        $orderList = OfflineOrderList::where('offline_order_id', $order->id)->get();
        return view('admin.offline.order-show', compact('orderList', 'order'));
    }
    public function orderEdit($id)
    {
        $order = OfflineOrder::find($id);
        return view('admin.offline.order-edit', compact('order'));
    }

    public function amountStatus($id)
    {
        $order = OfflineOrder::find($id);
        $order->payable_amount = $order->grand_total;
        $order->due_amount = 00;
        $order->save();
        return response()->json(['Amount status changed successfully!']);
    }

    public function orderConfirm($id)
    {
        $order = OfflineOrder::find($id);

        $orderLists = OfflineOrderList::select('id', 'product_id', 'size_id', 'color_id', 'quantity', 'product_price')
                                ->where('offline_order_id', $order->id);
        $orderItems = $orderLists->get();

        foreach ($orderItems as $orderList) {
            $inventory = Inventory::where('product_id', $orderList->product_id)->first();
            if ($inventory->quantity > 0) {
                StockOut::insert([
                    'product_id' => $orderList->product_id,
                    'size_id' => $orderList->size_id,
                    'color_id' => $orderList->color_id,
                    'quantity' => $orderList->quantity,
                    'product_price' => $orderList->product_price,
                    'created_at' => Carbon::now(),
                ]);
                // According to size and color quantiy decrement
                if ($orderList->color_id != null && $orderList->size_id != null) {
                    Inventory::where(['product_id' => $orderList->product_id, 'color_id' => $orderList->color_id, 'size_id' => $orderList->size_id])->decrement('quantity', $orderList->quantity);
                }

                // According to only size and quantiy decrement
                if ($orderList->color_id == null && $orderList->size_id != null) {
                    Inventory::where(['product_id' => $orderList->product_id, 'color_id' => null, 'size_id' => $orderList->size_id])->decrement('quantity', $orderList->quantity);
                }

                // According to only color and quantiy decrement
                if ($orderList->color_id != null && $orderList->size_id == null) {
                    Inventory::where(['product_id' => $orderList->product_id, 'color_id' => $orderList->color_id, 'size_id' => null])->decrement('quantity', $orderList->quantity);
                }

                // According to size and color both empty only quantiy decrement
                if ($orderList->color_id == null && $orderList->size_id == null) {
                    Inventory::where(['product_id' => $orderList->product_id, 'color_id' => null, 'size_id' => null])->decrement('quantity', $orderList->quantity);
                }
            } else {
                return response()->json(['Stock not available!']);
            }
        }
        $order->status = StatusEnum::Approved->value;
        $order->save();
        return response()->json(['Amount status changed successfully!']);
    }
    public function orderCancel($id)
    {
        $order = OfflineOrder::find($id);
        $order->status = StatusEnum::Rejected->value;
        $order->save();
        return response()->json(['Status changed successfully!']);
    }
    public function orderReturn($id)
    {
        $order = OfflineOrder::find($id);
        $orderLists = OfflineOrderList::select('id', 'product_id', 'size_id', 'color_id', 'quantity', 'product_price')
        ->where('offline_order_id', $order->id)->get();
        foreach ($orderLists as $orderList) {
            Inventory::where('product_id', $orderList->product_id)->increment('quantity', $orderList->quantity);

            $stockOut = StockOut::where([
                'product_id' => $orderList->product_id,
                'size_id' => $orderList->size_id,
                'color_id' => $orderList->color_id,
                'quantity' => $orderList->quantity,
                'product_price' => $orderList->product_price,
            ])->orderBy('created_at', 'desc')->first();
            $stockOut->forceDelete();
        }
        $order->status = StatusEnum::Return->value;
        $order->save();
        return response()->json(['Status changed successfully!']);
    }
}
