<?php

namespace App\Http\Controllers\Admin;

use App\Models\QtyBasedPrice;
use App\Http\Controllers\Controller;
use App\Http\Requests\QtyBasedPriceRequest;
use App\Models\Product;
use App\Services\Interfaces\QtyBasedServiceInterface;
use Illuminate\Http\Request;

class QtyBasedPriceController extends Controller
{
    protected $qtyBasedPrice;

    public function __construct(QtyBasedServiceInterface $qtyBasedPrice)
    {
        $this->qtyBasedPrice = $qtyBasedPrice;
    }

    public function create($id)
    {
        $product = Product::select('id')->find($id);
        return view('admin.product.qty-based.create', compact('product'));
    }

    public function store(QtyBasedPriceRequest $request)
    {
        $this->qtyBasedPrice->store($request->validated());
        return back()->with('success', 'Created successfully!');
    }

    public function edit(QtyBasedPrice $qtyBasedPrice)
    {
        return view('admin.product.edit', compact('qtyBasedPrice'));
    }

    public function update(Request $request, $id)
    {
        $this->qtyBasedPrice->update($request->validated(), $id);
        return back()->with('success', 'Updated successfully!');
    }

    public function destroy($id)
    {
        $this->qtyBasedPrice->delete($id);
        return response()->json('Deleted successfully!');
    }

    public function active($id)
    {
        $this->qtyBasedPrice->statusInactive($id);
        return response()->json(['Status changed successfully!']);
    }

    public function inActive($id)
    {
        $this->qtyBasedPrice->statusActive($id);
        return response()->json(['Status changed successfully!']);
    }
}
