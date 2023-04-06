<?php

namespace App\Http\Controllers;

use App\Models\Dtks;
use Illuminate\Http\Request;
use App\Models\Ktp;
use App\Models\Rt;
use App\Models\Rw;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\kelbekasi;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class DtksController extends Controller
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
        $kelbekasi = kelbekasi::all();
        // Get semua data
        $districts = District::all();
        $villages = Village::all();
        $dtks = Dtks::all();

        return view('kessos.dtks.index', compact(
            'rt',
            'rw',
            'ktp',
            'kelbekasi',
            'districts',
            'villages',
            'dtks',
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
        $kelbekasi = kelbekasi::all();
        // Get semua data
        $districts = District::all();
        $villages = Village::all();

        return view('kessos.dtks.index', compact(
            'rt',
            'rw',
            'ktp',
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
        //dd($request->all());
        $request->validate(
            [
                'ktp_id' => 'required|unique:dtks,ktp_id',
                'rt_id' => 'required',
                'keterangan' => 'required',       
            ],
            [
                'ktp_id.required' => 'Harus di Isi Yaa',
                'ktp_id.unique' => 'NIK Sudah Digunakan',
                'rt_id.required' => 'Harus di Isi Yaa',
                'keterangan.required' => 'Harus di Isi Yaa',
            ]
        );
        Dtks::create([
            'ktp_id' => $request->ktp_id,
            'PKH' => $request->PKH,
            'BPNT' => $request->BPNT,
            'PBI' => $request->PBI,
            'NON_BANSOS' => $request->NON_BANSOS,
            'keterangan' => $request->keterangan,
            'rt_id' => $request->rt_id,
            'rw_id' => Auth::user()->rw_id,
            'district_id' => Auth::user()->district_id,
            'village_id' => Auth::user()->village_id,
        ]);
        // Dtks::create($request->all());
        return redirect('/dtks')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dtks  $dtks
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rt = Rt::all();
        $rw = Rw::all();
        $ktp = Ktp::all();
        $kelbekasi = kelbekasi::all();
        // Get semua data
        $districts = District::all();
        $villages = Village::all();
        $dtks = Dtks::find($id);

        return view('kessos.dtks.view', compact(
            'rt',
            'rw',
            'ktp',
            'kelbekasi',
            'districts',
            'villages',
            'dtks',
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dtks  $dtks
     * @return \Illuminate\Http\Response
     */
    public function edit(Dtks $dtks)
    {
        $ktp = Ktp::all();
        $rt = Rt::all();
        $rw = Rw::all();
        // Get semua data
        $districts = District::all();
        $villages = Village::all();
        
        return view('kessos.dtks.edit', compact(
            'ktp',
            'rt',
            'rw',
            'districts',
            'villages',
            'dtks'
            
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dtks  $dtks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dtks $dtks)
    {
    //  dd($request->all());   
        $request->validate([
            // 'ktp_id' => 'required',
            // 'PKH' => 'required',
            'rt_id' => 'required',
            'keterangan' => 'required',      
        ]);

        Dtks::where('id', $dtks->id)
            ->update([
                'ktp_id' => $request->ktp_id,
                'PKH' => $request->PKH,
                'BPNT' => $request->BPNT,
                'PBI' => $request->PBI,
                'NON_BANSOS' => $request->NON_BANSOS,
                'keterangan' => $request->keterangan,
                'rt_id' => $request->rt_id,
                // 'rw_id' => Auth::user()->rw_id,
                // 'province_id' => Auth::user()->province_id,
                // 'regency_id' => Auth::user()->regency_id,
                // 'district_id' => Auth::user()->district_id,
                // 'village_id' => Auth::user()->village_id,
            ]);

        return redirect('/dtks')->with('success', 'Data Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dtks  $dtks
     * @return \Illuminate\Http\Response
     */
    public function destroydtks($id, Dtks $dtks)
    {
        $dtks = Dtks::find($id);
        $dtks->delete();
        return redirect('/dtks');
    }

    public function getdatadtks(Request $request)
    {
        if (auth()->user()->role == 'superadmin') {
            if ($request->input('dtkskel') != null) {
                $dtks = Dtks::where('village_id', $request->dtkskel)->orderBy('rw_id', 'asc');
            } else {
                $dtks = Dtks::select('dtks.*')->orderBy('rw_id', 'asc');
            }
            if ($request->input('rwdtks') != null) {
                $dtks = Dtks::where('village_id', $request->dtkskel)
                ->where('rw_id', $request->rwdtks)
                ->orderBy('rt_id', 'asc');
            }
            if ($request->input('rtdtks') != null) {
                $dtks = Dtks::where('village_id', $request->dtkskel)
                ->where('rw_id', $request->rwdtks)
                ->where('rt_id', $request->rtdtks);
            }
        }
        
        if (auth()->user()->role == 'user') {
            if ($request->input('rtdtks') != null) {
                $dtks = Dtks::where('village_id', '=', auth()->user()->village_id)
                ->where('rw_id', '=', auth()->user()->rw_id)
                ->where('rt_id', $request->rtdtks);
            }else {
                $dtks = Dtks::where('rw_id', '=', auth()->user()->rw_id)
                ->where('village_id', '=', auth()->user()->village_id)
                ->orderby('rt_id', 'asc');
            }
        }

        if (auth()->user()->role == 'kessos' || auth()->user()->role == 'struktural' || auth()->user()->role == 'permasbang' ) {
            if ($request->input('rwdtks') != null) {
                $dtks = Dtks::where('rw_id', $request->rwdtks)
                ->where('village_id', '=', auth()->user()->village_id)
                ->orderBy('rt_id', 'asc');
            }else {
                $dtks = Dtks::select('dtks.*')
                ->where('village_id', '=', auth()->user()->village_id)
                ->orderby('rt_id', 'asc');
            }
            if ($request->input('rtdtks') != null) {
                $dtks = Dtks::where('rw_id', $request->rwdtks)
                ->where('rt_id', $request->rtdtks)
                ->where('village_id', '=', auth()->user()->village_id)
                ->orderBy('rt_id', 'asc');
            }
        }

        return DataTables::eloquent($dtks)
            ->addIndexColumn()
            ->addColumn('ktp', function ($dtks) {
                return $dtks->ktp->nama;
            })
            ->addColumn('rw', function ($dtks) {
                return $dtks->rw->rw;
            })
            ->addColumn('rt', function ($dtks) {
                return $dtks->rt->rt;
            })
            ->addColumn('district', function ($dtks) {
                return $dtks->district->name;
            })
            ->addColumn('village', function ($dtks) {
                return $dtks->village->name;
            })

            ->addColumn('edit', function ($dtks) {
                if (auth()->user()->role == "superadmin" || auth()->user()->role == "kessos" ||
                auth()->user()->role == "user" || auth()->user()->role == "permasbang") {
                    return '<a href="dtks/' . $dtks->id . '/edit" class="btn btn-warning" title="Edit">
                <i class="fas fa-edit"></i></a>';
                }
            })

            ->addColumn('view', function ($dtks) {
                return '<a href="#" class="btn btn-primary viewdtks" data-id="' . $dtks->id . '">
                <i class="fas fa-eye"></i></a>';
            })

            ->addColumn('hapus', function ($dtks) {
                if (auth()->user()->role == "superadmin" || auth()->user()->role == "kessos" ||
                auth()->user()->role == "user" || auth()->user()->role == "permasbang") {
                    return '<a href="#" class="btn btn-danger deletedtks"
                data-id="' . $dtks->id . '"
                data-nama="' . $dtks->ktp->nama . '">
                <i class="fas fa-trash"></i></a>';
                }
            })

            ->rawColumns([
                'rt', 'rw', 'ktp', 'village', 'district', 'edit', 'view', 'hapus'
            ])
            ->toJson();
    }
}
