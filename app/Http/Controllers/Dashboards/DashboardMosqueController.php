<?php

namespace App\Http\Controllers\Dashboards;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Mosque;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

use function Psy\debug;

class DashboardMosqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mosque = Mosque::latest();
        $params = [
            'title' => "Kelola Masjid",
            'mosques' => $mosque->filter(request(['search', 'searchDate']))->paginate(5),
        ];
        return view('dash.mosques.index')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $params = [
            'title' => "Tambah Data Masjid",
        ];
        return view('dash.mosques.create')->with($params);
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
            'name' => 'required|unique:mosques',
            'slug' => 'required|unique:mosques',
            'name_ketua' => 'required',
            'alamat' => 'required',
            'jtMasjid' => 'required',
            'rtMasjid' => 'required',
            'rwMasjid' => 'required',
            'kecm' => 'required',
            'no_hpMasjid' => 'required',
            'ket' => 'required',
        ]);
        // dd($validatedData);
        Mosque::create($validatedData);

        return redirect('dashboard/mosques')->with('success', "Masjid $request->name has successfully been created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mosque  $mosque
     * @return \Illuminate\Http\Response
     */
    public function show(Mosque $mosque)
    {
        $params = [
            'title' => 'Data Detail Masjid',
            'mosque' => $mosque,
        ];

        return view('dash.mosques.show')->with($params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mosque  $mosque
     * @return \Illuminate\Http\Response
     */
    public function edit(Mosque $mosque)
    {
        $params = [
            'mosque' => $mosque,
            'district' => District::get(),
            'title' => "Edit Data Masjid"
        ];
        return view('dash.mosques.edit')->with($params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mosque  $mosque
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mosque $mosque)
    {
        // dd($request);
        $rules = [
            'name' => 'required',
            // 'slug' => 'required',
            'name_ketua' => 'required',
            'jtMasjid' => 'required',
            'alamat' => 'required',
            'rtMasjid' => 'required',
            'rwMasjid' => 'required',
            'kecm' => 'required',
            'no_hpMasjid' => 'required',
            'ket' => 'required',
        ];

        if ($request->slug != $mosque->slug) {
            $rules['slug'] = 'required|unique:mosques';
        }

        $validatedData = $request->validate($rules);

        Mosque::where('id', $mosque->id)
            ->update($validatedData);

        return redirect('dashboard/mosques')->with('success', "Masjid $mosque->name has successfully been Updated.");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mosque  $mosque
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mosque $mosque)
    {
        // if ($user->foto) {
        //     Storage::delete($user->foto);
        // }
        Mosque::destroy($mosque->id);
        return redirect('dashboard/mosques')->with('success', "Mesjid $mosque->name has successfully been deleted.");
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Mosque::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
