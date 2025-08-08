<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreColorRequest;
use App\Http\Requests\UpdateColorRequest;
use App\Services\ColorService;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    protected $serviceName;

    public function __construct(ColorService $serviceName)
    {
        $this->serviceName = $serviceName;
    }

    public function create()
    {
        return view('admin.viewFolder.create');
    }

    public function store(StoreColorRequest $request)
    {
        $item = new Color();
        $item->color_name = $request->color_name ?? null;
        $item->color_code = $request->color_code ?? null;
        $item->save();
        return back()->with('success', 'Created successfully!');
    }

    public function show(Color $color)
    {
        //
    }

    public function edit(Color $color)
    {
        return view('addition.color-size.edit', compact('color'));
    }

    public function update(UpdateColorRequest $request, $id)
    {
        $this->serviceName->update($request->validated(), $id);
        return back()->with('success', 'Updated successfully!');
    }

    // public function destroy($id)
    // {
    //     $this->serviceName->delete($id);
    //     return response()->json('Deleted successfully!');
    // }
    public function delete($id)
    {
        $this->serviceName->delete($id);
        return response()->json('Deleted successfully!');
    }

    public function active($id)
    {
        $this->serviceName->statusInactive($id);
        return response()->json(['Status changed successfully!']);
    }

    public function inActive($id)
    {
        $this->serviceName->statusActive($id);
        return response()->json(['Status changed successfully!']);
    }


}
