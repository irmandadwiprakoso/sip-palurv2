<?php

namespace App\Http\Controllers;

use App\Models\Kependudukan;
use Illuminate\Http\Request;
use App\Models\Rw;
use App\Models\Rt;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;

class KependudukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kependudukan = Kependudukan::all();
        return view('pemtrantibum.kependudukan.index', compact('kependudukan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rt = Rt::all();
        $rw = Rw::all();
        // Get semua data
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();
        $villages = Village::all();

        return view ('pemtrantibum.kependudukan.create', compact('rt', 'rw'));
    }

    public function getkabupaten(request $request)
    {
        $id_provinsi = $request->id_provinsi;
        $regencies = Regency::where('province_id', $id_provinsi)->get();

        $option = "<option >Pilih Kota/Kabupaten...</option>";

        foreach ($regencies as $kabupaten) {
            $option.= "<option value='$kabupaten->id'>$kabupaten->name</option>";
        }
        echo $option;
    }

    public function getkecamatan(request $request)
    {
        $id_kabupaten = $request->id_kabupaten;
        $districts = District::where('regency_id', $id_kabupaten)->get();
        $option = "<option>Pilih Kecamatan...</option>";
        foreach ($districts as $kecamatan) {
            $option .= "<option value='$kecamatan->id'>$kecamatan->name</option>";
        }
        echo $option;
    }

    public function getdesa(request $request)
    {
        $id_kecamatan = $request->id_kecamatan;
        $villages = Village::where('district_id', $id_kecamatan)->get();
        $option = "<option>Pilih Kelurahan/Desa...</option>";
        foreach ($villages as $desa) {
            $option.= "<option value='$desa->id'>$desa->name</option>";
        }
        echo $option;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'rt_id' => 'required',
            'rw_id' => 'required',
            'KK' => 'required',
            'Laki_laki' => 'required',
            'Perempuan' => 'required',
        ]);
        Kependudukan::create([
            'rt_id' => $request->rt_id,
            'rw_id' => $request->rw_id,
            'KK' => $request->KK,
            'Laki_laki' => $request->Laki_laki,
            'Perempuan' => $request->Perempuan,
            
        ]);
        // Kependudukan::create($request->all());
        return redirect('/kependudukan')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kependudukan  $kependudukan
     * @return \Illuminate\Http\Response
     */
    public function show(Kependudukan $kependudukan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kependudukan  $kependudukan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kependudukan $kependudukan)
    {
        $rt = Rt::all();
        $rw = Rw::all();
        return view ('pemtrantibum.kependudukan.edit', compact('kependudukan', 'rt', 'rw'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kependudukan  $kependudukan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kependudukan $kependudukan)
    {
        //dd($request->all());
        $request->validate([
            'rt_id' => 'required',
            'rw_id' => 'required',
            'KK' => 'required',
            'Laki_laki' => 'required',
            'Perempuan' => 'required',
        ]);

        Kependudukan::where('id', $kependudukan->id)
        ->update([
            'rt_id' => $request->rt_id,
            'rw_id' => $request->rw_id,
            'KK' => $request->KK,
            'Laki_laki' => $request->Laki_laki,
            'Perempuan' => $request->Perempuan,
        ]);
        return redirect('/kependudukan')->with('success', 'Data Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kependudukan  $kependudukan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Kependudukan $kependudukan)
    {
        $kependudukan = Kependudukan::find($id);
        $kependudukan->delete();
        return redirect('/kependudukan');
    }
}
