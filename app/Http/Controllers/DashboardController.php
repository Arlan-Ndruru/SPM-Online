<?php

namespace App\Http\Controllers;

use App\Models\Mosque;
use App\Models\Mustahik;
use App\Models\User;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole(['Admin'])) {
        $params = [
                'title' => "Administrator",
                'cuser' => User::latest()->where('status', 1)->count(),
                'cmustahik' => Mustahik::latest()->where('ket', 2)
                ->orWhere('ket', 1)
                ->orWhere('ket', 3)
                ->orWhere('ket', 4)->count(),
                'cstaf' => User::latest()->whereRoleis(['Staf-Resepsionis'])
                ->orWhereRoleis(['Staf-Distribusi'])->count(),

                'cmasjid' => Mosque::latest()->count(),
            ];
        }
        if (Auth::user()->hasRole(['Ketua'])) {
            $params = [
                'title' => "Ketua Baznas",
                'cuser' => User::latest()->where('status', 1)->count(),
                'cmustahik' => Mustahik::latest()->where('ket', 2)
                ->orWhere('ket', 3)
                ->orWhere('ket', 4)->count(),
                'cmasjid' => Mosque::latest()->count(),
                'cstaf' => User::latest()->whereRoleis(['Staf-Resepsionis'])
                ->orWhereRoleis(['Staf-Distribusi'])->count(),
            ];
        }
        if (Auth::user()->hasRole(['Staf-Distribusi'])) {
            $params = [
                'title' => "Staf Distribusi",
                'cmustahik' => Mustahik::latest()->where('ket', 2)
                ->orWhere('ket', 3)
                ->orWhere('ket', 4)->count(),
            ];
        }
        if (Auth::user()->hasRole(['Staf-Resepsionis'])) {
        $params = [
                'title' => "Staf Resepsionis",
                'cmasjid' => Mosque::latest()->count(),
                'cuser' => User::latest()->where('status', 1)->count(),
                'cmustahik' => Mustahik::latest()->where('ket', 1)
                ->orWhere('ket', 2)
                ->orWhere('ket', 3)
                ->orWhere('ket', 4)->count(),
            ];
        }
        if (Auth::user()->hasRole(['Calon-Mustahik'])) {
            $cek = Auth::user()->unique_number;
            $mustahikcek = Mustahik::where('unique_number', $cek);
        $params = [
                'title' => "Mustahik",
                'mustahiks' => $mustahikcek->paginate(2),
                'mosque' => Mosque::all(),

            ];
        }
        return view('dashboard')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'unique_number' => 'required|unique:mustahiks',
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
        ]);
        $validatedData['ket'] = 1;
        $validatedData['unique_number'] = Auth::user()->unique_number;
        $validatedData['created_by'] = Auth::user()->id;


        // dd($validatedData);

        if ($request->file('surat_pengantar')) {
            $validatedData['surat_pengantar'] = $request->file('surat_pengantar')->store('bymustahik/surat_pengantar');
        }

        if ($request->file('f_foto')) {
            $validatedData['f_foto'] = $request->file('f_foto')->store('bymustahik/Files_FOTO');
        }

        if ($request->file('f_ktp')) {
            $validatedData['f_ktp'] = $request->file('f_ktp')->store('bymustahik/Files_KTP');
        }

        if ($request->file('f_kk')) {
            $validatedData['f_kk'] = $request->file('f_kk')->store('bymustahik/Files_KK');
        }
        // dd($validatedData);
        
        Mustahik::create($validatedData);
        
        return redirect('dashboard/')->with('success', "Terima Kasih telah Mendaftar sebagai Calon Mustahik <br>, $request->name anda berhasil mendaftar, Silahkan menunggu proses.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Mustahik $mustahik)
    {
        $params = [
            'title' => 'Ubah data',
            'mustahik' => $mustahik,
            'mosque' => Mosque::get(),
        ];
        return view('dash.mustahiks.update')->with($params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mustahik $mustahik)
    {
        // dd($request);
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
            
        ];
        if ($request->unique_number != $mustahik->unique_number) {
            $rules['unique_number'] = 'required|unique:mustahiks|digits:16';
        }
        if ($request->slug != $mustahik->slug) {
            $rules['slug'] = 'required|unique:mustahiks|digits:16';
        }
        $validatedData = $request->validate($rules);
        $validatedData['ket'] = 1;
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
        return redirect('dashboard')->with('success', "Data Mustahik berhasil Edited Successfully !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mustahik $mustahik)
    {
        if ($mustahik->ket == 4) {
            Mustahik::destroy($mustahik->id);
            return redirect('dashboard/')->with('success', "Data Mustahik, $mustahik->name has successfully been deleted.");
        }
        return redirect('dashboard/')->with('error', "Data Mustahik, $mustahik->name gagal dihapus karena sedang dalam proses.");
    }
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Mustahik::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
