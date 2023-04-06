<?php

namespace App\Http\Controllers;

use App\Models\Ksbrw;
use Illuminate\Http\Request;
use App\Models\Rw;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Jabatan;
use App\Models\Village;
use App\Models\Ktp;
use App\Models\kelbekasi;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class KsbrwController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getkabupaten(request $request)
    {
        $id_provinsi = $request->id_provinsi;
        $regencies = Regency::where('province_id', $id_provinsi)->get();

        $option = "<option >Pilih Kota/Kabupaten...</option>";

        foreach ($regencies as $kabupaten) {
            $option .= "<option value='$kabupaten->id'>$kabupaten->name</option>";
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
            $option .= "<option value='$desa->id'>$desa->name</option>";
        }
        echo $option;
    }

    public function index()
    {
        $rw = Rw::all();
        $ktp = Ktp::all();
        $jabatan = Jabatan::all();
        $kelbekasi = kelbekasi::all();
        // Get semua data
        $districts = District::all();
        $villages = Village::all();
        $ksbrw = Ksbrw::all();

        return view('pemtrantibum.ksbrw.index', compact(
            'rw',
            'ktp',
            'jabatan',
            'kelbekasi',
            'districts',
            'villages',
            'ksbrw',
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rw = Rw::all();
        $ktp = Ktp::all();
        $jabatan = Jabatan::all();
        $kelbekasi = kelbekasi::all();
        // Get semua data
        $districts = District::all();
        $villages = Village::all();

        return view('pemtrantibum.ksbrw.index', compact(
            'rw',
            'ktp',
            'jabatan',
            'kelbekasi',
            'districts',
            'villages',
            'kelbekasi',
        ));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate(
            [
                'ktp_id' => 'required|unique:ksbrw,ktp_id',
                'jabatan_id' => 'required',
                // 'rw_id' => 'required',
                'no_sk' => 'required',
                'tmt_mulai' => 'required',
                'tmt_akhir' => 'required',
                'no_hp' => 'required',
                // 'no_rek' => 'required',    
                // 'npwp' => 'required',        
            ],
            [
                'ktp_id.required' => 'Harus di Isi Yaa',
                'ktp_id.unique' => 'NIK Sudah Digunakan',
                'jabatan_id.required' => 'Harus di Isi Yaa',
                // 'rw_id.required' => 'Harus di Isi Yaa',
                'no_sk.required' => 'Harus di Isi Yaa',
                'tmt_mulai.required' => 'Harus di Isi Yaa',
                'tmt_akhir.required' => 'Harus di Isi Yaa',
                'no_hp.required' => 'Harus di Isi Yaa',
            ]
        );
        Ksbrw::create([
            'ktp_id' => $request->ktp_id,
            'jabatan_id' => $request->jabatan_id,
            'rw_id' => Auth::user()->rw_id,
            'no_sk' => $request->no_sk,
            'tmt_mulai' => $request->tmt_mulai,
            'tmt_akhir' => $request->tmt_akhir,
            'no_hp' => $request->no_hp,
            'no_rek' => $request->no_rek,
            'npwp' => $request->npwp,
            'district_id' => Auth::user()->district_id,
            'village_id' => Auth::user()->village_id,
        ]);
        // Ksbrw::create($request->all());
        return redirect('/ksbrw')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ksbrw  $ksbrw
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rw = Rw::all();
        $ktp = Ktp::all();
        $jabatan = Jabatan::all();
        $kelbekasi = kelbekasi::all();
        // Get semua data
        $districts = District::all();
        $villages = Village::all();
        $ksbrw = Ksbrw::find($id);

        return view('pemtrantibum.ksbrw.view', compact(
            'rw',
            'ktp',
            'jabatan',
            'kelbekasi',
            'districts',
            'villages',
            'ksbrw',
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ksbrw  $ksbrw
     * @return \Illuminate\Http\Response
     */
    public function edit(Ksbrw $ksbrw)
    {
        $ktp = Ktp::all();
        $rw = Rw::all();
        $jabatan = Jabatan::all();
        $kelbekasi = kelbekasi::all();
        // Get semua data
        $districts = District::all();
        $villages = Village::all();

        return view('pemtrantibum.ksbrw.edit', compact(
            'ksbrw',
            'ktp',
            'jabatan',
            'rw',
            'kelbekasi',
            'districts',
            'villages',
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ksbrw  $ksbrw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ksbrw $ksbrw)
    {
        // dd($request->all());
        $request->validate([
            // 'ktp_id' => 'required',
            'jabatan_id' => 'required',
            // 'rw_id' => 'required',
            'no_sk' => 'required',
            'tmt_mulai' => 'required',
            'no_hp' => 'required',
            // 'no_rek' => 'required',    
            // 'npwp' => 'required',        
        ]);

        Ksbrw::where('id', $ksbrw->id)
            ->update([
                'ktp_id' => $request->ktp_id,
                'jabatan_id' => $request->jabatan_id,
                // 'rw_id' => $request->rw_id,
                'no_sk' => $request->no_sk,
                'tmt_mulai' => $request->tmt_mulai,
                'tmt_akhir' => $request->tmt_akhir,
                'no_hp' => $request->no_hp,
                'no_rek' => $request->no_rek,
                'npwp' => $request->npwp,
                // 'province_id' => $request->province_id,
                // 'regency_id' => $request->regency_id,
                // 'district_id' => $request->district_id,
                // 'village_id' => $request->village_id,
            ]);

        return redirect('/ksbrw')->with('success', 'Data Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ksbrw  $ksbrw
     * @return \Illuminate\Http\Response
     */
    public function destroyksbrw($id, Ksbrw $ksbrw)
    {
        $ksbrw = Ksbrw::find($id);
        $ksbrw->delete();
        return redirect('/ksbrw');
    }

    public function getdataksbrw(Request $request)
    {
        if (auth()->user()->role == 'superadmin') {
            if ($request->input('ksbrwkel') != null) {
                $ksbrw = Ksbrw::where('village_id', $request->ksbrwkel)
                ->orderBy('jabatan_id', 'asc')
                ->orderBy('rw_id', 'asc');
            } else {
                $ksbrw = Ksbrw::select('ksbrw.*')->orderBy('jabatan_id', 'asc')->orderBy('rw_id', 'asc');
            }

            if ($request->input('rwksbrw') != null) {
                $ksbrw = Ksbrw::where('rw_id', $request->rwksbrw)
                ->where('village_id', $request->ksbrwkel)
                ->orderBy('jabatan_id', 'asc')
                ->orderBy('rw_id', 'asc');
            }
        }

        if (auth()->user()->role == 'pemtrantibum' || auth()->user()->role == 'struktural') {
            if ($request->input('rwksbrw') != null) {
                $ksbrw = Ksbrw::where('rw_id', $request->rwksbrw)
                ->where('village_id', '=', auth()->user()->village_id)
                ->orderBy('jabatan_id', 'asc')
                ->orderBy('rw_id', 'asc');
            } else {
                $ksbrw = Ksbrw::select('ksbrw.*')
                ->where('village_id', '=', auth()->user()->village_id)
                ->orderBy('jabatan_id', 'asc')->orderBy('rw_id', 'asc');
            }
        }

        if (auth()->user()->role == 'user') {
                $ksbrw = Ksbrw::select('ksbrw.*')
                ->where('village_id', '=', auth()->user()->village_id)
                ->where('rw_id', '=', auth()->user()->rw_id)
                ->orderBy('jabatan_id', 'asc');
        }

        return DataTables::eloquent($ksbrw)
            ->addIndexColumn()
            ->addColumn('ksbrw', function ($ksbrw) {
                return $ksbrw->ktp->nama;
            })
            ->addColumn('rw', function ($ksbrw) {
                return $ksbrw->rw->rw;
            })
            ->addColumn('jabatan', function ($ksbrw) {
                return $ksbrw->jabatan->jabatan;
            })
            ->addColumn('village', function ($ksbrw) {
                return $ksbrw->village->name;
            })

            ->addColumn('edit', function ($ksbrw) {
                if (auth()->user()->role == "superadmin" || auth()->user()->role == "pemtrantibum" ||
                auth()->user()->role == "user") {
                    return '<a href="ksbrw/' . $ksbrw->id . '/edit" class="btn btn-warning" title="Edit">
                <i class="fas fa-edit"></i></a>';
                }
            })

            ->addColumn('view', function ($ksbrw) {
                return '<a href="#" class="btn btn-primary viewksbrw" data-id="' . $ksbrw->id . '">
                <i class="fas fa-eye"></i></a>';
            })

            ->addColumn('hapus', function ($ksbrw) {
                if (auth()->user()->role == "superadmin") {
                    return '<a href="#" class="btn btn-danger deleteksbrw"
                data-id="' . $ksbrw->id . '"
                data-nama="' . $ksbrw->ktp->nama . '">
                <i class="fas fa-trash"></i></a>';
                }
            })

            ->rawColumns([
                'rw', 'ksbrw', 'jabatan', 'village', 'edit', 'view', 'hapus'
            ])
            ->toJson();
    }
}
