<?php

namespace App\Http\Controllers\Dashboards;

use App\Http\Controllers\Controller;
use App\Models\District;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class DashboardDistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $district = District::latest();
        $params = [
            'title' => 'Data Kecamatan',
            'districts' => $district->filter(request(['search', 'searchDate']))->paginate(5),
        ];
        return view('dash.districts.index')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $params = [
            'title' => 'Tambah Data Kecamatan',

        ];
        return view('dash.districts.create')->with($params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'name' => 'required|unique:districts',
            'slug' => 'required|unique:districts',
            'kota' => 'required',
            'ket' => 'required',
        ]);

        District::create($validatedData);

        return redirect('dashboard/districts')->with('success', "Data Kecamatan $request->name has successfully been created.");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(District $district)
    {
        $params = [
            'title' => 'Data Detail Kecamatan',
            'district' => $district,
        ];

        return view('dash.districts.show')->with($params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(District $district)
    {
        $params = [
            'district' => $district,
            'title' => "Edit Data Kecamatan"
        ];
        return view('dash.districts.edit')->with($params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, District $district)
    {
        // dd($request);
        $rules = [
            // 'name' => 'required|unique:districts',
            // 'slug' => 'required|unique:districts',
            'kota' => 'required',
            'ket' => 'required',
        ];

        if ($request->slug != $district->slug) {
            $rules['slug'] = 'required|unique:districts';
        }
        if ($request->name != $district->name) {
            $rules['name'] = 'required|unique:districts';
        }

        $validatedData = $request->validate($rules);

        District::where('id', $district->id)
            ->update($validatedData);

        return redirect('dashboard/districts')->with('success', "Data Kecamatan $district->name has successfully been Updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(District $district)
    {
        District::destroy($district->id);
        return redirect('dashboard/districts')->with('success', "Data Kecamatan $district->name has successfully been deleted.");
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(District::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
