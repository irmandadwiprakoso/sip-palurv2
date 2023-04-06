<?php

namespace App\Http\Controllers;

use App\Models\Ksbrt;
use Illuminate\Http\Request;
use App\Models\Rt;
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
class KsbrtController extends Controller
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
        $rt = Rt::all();
        $rw = Rw::all();
        $ktp = Ktp::all();
        $jabatan = Jabatan::all();
        $kelbekasi = kelbekasi::all();
        // Get semua data
        $districts = District::all();
        $villages = Village::all();
        $ksbrt = Ksbrt::all();

        return view('pemtrantibum.ksbrt.index', compact(
            'rt',
            'rw',
            'ktp',
            'jabatan',
            'kelbekasi',
            'districts',
            'villages',
            'ksbrt',
        ));
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
        $ktp = Ktp::all();
        $jabatan = Jabatan::all();
        $kelbekasi = kelbekasi::all();
        // Get semua data
        $districts = District::all();
        $villages = Village::all();

        return view('pemtrantibum.ksbrt.index', compact(
            'rt',
            'rw',
            'ktp',
            'jabatan',
            'kelbekasi',
            'districts',
            'villages',
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
                'ktp_id' => 'required|unique:ksbrt,ktp_id',
                'jabatan_id' => 'required',
                'rt_id' => 'required',
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
                'rt_id.required' => 'Harus di Isi Yaa',
                // 'rw_id.required' => 'Harus di Isi Yaa',
                'no_sk.required' => 'Harus di Isi Yaa',
                'tmt_mulai.required' => 'Harus di Isi Yaa',
                'tmt_akhir.required' => 'Harus di Isi Yaa',
                'no_hp.required' => 'Harus di Isi Yaa',
            ]
        );
        Ksbrt::create([
            'ktp_id' => $request->ktp_id,
            'jabatan_id' => $request->jabatan_id,
            'rt_id' => $request->rt_id,
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
        // Ksbrt::create($request->all());
        return redirect('/ksbrt')->with('success', 'Data RT Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ksbrt  $ksbrt
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rt = Rt::all();
        $rw = Rw::all();
        $ktp = Ktp::all();
        $jabatan = Jabatan::all();
        $kelbekasi = kelbekasi::all();
        // Get semua data
        $districts = District::all();
        $villages = Village::all();
        $ksbrt = Ksbrt::find($id);

        return view('pemtrantibum.ksbrt.view', compact(
            'rt',
            'rw',
            'ktp',
            'jabatan',
            'kelbekasi',
            'districts',
            'villages',
            'ksbrt',
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ksbrt  $ksbrt
     * @return \Illuminate\Http\Response
     */
    public function edit(Ksbrt $ksbrt)
    {
        $ktp = Ktp::all();
        $rt = Rt::all();
        $rw = Rw::all();
        $jabatan = Jabatan::all();
        $kelbekasi = kelbekasi::all();
        // Get semua data
        $districts = District::all();
        $villages = Village::all();

        return view('pemtrantibum.ksbrt.edit', compact(
            'rt',
            'rw',
            'ktp',
            'jabatan',
            'kelbekasi',
            'districts',
            'villages',
            'ksbrt',
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ksbrt  $ksbrt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ksbrt $ksbrt)
    {
        $request->validate([
            // 'ktp_id' => 'required',
            'jabatan_id' => 'required',
            'rt_id' => 'required',
            // 'rw_id' => 'required',
            'no_sk' => 'required',
            'tmt_mulai' => 'required',
            'no_hp' => 'required',
            // 'no_rek' => 'required',    
            // 'npwp' => 'required',        
        ]);

        Ksbrt::where('id', $ksbrt->id)
            ->update([
                'ktp_id' => $request->ktp_id,
                'jabatan_id' => $request->jabatan_id,
                'rt_id' => $request->rt_id,
                // 'rw_id' => $request->rw_id,
                'no_sk' => $request->no_sk,
                'tmt_mulai' => $request->tmt_mulai,
                'tmt_akhir' => $request->tmt_akhir,
                'no_hp' => $request->no_hp,
                'no_rek' => $request->no_rek,
                'npwp' => $request->npwp,
                // 'village_id' => $request->village_id,
            ]);

        return redirect('/ksbrt')->with('success', 'Data Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ksbrt  $ksbrt
     * @return \Illuminate\Http\Response
     */
    public function destroyksbrt($id, Ksbrt $ksbrt)
    {
        $ksbrt = Ksbrt::find($id);
        $ksbrt->delete();
        return redirect('/ksbrt');
    }

    public function getdataksbrt(Request $request)
    {
        if (auth()->user()->role == 'superadmin') {
            if ($request->input('ksbrtkel') != null) {
                $ksbrt = Ksbrt::where('village_id', $request->ksbrtkel)
                ->orderBy('jabatan_id', 'asc')
                ->orderBy('rw_id', 'asc')
                ->orderBy('rt_id', 'asc');
            } else {
                $ksbrt = Ksbrt::select('ksbrt.*')->orderBy('jabatan_id', 'asc')->orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc');
            }

            if ($request->input('rwksbrt') != null) {
                $ksbrt = Ksbrt::where('rw_id', $request->rwksbrt)
                ->where('village_id', $request->ksbrtkel)
                ->orderBy('jabatan_id', 'asc')
                ->orderBy('rw_id', 'asc')
                ->orderBy('rt_id', 'asc');
            }

            if ($request->input('rtksbrt') != null) {
                $ksbrt = Ksbrt::where('rt_id', $request->rtksbrt)
                ->where('rw_id', $request->rwksbrt)
                ->where('village_id', $request->ksbrtkel)
                ->orderBy('jabatan_id', 'asc')
                ->orderBy('rw_id', 'asc')
                ->orderBy('rt_id', 'asc');
            }
        }

        if (auth()->user()->role == 'pemtrantibum' || auth()->user()->role == 'struktural') {
            if ($request->input('rwksbrt') != null) {
                $ksbrt = Ksbrt::where('rw_id', $request->rwksbrt)
                ->where('village_id', '=', auth()->user()->village_id)
                ->orderBy('jabatan_id', 'asc')
                ->orderBy('rw_id', 'asc')
                ->orderBy('rt_id', 'asc');
            } else {
                $ksbrt = Ksbrt::select('ksbrt.*')
                ->where('village_id', '=', auth()->user()->village_id)
                ->orderBy('jabatan_id', 'asc')->orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc');
            }

            if ($request->input('rtksbrt') != null) {
                $ksbrt = Ksbrt::where('rt_id', $request->rtksbrt)
                ->where('rw_id', $request->rwksbrt)
                ->where('village_id', '=', auth()->user()->village_id)
                ->orderBy('jabatan_id', 'asc')
                ->orderBy('rw_id', 'asc')
                ->orderBy('rt_id', 'asc');
            }
        }

        if (auth()->user()->role == 'user') {
            if ($request->input('rtksbrt') != null) {
                $ksbrt = Ksbrt::where('rt_id', $request->rtksbrt)
                ->where('rw_id', '=', auth()->user()->rw_id)
                ->where('village_id', '=', auth()->user()->village_id)
                ->orderBy('jabatan_id', 'asc')
                ->orderBy('rw_id', 'asc')
                ->orderBy('rt_id', 'asc');
            }else {
                $ksbrt = Ksbrt::select('ksbrt.*')
                ->where('village_id', '=', auth()->user()->village_id)
                ->where('rw_id', '=', auth()->user()->rw_id)
                ->orderBy('jabatan_id', 'asc')->orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc');
            }
        }

        return DataTables::eloquent($ksbrt)
            ->addIndexColumn()
            ->addColumn('ksbrt', function ($ksbrt) {
                return $ksbrt->ktp->nama;
            })
            ->addColumn('rw', function ($ksbrt) {
                return $ksbrt->rw->rw;
            })
            ->addColumn('rt', function ($ksbrt) {
                return $ksbrt->rt->rt;
            })
            ->addColumn('jabatan', function ($ksbrt) {
                return $ksbrt->jabatan->jabatan;
            })
            ->addColumn('village', function ($ksbrt) {
                return $ksbrt->village->name;
            })

            ->addColumn('edit', function ($ksbrt) {
                if (auth()->user()->role == "superadmin" || auth()->user()->role == "pemtrantibum" ||
                auth()->user()->role == "user") {
                    return '<a href="ksbrt/' . $ksbrt->id . '/edit" class="btn btn-warning" title="Edit">
                <i class="fas fa-edit"></i></a>';
                }
            })

            ->addColumn('view', function ($ksbrt) {
                return '<a href="#" class="btn btn-primary viewksbrt" data-id="' . $ksbrt->id . '">
                <i class="fas fa-eye"></i></a>';
            })

            ->addColumn('hapus', function ($ksbrt) {
                if (auth()->user()->role == "superadmin" || auth()->user()->role == "pemtrantibum" ||
                auth()->user()->role == "user" ) {
                    return '<a href="#" class="btn btn-danger deleteksbrt"
                data-id="' . $ksbrt->id . '"
                data-nama="' . $ksbrt->ktp->nama . '">
                <i class="fas fa-trash"></i></a>';
                }
            })

            ->rawColumns([
                'rt', 'rw', 'ksbrt', 'jabatan', 'village', 'edit', 'view', 'hapus'
            ])
            ->toJson();
    }
}
