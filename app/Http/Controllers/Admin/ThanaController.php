<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ThanaDataTable;
use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Upazila;
use Illuminate\Http\Request;

class ThanaController extends Controller
{
    public function create()
    {
        $districts = District::select('id', 'name')->get();
        return view('admin.thana.create', compact('districts'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'district_id'=> 'required',
            'name'=> 'required|unique:upazilas',
            'bn_name'=> 'required',
        ]);
        Upazila::create($request->except('_token'));

        return back()->with('success','Created successfully!');
    }
}
