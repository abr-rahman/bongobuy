<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Outlets;
use App\Models\Slider;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\Vue;

class OutletsController extends Controller
{
    public function index()
    {
        $outlets = Outlets::select('id','district_id', 'upazila_id')->where('status', StatusEnum::Active->value)->get();
        $districts = $outlets->unique('district_id');
        $upazilas = $outlets->unique('upazila_id');
        $sliders = Slider::select('id', 'heading', 'paragraph', 'url', 'button_type', 'image', 'numbering')
        ->where('status', StatusEnum::Outlet->value)->orderBy('numbering', 'asc')->get();
        return view('frontend.outlets.index', compact('outlets', 'districts', 'sliders', 'upazilas'));
    }

    public function districtWise($id)
    {
        $outlets = Outlets::find($id);
        $outletDistrict = Outlets::where('district_id', $outlets->district_id)->get();
        return view('frontend.outlets.parts.district', compact('outletDistrict'));
    }

    public function areaWise($id)
    {
        $outlets = Outlets::find($id);
        $outletArea = Outlets::where('upazila_id', $outlets->upazila_id)->get();
        return view('frontend.outlets.parts.area', compact('outletArea'));
    }
}
