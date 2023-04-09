<?php

namespace App\Http\Controllers;

use App\Models\Pkk;
use Illuminate\Http\Request;
use App\Models\Rt;
use App\Models\Rw;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\Jabatan;
use App\Models\Ktp;
use App\Models\kelbekasi;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class PkkController extends Controller
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
        $rw = Rw::all();
        $ktp = Ktp::all();
        $kelbekasi = kelbekasi::all();
        $jabatan = Jabatan::all();
        // Get semua data
        $districts = District::all();
        $villages = Village::all();
        $pkk = Pkk::all();

        return view('permasbang.pkk.index', compact(
            'rw',
            'ktp',
            'kelbekasi',
            'jabatan',
            'districts',
            'villages',
            'pkk',
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
        $kelbekasi = kelbekasi::all();
        $jabatan = Jabatan::all();
        // Get semua data
        $districts = District::all();
        $villages = Village::all();

        return view('permasbang.pkk.index', compact(
            'rw',
            'ktp',
            'kelbekasi',
            'jabatan',
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
                'ktp_id' => 'required|unique:pkk,ktp_id',
                // 'pokja' => 'required',
                // 'rt_id' => 'required',
                // 'rw_id' => 'required',
                'no_SK' => 'required',
                'jabatan_id' => 'required',       
            ],
            [
                'ktp_id.required' => 'Harus di Isi Yaa',
                'ktp_id.unique' => 'NIK Sudah Digunakan',
                // 'pokja.required' => 'Harus di Isi Yaa',
                // 'rt_id.required' => 'Harus di Isi Yaa',
                // 'rw_id.required' => 'Harus di Isi Yaa',
                'no_SK.required' => 'Harus di Isi Yaa',
                'jabatan_id.required' => 'Harus di Isi Yaa',
            ]
        );
        Pkk::create([
            'ktp_id' => $request->ktp_id,
            'pokja' => $request->pokja,
            // 'rt_id' => $request->rt_id,
            'rw_id' => Auth::user()->rw_id,
            'no_SK' => $request->no_SK,
            'jabatan_id' => $request->jabatan_id,
            'district_id' => Auth::user()->district_id,
            'village_id' => Auth::user()->village_id,
        ]);
        // Pkk::create($request->all());
        return redirect('/pkk')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pkk  $pkk
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rw = Rw::all();
        $ktp = Ktp::all();
        $kelbekasi = kelbekasi::all();
        $jabatan = Jabatan::all();
        // Get semua data
        $districts = District::all();
        $villages = Village::all();
        $pkk = Pkk::find($id);

        return view('permasbang.pkk.view', compact(
            'rw',
            'ktp',
            'kelbekasi',
            'jabatan',
            'districts',
            'villages',
            'pkk',
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pkk  $pkk
     * @return \Illuminate\Http\Response
     */
    public function edit(Pkk $pkk)
    {
        $ktp = Ktp::all();
        $rw = Rw::all();
        $kelbekasi = kelbekasi::all();
        $jabatan = Jabatan::all();
        // Get semua data
        $districts = District::all();
        $villages = Village::all();

        return view('permasbang.pkk.edit', compact(
            'rw',
            'ktp',
            'kelbekasi',
            'jabatan',
            'districts',
            'villages',
            'pkk',
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pkk  $pkk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pkk $pkk)
    {
    //  dd($request->all());   
        $request->validate([
            // 'ktp_id' => 'required',
            'pokja' => 'required',
            // 'rt_id' => 'required',
            // 'rw_id' => 'required',
            'no_SK' => 'required',
            'jabatan_id' => 'required',      
        ]);

        Pkk::where('id', $pkk->id)
            ->update([
                'ktp_id' => $request->ktp_id,
                'pokja' => $request->pokja,
                // 'rt_id' => $request->rt_id,
                // 'rw_id' => $request->rw_id,
                'no_SK' => $request->no_SK,
                'jabatan_id' => $request->jabatan_id,
                // 'district_id' => $request->district_id,
                // 'village_id' => $request->village_id,
            ]);

        return redirect('/pkk')->with('success', 'Data Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pkk  $pkk
     * @return \Illuminate\Http\Response
     */
    public function destroypkk($id, Pkk $pkk)
    {
        $pkk = Pkk::find($id);
        $pkk->delete();
        return redirect('/pkk');
    }

    public function getdatapkk(Request $request)
    {
        if (auth()->user()->role == 'superadmin') {
            if ($request->input('pkkkel') != null) {
                $pkk = Pkk::where('village_id', $request->pkkkel)->orderBy('rw_id', 'asc');
            } else {
                $pkk = Pkk::select('pkk.*')->orderBy('rw_id', 'asc');
            }
            if ($request->input('rwpkk') != null) {
                $pkk = Pkk::where('village_id', $request->pkkkel)
                ->where('rw_id', $request->rwpkk);
            }
            if ($request->input('rtpkk') != null) {
                $pkk = Pkk::where('village_id', $request->pkkkel)
                ->where('rw_id', $request->rwpkk)
                ->where('rt_id', $request->rtpkk);
            }
        }
        
        if (auth()->user()->role == 'user') {
            if ($request->input('rtpkk') != null) {
                $pkk = Pkk::where('rt_id', $request->rtpkk)
                ->where('village_id', '=', auth()->user()->village_id)
                ->where('rw_id', '=', auth()->user()->rw_id);
            }else {
                $pkk = Pkk::where('rw_id', '=', auth()->user()->rw_id)
                ->where('village_id', '=', auth()->user()->village_id);
            }
        }

        if (auth()->user()->role == 'permasbang' || auth()->user()->role == 'struktural' ) {
            if ($request->input('rwpkk') != null) {
                $pkk = Pkk::where('rw_id', $request->rwpkk)
                ->where('village_id', '=', auth()->user()->village_id);
            }else {
                $pkk = Pkk::select('pkk.*')
                ->where('village_id', '=', auth()->user()->village_id)
                ->orderby('rt_id', 'asc');
            }
            if ($request->input('rtpkk') != null) {
                $pkk = Pkk::where('rt_id', $request->rtpkk)
                ->where('rw_id', $request->rwpkk)
                ->where('village_id', '=', auth()->user()->village_id);
            }
        }

        return DataTables::eloquent($pkk)
            ->addIndexColumn()
            ->addColumn('ktp', function ($pkk) {
                return $pkk->ktp->nama;
            })
            ->addColumn('rw', function ($pkk) {
                return $pkk->rw->rw;
            })
            ->addColumn('jabatan', function ($pkk) {
                return $pkk->jabatan->jabatan;
            })
            ->addColumn('district', function ($pkk) {
                return $pkk->district->name;
            })
            ->addColumn('village', function ($pkk) {
                return $pkk->village->name;
            })

            ->addColumn('edit', function ($pkk) {
                if (auth()->user()->role == "superadmin" || auth()->user()->role == "permasbang" ||
                auth()->user()->role == "user") {
                    return '<a href="pkk/' . $pkk->id . '/edit" class="btn btn-warning" title="Edit">
                <i class="fas fa-edit"></i></a>';
                }
            })

            ->addColumn('view', function ($pkk) {
                return '<a href="#" class="btn btn-primary viewpkk" data-id="' . $pkk->id . '">
                <i class="fas fa-eye"></i></a>';
            })

            ->addColumn('hapus', function ($pkk) {
                if (auth()->user()->role == "superadmin" || auth()->user()->role == "permasbang" ||
                auth()->user()->role == "user" ) {
                    return '<a href="#" class="btn btn-danger deletepkk"
                data-id="' . $pkk->id . '"
                data-nama="' . $pkk->ktp->nama . '">
                <i class="fas fa-trash"></i></a>';
                }
            })

            ->rawColumns([
            'rw', 'ktp', 'village', 'district', 'jabatan', 'edit', 'view', 'hapus'
            ])
            ->toJson();
    }
}
