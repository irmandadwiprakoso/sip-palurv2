<?php

namespace App\Http\Controllers;

use App\Models\Posyandu;
use Illuminate\Http\Request;
use App\Models\Rt;
use App\Models\Rw;
use App\Models\Jabatan;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\Ktp;
use App\Models\kelbekasi;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class PosyanduController extends Controller
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
        $posyandu = Posyandu::all();

        return view('permasbang.posyandu.index', compact(
            'rw',
            'ktp',
            'kelbekasi',
            'jabatan',
            'districts',
            'villages',
            'posyandu',
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
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();
        $villages = Village::all();

        return view('permasbang.posyandu.index', compact(
            'jabatan',
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
                'ktp_id' => 'required|unique:posyandu,ktp_id',
                'nama_posyandu' => 'required',
                // 'rt_id' => 'required',
                // 'rw_id' => 'required',
                'no_SK' => 'required',
                'jabatan_id' => 'required',       
            ],
            [
                'ktp_id.required' => 'Harus di Isi Yaa',
                'ktp_id.unique' => 'NIK Sudah Digunakan',
                'nama_posyandu.required' => 'Harus di Isi Yaa',
                // 'rt_id.required' => 'Harus di Isi Yaa',
                // 'rw_id.required' => 'Harus di Isi Yaa',
                'no_SK.required' => 'Harus di Isi Yaa',
                'jabatan_id.required' => 'Harus di Isi Yaa',
            ]
        );
        Posyandu::create([
            'ktp_id' => $request->ktp_id,
            'nama_posyandu' => $request->nama_posyandu,
            // 'rt_id' => $request->rt_id,
            'rw_id' => Auth::user()->rw_id,
            'no_SK' => $request->no_SK,
            'jabatan_id' => $request->jabatan_id,
            'district_id' => Auth::user()->district_id,
            'village_id' => Auth::user()->village_id,
        ]);
        // Posyandu::create($request->all());
        return redirect('/posyandu')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posyandu  $posyandu
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
        $posyandu = Posyandu::find($id);

        return view('permasbang.posyandu.view', compact(
            'jabatan',
            'rw',
            'ktp',
            'kelbekasi',
            'districts',
            'villages',
            'posyandu',
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posyandu  $posyandu
     * @return \Illuminate\Http\Response
     */
    public function edit(Posyandu $posyandu)
    {
        $ktp = Ktp::all();
        $jabatan = Jabatan::all();
        $rw = Rw::all();
        $kelbekasi = kelbekasi::all();
        // Get semua data
        $districts = District::all();
        $villages = Village::all();

        return view('permasbang.posyandu.edit', compact(
            'jabatan',
            'rw',
            'ktp',
            'kelbekasi',
            'districts',
            'villages',
            'posyandu',
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posyandu  $posyandu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posyandu $posyandu)
    {
    //  dd($request->all());   
        $request->validate([
            // 'ktp_id' => 'required',
            'nama_posyandu' => 'required',
            // 'rt_id' => 'required',
            // 'rw_id' => 'required',
            'no_SK' => 'required',
            'jabatan_id' => 'required',      
        ]);

        Posyandu::where('id', $posyandu->id)
            ->update([
                'ktp_id' => $request->ktp_id,
                'nama_posyandu' => $request->nama_posyandu,
                // 'rt_id' => $request->rt_id,
                // 'rw_id' => $request->rw_id,
                'no_SK' => $request->no_SK,
                'jabatan_id' => $request->jabatan_id,
                // 'district_id' => $request->district_id,
                // 'village_id' => $request->village_id,
            ]);

        return redirect('/posyandu')->with('success', 'Data Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posyandu  $posyandu
     * @return \Illuminate\Http\Response
     */
    public function destroyposyandu($id, Posyandu $posyandu)
    {
        $posyandu = Posyandu::find($id);
        $posyandu->delete();
        return redirect('/posyandu');
    }

    public function getdataposyandu(Request $request)
    {
        if (auth()->user()->role == 'superadmin') {
            if ($request->input('posyandukel') != null) {
                $posyandu = Posyandu::where('village_id', $request->posyandukel)->orderBy('rw_id', 'asc');
            } else {
                $posyandu = Posyandu::select('posyandu.*')->orderBy('rw_id', 'asc');
            }
            if ($request->input('rwposyandu') != null) {
                $posyandu = Posyandu::where('village_id', $request->posyandukel)
                ->where('rw_id', $request->rwposyandu)
                ;
            }
            if ($request->input('rtposyandu') != null) {
                $posyandu = Posyandu::where('village_id', $request->posyandukel)
                ->where('rw_id', $request->rwposyandu)
                ->where('rt_id', $request->rtposyandu)
                ;
            }
        }
        
        if (auth()->user()->role == 'user') {
            if ($request->input('rtposyandu') != null) {
                $posyandu = Posyandu::where('rt_id', $request->rtposyandu)
                ->where('village_id', '=', auth()->user()->village_id)
                ->where('rw_id', '=', auth()->user()->rw_id)
                ;
            }else {
                $posyandu = Posyandu::where('rw_id', '=', auth()->user()->rw_id)
                ->where('village_id', '=', auth()->user()->village_id)
                ;
            }
        }

        if (auth()->user()->role == 'permasbang' || auth()->user()->role == 'struktural' ) {
            if ($request->input('rwposyandu') != null) {
                $posyandu = Posyandu::where('rw_id', $request->rwposyandu)
                ->where('village_id', '=', auth()->user()->village_id)
                ;
            }else {
                $posyandu = Posyandu::select('posyandu.*')
                ->where('village_id', '=', auth()->user()->village_id)
                ;
            }
            if ($request->input('rtposyandu') != null) {
                $posyandu = Posyandu::where('rt_id', $request->rtposyandu)
                ->where('rw_id', $request->rwposyandu)
                ->where('village_id', '=', auth()->user()->village_id)
                ;
            }
        }

        return DataTables::eloquent($posyandu)
            ->addIndexColumn()
            ->addColumn('ktp', function ($posyandu) {
                return $posyandu->ktp->nama;
            })
            ->addColumn('rw', function ($posyandu) {
                return $posyandu->rw->rw;
            })
            ->addColumn('jabatan', function ($posyandu) {
                return $posyandu->jabatan->jabatan;
            })
            ->addColumn('district', function ($posyandu) {
                return $posyandu->district->name;
            })
            ->addColumn('village', function ($posyandu) {
                return $posyandu->village->name;
            })

            ->addColumn('edit', function ($posyandu) {
                if (auth()->user()->role == "superadmin" || auth()->user()->role == "permasbang" || auth()->user()->role == "user" ) {
                    return '<a href="posyandu/' . $posyandu->id . '/edit" class="btn btn-warning" title="Edit">
                <i class="fas fa-edit"></i></a>';
                }
            })

            ->addColumn('view', function ($posyandu) {
                return '<a href="#" class="btn btn-primary viewposyandu" data-id="' . $posyandu->id . '">
                <i class="fas fa-eye"></i></a>';
            })

            ->addColumn('hapus', function ($posyandu) {
                if (auth()->user()->role == "superadmin" || auth()->user()->role == "permasbang" || auth()->user()->role == "user") {
                    return '<a href="#" class="btn btn-danger deleteposyandu"
                data-id="' . $posyandu->id . '"
                data-nama="' . $posyandu->ktp->nama . '">
                <i class="fas fa-trash"></i></a>';
                }
            })

            ->rawColumns([
                 'rw', 'ktp', 'village', 'district', 'edit', 'view', 'hapus'
            ])
            ->toJson();
    }
}
