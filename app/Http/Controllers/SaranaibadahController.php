<?php

namespace App\Http\Controllers;

use App\Models\Saranaibadah;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\Tipeibadah;
use App\Models\Statustanah;
use App\Models\kelbekasi;
use App\Models\Ktp;
use App\Models\Rt;
use App\Models\Rw;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class SaranaibadahController extends Controller
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
        $saranaibadah = Saranaibadah::all();
        // Get semua data 
        $districts = District::all();
        $villages = Village::all();
        $kelbekasi = kelbekasi::all();
        $tipeibadah = Tipeibadah::all();
        $statustanah = Statustanah::all();
        $ktp = Ktp::all();
        $rt = Rt::all();
        $rw = Rw::all();

        return view(
            'kessos.saranaibadah.index', 
            compact(
                'saranaibadah',
                'tipeibadah',
                'statustanah',
                'rt',
                'rw',
                'districts',
                'villages',
                'ktp',
                'kelbekasi'
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get semua data 
        $districts = District::all();
        $villages = Village::all();
        $kelbekasi = kelbekasi::all();
        $tipeibadah = Tipeibadah::all();
        $statustanah = Statustanah::all();
        $ktp = Ktp::all();
        $rt = Rt::all();
        $rw = Rw::all();

        return view(
            'kessos.saranaibadah.index', 
            compact(
                'tipeibadah',
                'statustanah',
                'rt',
                'rw',
                'districts',
                'villages',
                'ktp',
                'kelbekasi'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Saranaibadah $saranaIbadah)
    {
        // dd($request->all());
        $request->validate([
            'nama' => 'required',
            'tipeibadah_id' => 'required',
            'statustanah_id' => 'required',
            'ktp_id' => 'required',
            'alamat' => 'required',
            'rt_id' => 'required',
            // 'rw_id' => 'required',
            // 'province_id' => 'required',
            // 'regency_id' => 'required',
            // 'district_id' => 'required',
            // 'village_id' => 'required',
            'no_SK' => 'required',
            'no_HP' => 'required',
            'foto' => 'required|max:1024',
        ],
        [
            'nama.required' => 'Harus Di isi yaa',
            'tipeibadah_id.required' => 'Harus Di isi yaa',
            'statustanah_id.required' => 'Harus Di isi yaa',
            'ktp_id.required' => 'Harus Di isi yaa', 
            'alamat.required' => 'Harus Di isi yaa',
            'rt_id.required' => 'Harus Di isi yaa',
            // 'rw_id.required' => 'Harus Di isi yaa',
            // 'province_id.required' => 'Harus Di isi yaa',
            // 'regency_id.required' => 'Harus Di isi yaa',
            // 'district_id.required' => 'Harus Di isi yaa',
            // 'village_id.required' => 'Harus Di isi yaa',
            'no_SK.required' => 'Harus Di isi yaa',
            'no_HP.required' => 'Harus Di isi yaa',
        ]
    );
            $imgName = $request->foto->getClientOriginalName() . '-' . time() 
            . '.' . $request->foto->extension();
            $request->foto->move('images/Saranaibadah/',$imgName);

        Saranaibadah::create([
            'nama' => $request->nama,
            'tipeibadah_id' => $request->tipeibadah_id,
            'statustanah_id' => $request->statustanah_id,
            'ktp_id' => $request->ktp_id,
            'alamat' => $request->alamat,
            'rt_id' => $request->rt_id,
            'rw_id' => Auth::user()->rw_id,
            'district_id' => Auth::user()->district_id,
            'village_id' => Auth::user()->village_id,
            'no_SK' => $request->no_SK,
            'no_HP' => $request->no_HP,
            'foto' => $imgName,
        ]);

        return redirect('/saranaibadah')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Saranaibadah  $saranaibadah
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $saranaibadah = Saranaibadah::all();
        // Get semua data 
        $districts = District::all();
        $villages = Village::all();
        $kelbekasi = kelbekasi::all();
        $tipeibadah = Tipeibadah::all();
        $statustanah = Statustanah::all();
        $ktp = Ktp::all();
        $rt = Rt::all();
        $rw = Rw::all();

        $saranaibadah = Saranaibadah::find($id);
        return view(
            'kessos.saranaibadah.view', 
            compact(
                'saranaibadah',
                'tipeibadah',
                'statustanah',
                'rt',
                'rw',
                'districts',
                'villages',
                'ktp',
                'kelbekasi'
            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Saranaibadah  $saranaibadah
     * @return \Illuminate\Http\Response
     */
    public function edit(Saranaibadah $saranaibadah)
    {    
        $tipeibadah = Tipeibadah::all();
        $statustanah = Statustanah::all();
        $rt = Rt::all();
        $rw = Rw::all();
        $ktp = Ktp::all();
        // Get semua data
        $districts = District::all();
        $villages = Village::all();
        $kelbekasi = kelbekasi::all();
        
        return view(
            'kessos.saranaibadah.edit', 
            compact(
                'saranaibadah',
                'tipeibadah',
                'statustanah',
                'rt',
                'rw',
                'districts',
                'villages',
                'ktp',
                'kelbekasi'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Saranaibadah  $saranaibadah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Saranaibadah $saranaibadah)
    {
        // dd($request->all());

        $request->validate([
            'nama' => 'required',
            'tipeibadah_id' => 'required',
            'statustanah_id' => 'required',
            'alamat' => 'required',
            'rt_id' => 'required',
            // 'rw_id' => 'required',
            // 'no_SK' => 'required',
            'no_HP' => 'required',
        ]
        );

        Saranaibadah::where('id', $saranaibadah->id)
        ->update([
            'nama' => $request->nama,
            'tipeibadah_id' => $request->tipeibadah_id,
            'ktp_id' => $request->ktp_id,
            'statustanah_id' => $request->statustanah_id,
            'alamat' => $request->alamat,
            'rt_id' => $request->rt_id,
            // 'rw_id' => $request->rw_id,
            // 'district_id' => $request->district_id,
            // 'village_id' => $request->village_id,
            'no_SK' => $request->no_SK,
            'no_HP' => $request->no_HP
            ]);

            if ($request->hasFile('foto')){
                $request->file('foto')->move('images/Saranaibadah/',$request->file('foto')->getClientOriginalName());
                $saranaibadah->foto = $request->file('foto')->getClientOriginalName();
                $saranaibadah->save();
            }
        return redirect('/saranaibadah')->with('success', 'Data Berhasil Diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Saranaibadah  $saranaibadah
     * @return \Illuminate\Http\Response
     */
    public function destroysaranaibadah($id, Saranaibadah $saranaibadah)
    {
        $saranaibadah = Saranaibadah::find($id);
        $saranaibadah->delete();
        return redirect('/saranaibadah');
    }

    public function getdatasaranaibadah(Request $request)
    {
        if (auth()->user()->role == 'superadmin') {
            if ($request->input('saranaibadahkel') != null) {
                $saranaibadah = Saranaibadah::where('village_id', $request->saranaibadahkel)->orderBy('rw_id', 'asc');
            } else {
                $saranaibadah = Saranaibadah::select('saranaibadah.*')->orderBy('rw_id', 'asc');
            }
            if ($request->input('rwsaranaibadah') != null) {
                $saranaibadah = Saranaibadah::where('village_id', $request->saranaibadahkel)
                ->where('rw_id', $request->rwsaranaibadah)
                ->orderBy('rt_id', 'asc');
            }
        }
        
        if (auth()->user()->role == 'user') {
            $saranaibadah = Saranaibadah::where('rw_id', '=', auth()->user()->rw_id)
            ->where('village_id', '=', auth()->user()->village_id)
            ->orderby('rt_id', 'asc');
        }

        if (auth()->user()->role == 'kessos' || auth()->user()->role == 'struktural' ) {
            if ($request->input('rwsaranaibadah') != null) {
                $saranaibadah = Saranaibadah::where('rw_id', $request->rwsaranaibadah)
                ->where('village_id', '=', auth()->user()->village_id)
                ->orderBy('rt_id', 'asc');
            }else {
                $saranaibadah = Saranaibadah::select('saranaibadah.*')
                ->where('village_id', '=', auth()->user()->village_id)
                ->orderby('rt_id', 'asc');
            }
        }	

        return DataTables::eloquent($saranaibadah)
            ->addIndexColumn()
            ->addColumn('ktp', function ($saranaibadah) {
                return $saranaibadah->ktp->nama;
            })
            ->addColumn('rw', function ($saranaibadah) {
                return $saranaibadah->rw->rw;
            })
            ->addColumn('rt', function ($saranaibadah) {
                return $saranaibadah->rt->rt;
            })
            ->addColumn('tipeibadah', function ($saranaibadah) {
                return $saranaibadah->tipeibadah->tipeibadah;
            })
            ->addColumn('statustanah', function ($saranaibadah) {
                return $saranaibadah->statustanah->statustanah;
            })
            ->addColumn('district', function ($saranaibadah) {
                return $saranaibadah->district->name;
            })
            ->addColumn('village', function ($saranaibadah) {
                return $saranaibadah->village->name;
            })

            ->addColumn('edit', function ($saranaibadah) {
                if (auth()->user()->role == "superadmin" || auth()->user()->role == "user" || auth()->user()->role == "kessos") {
                    return '<a href="saranaibadah/' . $saranaibadah->id . '/edit" class="btn btn-warning" title="Edit">
                <i class="fas fa-edit"></i></a>';
                }
            })

            ->addColumn('view', function ($saranaibadah) {
                return '<a href="#" class="btn btn-primary viewsaranaibadah" data-id="' . $saranaibadah->id . '">
                <i class="fas fa-eye"></i></a>';
            })

            ->addColumn('hapus', function ($saranaibadah) {
                if (auth()->user()->role == "superadmin" || auth()->user()->role == "user" || auth()->user()->role == "kessos") {
                    return '<a href="#" class="btn btn-danger deletesaranaibadah"
                data-id="' . $saranaibadah->id . '"
                data-nama="' . $saranaibadah->nama . '">
                <i class="fas fa-trash"></i></a>';
                }
            })

            ->rawColumns([
                'rw', 'rt', 'ktp', 'statustanah', 'tipeibadah',
                'district', 'village', 'edit', 'view', 'hapus'
            ])
            ->toJson();
    }
}

