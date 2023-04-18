<?php

namespace App\Http\Controllers;

use App\Models\Detekaes;
use App\Models\Ktp;
use App\Models\Rw;
use App\Models\Rt;
use App\Models\District;
use App\Models\Village;
use App\Models\kelbekasi;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class DetekaesController extends Controller
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
        $ktp = Ktp::all();
         $rw = Rw::all();
         $rt = Rt::all();
         $kelbekasi = kelbekasi::all();
         // Get semua data
         $districts = District::all();
         $villages = Village::all();
         $detekaes = Detekaes::all();

         return view('kessos.detekaes.index', 
         compact(
             'ktp',
             'rt',
             'rw',
             'districts',
             'villages',
             'kelbekasi',
             'detekaes',
         ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ktp = Ktp::all();
        $rt = Rt::all();
        $rw = Rw::all();
        // Get semua data
        $districts = District::all();
        $villages = Village::all();
        $kelbekasi = kelbekasi::all();

        return view('kessos.detekaes.index', compact(
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
        //  dd($request->all());
        $request->validate(
            [
                'ktp_id' => 'required|unique:detekaes,ktp_id',  
            ],
            [
                'ktp_id.required' => 'Harus di Isi Yaa',
                'ktp_id.unique' => 'NIK Sudah Digunakan',
            ]
        );
        Detekaes::create([
            'ktp_id' => $request->ktp_id,
            'stts_pkh' => $request->stts_pkh,
            'stts_bpnt' => $request->stts_bpnt,
            'stts_pbi' => $request->stts_pbi,
            'stts_non_bansos' => $request->stts_non_bansos,
            'keterangan' => $request->keterangan,
            'rt_id' => $request->rt_id,
            'rw_id' => Auth::user()->rw_id,
            'district_id' => Auth::user()->district_id,
            'village_id' => Auth::user()->village_id,
        ]);
        // Detekaes::create($request->all());
        return redirect('/detekaes')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Detekaes  $detekaes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ktp = Ktp::all();
        $rt = Rt::all();
        $rw = Rw::all();
        // Get semua data
        $districts = District::all();
        $villages = Village::all();
        $kelbekasi = kelbekasi::all();
        $detekaes = Detekaes::find($id);

        // dd ($detekaes);
        return view('kessos.detekaes.view', compact(
            'ktp',
            'rt',
            'rw',
            'districts',
            'villages',
            'kelbekasi',
            'detekaes',
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Detekaes  $detekaes
     * @return \Illuminate\Http\Response
     */
    public function edit(Detekaes $detekaes)
    {
        // dd($detekaes->ktp);

        $ktp = Ktp::all();
        $rt = Rt::all();
        $rw = Rw::all();
        // Get semua data
        $districts = District::all();
        $villages = Village::all();
        $kelbekasi = kelbekasi::all();
        // $cobain = Detekaes::find($detekaes->id);

        return view('kessos.detekaes.edit', compact(
            'ktp',
            'rt',
            'rw',
            'districts',
            'villages',
            'kelbekasi',
            'detekaes',
            // 'cobain'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Detekaes  $detekaes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detekaes $detekaes)
    {
     //  dd($request->all());   
     $request->validate([
        // 'ktp_id' => 'required',    
    ]);

    Detekaes::where('id', $detekaes->id)
        ->update([
            'ktp_id' => $request->ktp_id,
            'stts_pkh' => $request->stts_pkh,
            'stts_bpnt' => $request->stts_bpnt,
            'stts_pbi' => $request->stts_pbi,
            'stts_non_bansos' => $request->stts_non_bansos,
            'keterangan' => $request->keterangan,
        ]);

    return redirect('/detekaes')->with('success', 'Data Berhasil diUpdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Detekaes  $detekaes
     * @return \Illuminate\Http\Response
     */
    public function destroydetekaes($id, Detekaes $detekaes)
    {
        $detekaes = Detekaes::find($id);
        $detekaes->delete();
        return redirect('/detekaes');
    }

    public function getdatadetekaes(Request $request)
    {
        if (auth()->user()->role == 'superadmin') {
            if ($request->input('detekaeskel') != null) {
                $detekaes = Detekaes::where('village_id', $request->detekaeskel)->orderBy('rw_id', 'asc');
            } else {
                $detekaes = Detekaes::select('detekaes.*')->orderBy('rw_id', 'asc');
            }
            if ($request->input('rwdetekaes') != null) {
                $detekaes = Detekaes::where('village_id', $request->detekaeskel)
                ->where('rw_id', $request->rwdetekaes);
            }
            if ($request->input('rtdetekaes') != null) {
                $detekaes = Detekaes::where('village_id', $request->detekaeskel)
                ->where('rw_id', $request->rwdetekaes)
                ->where('saranakeseahtan_id', $request->rtdetekaes);
            }
        }
        
        if (auth()->user()->role == 'user') {
            if ($request->input('rtdetekaes') != null) {
                $detekaes = Detekaes::where('rt_id', $request->rtdetekaes)
                ->where('village_id', '=', auth()->user()->village_id)
                ->where('rw_id', '=', auth()->user()->rw_id);
            }else {
                $detekaes = Detekaes::where('rw_id', '=', auth()->user()->rw_id)
                ->where('village_id', '=', auth()->user()->village_id);
            }
        }

        if (auth()->user()->role == 'kessos' || auth()->user()->role == 'struktural' ) {
            if ($request->input('rwdetekaes') != null) {
                $detekaes = Detekaes::where('rw_id', $request->rwdetekaes)
                ->where('village_id', '=', auth()->user()->village_id);
            }else {
                $detekaes = Detekaes::select('detekaes.*')
                ->where('village_id', '=', auth()->user()->village_id)
                ->orderby('rt_id', 'asc');
            }
        }

        return DataTables::eloquent($detekaes)
            ->addIndexColumn()
            ->addColumn('nama_ktp', function ($detekaes) {
                return $detekaes->ktp->nama;
            })
            ->addColumn('rt', function ($detekaes) {
                return $detekaes->rt->rt;
            })
            ->addColumn('rw', function ($detekaes) {
                return $detekaes->rw->rw;
            })
            ->addColumn('district', function ($detekaes) {
                return $detekaes->district->name;
            })
            ->addColumn('village', function ($detekaes) {
                return $detekaes->village->name;
            })

            ->addColumn('edit', function ($detekaes) {
                if (auth()->user()->role == "superadmin" || auth()->user()->role == "kessos" ||
                auth()->user()->role == "user") {
                    return '<a href="detekaes/' . $detekaes->id . '/edit" class="btn btn-warning" title="Edit">
                <i class="fas fa-edit"></i></a>';
                }
            })

            ->addColumn('view', function ($detekaes) {
                return '<a href="#" class="btn btn-primary viewdetekaes" data-id="' . $detekaes->id . '">
                <i class="fas fa-eye"></i></a>';
            })

            ->addColumn('hapus', function ($detekaes) {
                if (auth()->user()->role == "superadmin" || auth()->user()->role == "kessos" ||
                auth()->user()->role == "user" ) {
                    return '<a href="#" class="btn btn-danger deletedetekaes"
                data-id="' . $detekaes->id . '"
                data-nama="' . $detekaes->ktp->nama . '">
                <i class="fas fa-trash"></i></a>';
                }
            })

            ->rawColumns([
            'rt', 
            'rw', 
            'nama_ktp', 
            'village', 
            'district', 
            'edit', 
            'view', 
            'hapus'
            ])
            ->toJson();
    }
}
