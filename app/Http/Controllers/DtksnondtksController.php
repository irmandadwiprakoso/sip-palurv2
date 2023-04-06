<?php

namespace App\Http\Controllers;

use App\Models\Dtksnondtks;
use Illuminate\Http\Request;
use App\Models\Ktp;
use App\Models\Rt;
use App\Models\Rw;
use App\Models\District;
use App\Models\Village;
use App\Models\kelbekasi;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class DtksnondtksController extends Controller
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

    public function index()
    {
        $rt = Rt::all();
        $rw = Rw::all();
        $ktp = Ktp::all();
        // Get semua data
        $districts = District::all();
        $villages = Village::all();
        $kelbekasi = kelbekasi::all();
        $dtksnondtks = Dtksnondtks::all();

        return view('kessos.dtksnondtks.index', compact(
            'rw',
            'rt',
            'ktp',
            'districts',
            'villages',
            'kelbekasi',
            'dtksnondtks',
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
        $rt = Rt::all();
        $ktp = Ktp::all();
        // Get semua data
        $districts = District::all();
        $villages = Village::all();

        return view('kessos.dtksnondtks.index', compact(
            'rw',
            'rt',
            'ktp',
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
        //dd($request->all());
        $request->validate(
            [
                'ktp_id' => 'required|unique:dtksnondtks,ktp_id',
                'rt_id' => 'required',     
            ],
            [
                'ktp_id.required' => 'Harus di Isi Yaa',
                'ktp_id.unique' => 'NIK Sudah Digunakan',
                'rt_id.required' => 'Harus di Isi Yaa',
            ]
        );
        Dtksnondtks::create([
            'ktp_id' => $request->ktp_id,
            'pkh' => $request->pkh,
            'pbi' => $request->pbi,
            'non_bansos' => $request->non_bansos,
            'bpnt' => $request->bpnt,
            'keterangan' => $request->keterangan,
            'rt_id' => $request->rt_id,
            'rw_id' => Auth::user()->rw_id,
            'district_id' => Auth::user()->district_id,
            'village_id' => Auth::user()->village_id,
        ]);
        // Dtksnondtks::create($request->all());
        return redirect('/dtksnondtks')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dtksnondtks  $dtksnondtks
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rt = Rt::all();
        $rw = Rw::all();
        $ktp = Ktp::all();
        // Get semua data
        $districts = District::all();
        $villages = Village::all();
        $kelbekasi = kelbekasi::all();
        $dtksnondtks = Dtksnondtks::find($id);

        return view('kessos.dtksnondtks.view', compact(
            'rw',
            'rt',
            'ktp',
            'districts',
            'villages',
            'kelbekasi',
            'dtksnondtks',
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dtksnondtks  $dtksnondtks
     * @return \Illuminate\Http\Response
     */
    public function edit(Dtksnondtks $dtksnondtks)
    {
        $ktp = Ktp::all();
        $rt = Rt::all();
        $rw = Rw::all();
        // Get semua data
        $districts = District::all();
        $villages = Village::all();
        $kelbekasi = kelbekasi::all();

        return view('kessos.dtksnondtks.edit', compact(
            'rw',
            'rt',
            'ktp',
            'districts',
            'villages',
            'kelbekasi',
            'dtksnondtks',
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dtksnondtks  $dtksnondtks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dtksnondtks $dtksnondtks)
    {
        //dd($request->all());
        $request->validate(
            [
                'ktp_id' => 'required|unique:dtksnondtks,ktp_id',
                'rt_id' => 'required',     
            ],
            [
                'ktp_id.required' => 'Harus di Isi Yaa',
                'ktp_id.unique' => 'NIK Sudah Digunakan',
                'rt_id.required' => 'Harus di Isi Yaa',
            ]
        );
        Dtksnondtks::where('id', $dtksnondtks->id)
            ->update([
            'ktp_id' => $request->ktp_id,
            'pkh' => $request->pkh,
            'pbi' => $request->pbi,
            'non_bansos' => $request->non_bansos,
            'bpnt' => $request->bpnt,
            'keterangan' => $request->keterangan,
            'rt_id' => $request->rt_id,
            // 'rw_id' => Auth::user()->rw_id,
            // 'district_id' => Auth::user()->district_id,
            // 'village_id' => Auth::user()->village_id,
        ]);
        // Dtksnondtks::create($request->all());
        return redirect('/dtksnondtks')->with('success', 'Data Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dtksnondtks  $dtksnondtks
     * @return \Illuminate\Http\Response
     */
    public function destroydtksnondtks(Dtksnondtks $dtksnondtks)
    {
        $dtksnondtks = Dtksnondtks::find($id);
        $dtksnondtks->delete();
        return redirect('/dtksnondtks');
    }

    public function getdatadtksnondtks(Request $request)
    {
        if (auth()->user()->role == 'superadmin') {
            if ($request->input('dtksnondtkskel') != null) {
                $dtksnondtks = Dtksnondtks::where('village_id', $request->dtksnondtkskel)->orderBy('rw_id', 'asc');
            } else {
                $dtksnondtks = Dtksnondtks::select('dtksnondtks.*')->orderBy('rw_id', 'asc');
            }
            if ($request->input('rwdtksnondtks') != null) {
                $dtksnondtks = Dtksnondtks::where('village_id', $request->dtksnondtkskel)
                ->where('rw_id', $request->rwdtksnondtks);
            }
            if ($request->input('rtdtksnondtks') != null) {
                $dtksnondtks = Dtksnondtks::where('village_id', $request->dtksnondtkskel)
                ->where('rw_id', $request->rwdtksnondtks)
                ->where('rt_id', $request->rtdtksnondtks);
            }
        }
        
        if (auth()->user()->role == 'user') {
            if ($request->input('rtdtksnondtks') != null) {
                $dtksnondtks = Dtksnondtks::where('rt_id', $request->rtdtksnondtks)
                ->where('village_id', '=', auth()->user()->village_id)
                ->where('rw_id', '=', auth()->user()->rw_id);
            }else {
                $dtksnondtks = Dtksnondtks::where('rw_id', '=', auth()->user()->rw_id)
                ->where('village_id', '=', auth()->user()->village_id);
            }
        }

        if (auth()->user()->role == 'kessos' || auth()->user()->role == 'struktural' ) {
            if ($request->input('rwdtksnondtks') != null) {
                $dtksnondtks = Dtksnondtks::where('rw_id', $request->rwdtksnondtks)
                ->where('village_id', '=', auth()->user()->village_id);
            }else {
                $dtksnondtks = Dtksnondtks::select('dtksnondtks.*')
                ->where('village_id', '=', auth()->user()->village_id)
                ->orderby('rt_id', 'asc');
            }
            if ($request->input('rtdtksnondtks') != null) {
                $dtksnondtks = Dtksnondtks::where('rt_id', $request->rtdtksnondtks)
                ->where('rw_id', $request->rwdtksnondtks)
                ->where('village_id', '=', auth()->user()->village_id);
            }
        }

        return DataTables::eloquent($dtksnondtks)
            ->addIndexColumn()
            ->addColumn('ktp', function ($dtksnondtks) {
                return $dtksnondtks->ktp->nama;
            })
            ->addColumn('rt', function ($dtksnondtks) {
                return $dtksnondtks->rt->rt;
            })
            ->addColumn('rw', function ($dtksnondtks) {
                return $dtksnondtks->rw->rw;
            })
            ->addColumn('district', function ($dtksnondtks) {
                return $dtksnondtks->district->name;
            })
            ->addColumn('village', function ($dtksnondtks) {
                return $dtksnondtks->village->name;
            })

            ->addColumn('edit', function ($dtksnondtks) {
                if (auth()->user()->role == "superadmin" || auth()->user()->role == "kessos" ||
                auth()->user()->role == "user") {
                    return '<a href="dtksnondtks/' . $dtksnondtks->id . '/edit" class="btn btn-warning" title="Edit">
                <i class="fas fa-edit"></i></a>';
                }
            })

            ->addColumn('view', function ($dtksnondtks) {
                return '<a href="#" class="btn btn-primary viewdtksnondtks" data-id="' . $dtksnondtks->id . '">
                <i class="fas fa-eye"></i></a>';
            })

            ->addColumn('hapus', function ($dtksnondtks) {
                if (auth()->user()->role == "superadmin" || auth()->user()->role == "kessos" ||
                auth()->user()->role == "user" ) {
                    return '<a href="#" class="btn btn-danger deletedtksnondtks"
                data-id="' . $dtksnondtks->id . '"
                data-nama="' . $dtksnondtks->ktp->nama . '">
                <i class="fas fa-trash"></i></a>';
                }
            })

            ->rawColumns([
            'rw', 'ktp', 'village', 'district', 'rt', 'edit', 'view', 'hapus'
            ])
            ->toJson();
    }
}
