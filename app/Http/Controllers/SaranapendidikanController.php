<?php

namespace App\Http\Controllers;

use App\Models\Saranapendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\Tipependidikan;
use App\Models\Statustanah;
use App\Models\Rt;
use App\Models\Rw;
use Yajra\DataTables\Facades\DataTables;
use App\Models\kelbekasi;
use App\Models\Ktp;

use Illuminate\Support\Facades\Auth;
class SaranapendidikanController extends Controller
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
        $saranapendidikan = Saranapendidikan::all();
        // Get semua data 
        $districts = District::all();
        $villages = Village::all();
        $kelbekasi = kelbekasi::all();
        $tipependidikan = Tipependidikan::all();
        $statustanah = Statustanah::all();
        $rt = Rt::all();
        $rw = Rw::all();
        $ktp = Ktp::all();
        return view(
            'kessos.saranapendidikan.index', 
            compact(
                'saranapendidikan',
                'tipependidikan',
                'statustanah',
                'rt',
                'rw',
                'districts',
                'villages',
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
       $provinces = Province::all();
       $regencies = Regency::all();
       $districts = District::all();
       $villages = Village::all();
       $kelbekasi = kelbekasi::all();
       $tipependidikan = Tipependidikan::all();
       $statustanah = Statustanah::all();
       $rt = Rt::all();
       $rw = Rw::all();

       return view(
           'kessos.saranapendidikan.index', 
           compact(
               'tipependidikan',
               'statustanah',
               'rt',
               'rw',
               'provinces',
               'regencies',
               'districts',
               'villages',
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
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'nama' => 'required',
            'tipependidikan_id' => 'required',
            'statustanah_id' => 'required',
            'nama_pimpinan' => 'required',
            'alamat' => 'required',
            'rt_id' => 'required',
            // 'rw_id' => 'required',
            // 'province_id' => 'required',
            // 'regency_id' => 'required',
            // 'district_id' => 'required',
            // 'village_id' => 'required',
        ],
        [
            'nama.required' => 'Harus Di isi yaa',
            'tipependidikan_id.required' => 'Harus Di isi yaa',
            'statustanah_id.required' => 'Harus Di isi yaa',
            'nama_pimpinan.required' => 'Harus Di isi yaa', 
            'alamat.required' => 'Harus Di isi yaa',
            'rt_id.required' => 'Harus Di isi yaa',
            // 'rw_id.required' => 'Harus Di isi yaa',
            // 'province_id.required' => 'Harus Di isi yaa',
            // 'regency_id.required' => 'Harus Di isi yaa',
            // 'district_id.required' => 'Harus Di isi yaa',
            // 'village_id.required' => 'Harus Di isi yaa',
        ]
        );
            $imgName = $request->foto->getClientOriginalName() . '-' . time() 
            . '.' . $request->foto->extension();
            $request->foto->move('images/Saranapendidikan/',$imgName);

        Saranapendidikan::create([
            'nama' => $request->nama,
            'tipependidikan_id' => $request->tipependidikan_id,
            'nama_pimpinan' => $request->nama_pimpinan,
            'statustanah_id' => $request->statustanah_id,
            'alamat' => $request->alamat,
            'rt_id' => $request->rt_id,
            'rw_id' => Auth::user()->rw_id,
            'district_id' => Auth::user()->district_id,
            'village_id' => Auth::user()->village_id,
            'no_HP' => $request->no_HP,
            'foto' => $imgName,
        ]);

        return redirect('/saranapendidikan')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Saranapendidikan  $saranapendidikan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $saranapendidikan = Saranapendidikan::all();
        // Get semua data 
        $districts = District::all();
        $villages = Village::all();
        $kelbekasi = kelbekasi::all();
        $tipependidikan = Tipependidikan::all();
        $statustanah = Statustanah::all();
        $rt = Rt::all();
        $rw = Rw::all();

        $saranapendidikan = Saranapendidikan::find($id);
        return view(
            'kessos.saranapendidikan.view', 
            compact(
                'saranapendidikan',
                'tipependidikan',
                'statustanah',
                'rt',
                'rw',
                'districts',
                'villages',
                'kelbekasi'
            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Saranapendidikan  $saranapendidikan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $saranapendidikan = Saranapendidikan::find($id);

        $tipependidikan = Tipependidikan::all();
        $statustanah = Statustanah::all();
        $rt = Rt::all();
        $rw = Rw::all();
        $kelbekasi = kelbekasi::all();
        // Get semua data
        $districts = District::all();
        $villages = Village::all();
        
        return view ('kessos.saranapendidikan.edit',
        compact('kelbekasi','saranapendidikan', 'tipependidikan','rt', 
        'rw', 'statustanah', 'districts', 'villages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Saranapendidikan  $saranapendidikan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Saranapendidikan $saranapendidikan)
    {
        // dd($request->all());

        $request->validate([
            'nama' => 'required',
            'tipependidikan_id' => 'required',
            'statustanah_id' => 'required',
            'nama_pimpinan' => 'required',
            'alamat' => 'required',
            'rt_id' => 'required',
            // 'rw_id' => 'required',
            // 'no_HP' => 'required',
        ]
        );

        Saranapendidikan::where('id', $saranapendidikan->id)
        ->update([
            'nama' => $request->nama,
            'tipependidikan_id' => $request->tipependidikan_id,
            'nama_pimpinan' => $request->nama_pimpinan,
            'statustanah_id' => $request->statustanah_id,
            'alamat' => $request->alamat,
            'rt_id' => $request->rt_id,
            // 'rw_id' => $request->rw_id,
            // 'district_id' => $request->district_id,
            // 'village_id' => $request->village_id,
            // 'no_HP' => $request->no_HP,
            ]);

            if ($request->hasFile('foto')){
                $request->file('foto')->move('images/Saranapendidikan/',$request->file('foto')->getClientOriginalName());
                $saranapendidikan->foto = $request->file('foto')->getClientOriginalName();
                $saranapendidikan->save();
            }
        return redirect('/saranapendidikan')->with('success', 'Data Berhasil Diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Saranapendidikan  $saranapendidikan
     * @return \Illuminate\Http\Response
     */
    public function destroysaranapendidikan($id, Saranapendidikan $saranapendidikan)
    {
        $saranapendidikan = Saranapendidikan::find($id);
        $saranapendidikan->delete();
        return redirect('/saranapendidikan');
    }
    public function getdatasaranapendidikan(Request $request)
    {
        if (auth()->user()->role == 'superadmin') {
            if ($request->input('saranapendidikankel') != null) {
                $saranapendidikan = Saranapendidikan::where('village_id', $request->saranapendidikankel);
            } else {
                $saranapendidikan = Saranapendidikan::select('saranapendidikan.*')->orderby('rt_id', 'asc');
            }
            if ($request->input('rwsaranapendidikan') != null) {
                $saranapendidikan = Saranapendidikan::where('village_id', $request->saranapendidikankel)
                ->where('rw_id', $request->rwsaranapendidikan);
            }
        }
        
        if (auth()->user()->role == 'user') {
            $saranapendidikan = Saranapendidikan::where('rw_id', '=', auth()->user()->rw_id)
            ->where('village_id', '=', auth()->user()->village_id);
        }

        if (auth()->user()->role == 'kessos' || auth()->user()->role == 'struktural' ) {
            if ($request->input('rwsaranapendidikan') != null) {
                $saranapendidikan = Saranapendidikan::where('rw_id', $request->rwsaranapendidikan)
                ->where('village_id', '=', auth()->user()->village_id);
            }else {
                $saranapendidikan = Saranapendidikan::select('saranapendidikan.*')
                ->where('village_id', '=', auth()->user()->village_id);
            }
        }	

        return DataTables::eloquent($saranapendidikan)
            ->addIndexColumn()
            ->addColumn('rw', function ($saranapendidikan) {
                return $saranapendidikan->rw->rw;
            })
            ->addColumn('rt', function ($saranapendidikan) {
                return $saranapendidikan->rt->rt;
            })
            ->addColumn('tipependidikan', function ($saranapendidikan) {
                return $saranapendidikan->tipependidikan->tipependidikan;
            })
            ->addColumn('statustanah', function ($saranapendidikan) {
                return $saranapendidikan->statustanah->statustanah;
            })
            ->addColumn('district', function ($saranapendidikan) {
                return $saranapendidikan->district->name;
            })
            ->addColumn('village', function ($saranapendidikan) {
                return $saranapendidikan->village->name;
            })

            ->addColumn('edit', function ($saranapendidikan) {
                if (auth()->user()->role == "superadmin" || auth()->user()->role == "kessos" || auth()->user()->role == "user") {
                    return '<a href="saranapendidikan/' . $saranapendidikan->id . '/edit" class="btn btn-warning" title="Edit">
                <i class="fas fa-edit"></i></a>';
                }
            })

            ->addColumn('view', function ($saranapendidikan) {
                return '<a href="#" class="btn btn-primary viewsaranapendidikan" data-id="' . $saranapendidikan->id . '">
                <i class="fas fa-eye"></i></a>';
            })

            ->addColumn('hapus', function ($saranapendidikan) {
                if (auth()->user()->role == "superadmin" || auth()->user()->role == "kessos" || auth()->user()->role == "user") {
                    return '<a href="#" class="btn btn-danger deletesaranapendidikan"
                data-id="' . $saranapendidikan->id . '"
                data-nama="' . $saranapendidikan->nama . '">
                <i class="fas fa-trash"></i></a>';
                }
            })

            ->rawColumns([
                'rw', 'rt', 'statustanah', 'tipependidikan',
                'province', 'regency', 'district', 'village', 'edit', 'view', 'hapus'
            ])
            ->toJson();
    }
}
