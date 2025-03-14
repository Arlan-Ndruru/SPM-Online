<?php

namespace App\Http\Controllers\Dashboards;

use App\Http\Controllers\Controller;
use App\Models\Mosque;
use App\Models\Mustahik;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardMustahikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole(['Staf-Distribusi'])) {
            $mustahik = Mustahik::orderBy('updated_at', 'DESC')->where('ket', 3)
            ->orWhere('ket', 2)
            ->orWhere('ket', 4);
            
        }else {
            $mustahik = Mustahik::orderBy('updated_at', 'DESC');
        }
        $params = [
            'title' => 'Kelola Data Mustahik',
            'mustahiks' => $mustahik->filter(request(['search', 'searchDate']))->paginate(5),

        ];
        return view('dash.mustahiks.index')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $params = [
            'title' => 'Tambah Data Mustahik',
            'mosque' => Mosque::get(),
        ];

        return view('dash.mustahiks.create')->with($params);
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
            'unique_number' => 'required|unique:mustahiks|digits:16',
            'name' => 'required',
            'slug' => 'required|unique:mustahiks',
            'alamat' => 'required',
            't_lahir' => 'required',
            'tl' => 'required',
            'masjid' => 'required',
            'no_hpM' => 'required',
            'surat_pengantar' => 'required|mimes:pdf|max:2048',
            'f_ktp' => 'required|mimes:pdf|max:2048',
            'f_kk' => 'required|mimes:pdf|max:2048',
            'f_foto' => 'required|image|mimes:png,jpg,jpeg|file|max:2048',
            'ket' => 'required',
        ]);

        $validatedData['created_by'] = Auth::user()->id;

        // dd($validatedData);

        if ($request->file('surat_pengantar')) {
            $validatedData['surat_pengantar'] = $request->file('surat_pengantar')->store('bysistem/surat_pengantar');
        }

        if ($request->file('f_foto')) {
            $validatedData['f_foto'] = $request->file('f_foto')->store('bysistem/Files_FOTO');
        }

        if ($request->file('f_ktp')) {
            $validatedData['f_ktp'] = $request->file('f_ktp')->store('bysistem/Files_KTP');
        }

        if ($request->file('f_kk')) {
            $validatedData['f_kk'] = $request->file('f_kk')->store('bysistem/Files_KK');
        }

        Mustahik::create($validatedData);

        return redirect('dashboard/mustahiks')->with('success', "Mustahik, $request->name has successfully been created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mustahik  $mustahik
     * @return \Illuminate\Http\Response
     */
    public function show(Mustahik $mustahik)
    {
        $params = [
            'title' => 'Detail Data Mustahik',
            'mustahik' => $mustahik,
        ];

        return view('dash.mustahiks.show')->with($params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mustahik  $mustahik
     * @return \Illuminate\Http\Response
     */
    public function edit(Mustahik $mustahik)
    {
        $params = [
            'title' => 'Edit Data Mustahik',
            'mosque' => Mosque::all(),
            'mustahik' => $mustahik
        ];
        return view('dash.mustahiks.edit')->with($params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mustahik  $mustahik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mustahik $mustahik)
    {
        $rules = [
            // 'unique_number' => 'required|unique:mustahiks|digits:16',
            'name' => 'required',
            // 'slug' => 'required|unique:mustahiks',
            'alamat' => 'required',
            't_lahir' => 'required',
            'tl' => 'required',
            'masjid' => 'required',
            'no_hpM' => 'required',
            // 'surat_pengantar' => 'required',
            'ket' => 'required',
        ];
        if ($request->unique_number != $mustahik->unique_number) {
            $rules['unique_number'] = 'required|unique:mustahiks|digits:16';
        }
        if ($request->slug != $mustahik->slug) {
            $rules['slug'] = 'required|unique:mustahiks|digits:16';
        }
        $validatedData = $request->validate($rules);
        // dd($validatedData);
        if ($request->file('surat_pengantar')) {
            if ($request->surat_pengantarOld) {
                Storage::delete($request->surat_pengantarOld);
            }
            $validatedData['surat_pengantar'] = $request->file('surat_pengantar')->store('bysistem/surat_pengantar');
        }

        if ($request->file('f_foto')) {
            if ($request->f_fotoOld) {
                Storage::delete($request->f_fotoOld);
            }
            $validatedData['f_foto'] = $request->file('f_foto')->store('bysistem/Files_FOTO');
        }

        if ($request->file('f_ktp')) {
            if ($request->f_ktpOld) {
                Storage::delete($request->f_ktpOld);
            }
            $validatedData['f_ktp'] = $request->file('f_ktp')->store('bysistem/Files_ktp');
        }
        if ($request->file('f_kk')) {
            if ($request->f_kkOld) {
                Storage::delete($request->f_kkOld);
            }
            $validatedData['f_kk'] = $request->file('f_kk')->store('bysistem/Files_kk');
        }

        Mustahik::where('id', $mustahik->id)
            ->update($validatedData);
        return redirect('dashboard/mustahiks')->with('success', "Data Mustahik berhasil Edited Successfully !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mustahik  $mustahik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mustahik $mustahik)
    {
        if ($mustahik->f_foto) {
            Storage::delete($mustahik->f_foto);
        }
        if ($mustahik->f_ktp) {
            Storage::delete($mustahik->f_ktp);
        }
        if ($mustahik->f_kk) {
            Storage::delete($mustahik->f_kk);
        }
        if ($mustahik->surat_pengantar) {
            Storage::delete($mustahik->surat_pengantar);
        }
        Mustahik::destroy($mustahik->id);
        return redirect('dashboard/mustahiks')->with('success', "Data Mustahik, $mustahik->name has successfully been deleted.");
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Mustahik::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
