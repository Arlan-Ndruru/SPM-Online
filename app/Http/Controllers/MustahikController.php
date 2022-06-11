<?php

namespace App\Http\Controllers;

use App\Models\Mustahik;
use App\Http\Requests\StoreMustahikRequest;
use App\Http\Requests\UpdateMustahikRequest;
use Illuminate\Support\Facades\Auth;

class MustahikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreMustahikRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMustahikRequest $request)
    {
        $validatedData = $request->validate([
            'unique_number' => 'required',
            'name' => 'required',
            'slug' => 'required|unique:mustahiks',
            'alamat' => 'required',
            't_lahir' => 'required',
            'tl' => 'required',
            'masjid' => 'required',
            'no_hpM' => 'required',
            'surat_pengantar' => 'required',
            'f_ktp' => 'required',
            'f_kk' => 'required',
        ]);
        $validatedData['ket'] = 'b-v';
        $validatedData['created_by'] = Auth::user()->id;


        // dd($validatedData);

        if ($request->file('surat_pengantar')) {
            $validatedData['surat_pengantar'] = $request->file('surat_pengantar')->store('bymustahik/surat_pengantar');
        }

        if ($request->file('f_ktp')) {
            $validatedData['f_ktp'] = $request->file('f_ktp')->store('bymustahik/Files_KTP');
        }

        if ($request->file('f_kk')) {
            $validatedData['f_kk'] = $request->file('f_kk')->store('bymustahik/Files_KK');
        }

        Mustahik::create($validatedData);

        return redirect('dashboard/')->with('success', "Terima Kasih telah Mendaftar sebagai Calon Mustahik, $request->name anda berhasil mendaftar, Silahkan menunggu proses.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mustahik  $mustahik
     * @return \Illuminate\Http\Response
     */
    public function show(Mustahik $mustahik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mustahik  $mustahik
     * @return \Illuminate\Http\Response
     */
    public function edit(Mustahik $mustahik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMustahikRequest  $request
     * @param  \App\Models\Mustahik  $mustahik
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMustahikRequest $request, Mustahik $mustahik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mustahik  $mustahik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mustahik $mustahik)
    {
        //
    }
}
