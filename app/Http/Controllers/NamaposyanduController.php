<?php

namespace App\Http\Controllers;

use App\Models\Namaposyandu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\Tipekesehatan;
use App\Models\Statustanah;
use App\Models\Rt;
use App\Models\Rw;
use Yajra\DataTables\Facades\DataTables;
use App\Models\kelbekasi;
use Illuminate\Support\Facades\Auth;
class NamaposyanduController extends Controller
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
        $namaposyandu = Namaposyandu::all();
        // Get semua data 
        $districts = District::all();
        $villages = Village::all();
        $kelbekasi = kelbekasi::all();
        $tipekesehatan = Tipekesehatan::all();
        $statustanah = Statustanah::all();
        $rt = Rt::all();
        $rw = Rw::all();
        return view(
            'permasbang.namaposyandu.index', 
            compact(
                'namaposyandu',
                'tipekesehatan',
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
       $districts = District::all();
       $villages = Village::all();
       $kelbekasi = kelbekasi::all();
       $tipekesehatan = Tipekesehatan::all();
       $statustanah = Statustanah::all();
       $rt = Rt::all();
       $rw = Rw::all();

       return view(
           'permasbang.namaposyandu.index', 
           compact(
               'tipekesehatan',
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
            'tipekesehatan_id' => 'required',
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
            'tipekesehatan_id.required' => 'Harus Di isi yaa',
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
            $request->foto->move('images/Namaposyandu/',$imgName);

        Namaposyandu::create([
            'nama' => $request->nama,
            'tipekesehatan_id' => $request->tipekesehatan_id,
            'nama_pimpinan' => $request->nama_pimpinan,
            'statustanah_id' => $request->statustanah_id,
            'alamat' => $request->alamat,
            'rt_id' => $request->rt_id,
            'rw_id' => Auth::user()->rw_id,
            'district_id' => Auth::user()->district_id,
            'village_id' => Auth::user()->village_id,
            'no_HP' => $request->no_HP,
            'keterangan' => $request->keterangan,
            'foto' => $imgName,
        ]);

        return redirect('/namaposyandu')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Namaposyandu  $namaposyandu
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $namaposyandu = Namaposyandu::all();
        // Get semua data 
        $districts = District::all();
        $villages = Village::all();
        $kelbekasi = kelbekasi::all();
        $tipekesehatan = Tipekesehatan::all();
        $statustanah = Statustanah::all();
        $rt = Rt::all();
        $rw = Rw::all();

        $namaposyandu = Namaposyandu::find($id);
        return view(
            'permasbang.namaposyandu.view', 
            compact(
                'namaposyandu',
                'tipekesehatan',
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
     * @param  \App\Models\Namaposyandu  $namaposyandu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $namaposyandu = Namaposyandu::find($id);

        $tipekesehatan = Tipekesehatan::all();
        $statustanah = Statustanah::all();
        $rt = Rt::all();
        $rw = Rw::all();
        $kelbekasi = kelbekasi::all();
        // Get semua data
        $districts = District::all();
        $villages = Village::all();
        
        return view ('permasbang.namaposyandu.edit',
        compact('kelbekasi','namaposyandu', 'tipekesehatan','rt', 
        'rw', 'statustanah', 'districts', 'villages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Namaposyandu  $namaposyandu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Namaposyandu $namaposyandu)
    {
        // dd($request->all());

        $request->validate([
            'nama' => 'required',
            'tipekesehatan_id' => 'required',
            'statustanah_id' => 'required',
            'nama_pimpinan' => 'required',
            'alamat' => 'required',
            'rt_id' => 'required',
            // 'rw_id' => 'required',
            // 'no_HP' => 'required',
        ]
        );

        Namaposyandu::where('id', $namaposyandu->id)
        ->update([
            'nama' => $request->nama,
            'tipekesehatan_id' => $request->tipekesehatan_id,
            'nama_pimpinan' => $request->nama_pimpinan,
            'statustanah_id' => $request->statustanah_id,
            'alamat' => $request->alamat,
            'rt_id' => $request->rt_id,
            'keterangan' => $request->keterangan,
            // 'rw_id' => $request->rw_id,
            // 'district_id' => $request->district_id,
            // 'village_id' => $request->village_id,
            'no_HP' => $request->no_HP,
            ]);

            if ($request->hasFile('foto')){
                $request->file('foto')->move('images/Namaposyandu/',$request->file('foto')->getClientOriginalName());
                $namaposyandu->foto = $request->file('foto')->getClientOriginalName();
                $namaposyandu->save();
            }
        return redirect('/namaposyandu')->with('success', 'Data Berhasil Diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Namaposyandu  $namaposyandu
     * @return \Illuminate\Http\Response
     */
    public function destroynamaposyandu($id, Namaposyandu $namaposyandu)
    {
        $namaposyandu = Namaposyandu::find($id);
        $namaposyandu->delete();
        return redirect('/namaposyandu');
    }
    public function getdatanamaposyandu(Request $request)
    {
        if (auth()->user()->role == 'superadmin') {
            if ($request->input('namaposyandukel') != null) {
                $namaposyandu = Namaposyandu::where('village_id', $request->namaposyandukel)->orderBy('rw_id', 'asc');
            } else {
                $namaposyandu = Namaposyandu::select('namaposyandu.*')->orderBy('rw_id', 'asc');
            }
            if ($request->input('rwnamaposyandu') != null) {
                $namaposyandu = Namaposyandu::where('village_id', $request->namaposyandukel)
                ->where('rw_id', $request->rwnamaposyandu)
                ->orderBy('rt_id', 'asc');
            }
        }
        
        if (auth()->user()->role == 'user') {
            $namaposyandu = Namaposyandu::where('rw_id', '=', auth()->user()->rw_id)
            ->where('village_id', '=', auth()->user()->village_id)
            ->orderby('rt_id', 'asc');
        }

        if (auth()->user()->role == 'permasbang' || auth()->user()->role == 'struktural' ) {
            if ($request->input('rwnamaposyandu') != null) {
                $namaposyandu = Namaposyandu::where('rw_id', $request->rwnamaposyandu)
                ->where('village_id', '=', auth()->user()->village_id)
                ->orderBy('rt_id', 'asc');
            }else {
                $namaposyandu = Namaposyandu::select('namaposyandu.*')
                ->where('village_id', '=', auth()->user()->village_id)
                ->orderby('rt_id', 'asc');
            }
        }

        return DataTables::eloquent($namaposyandu)
            ->addIndexColumn()
            ->addColumn('rw', function ($namaposyandu) {
                return $namaposyandu->rw->rw;
            })
            ->addColumn('rt', function ($namaposyandu) {
                return $namaposyandu->rt->rt;
            })
            ->addColumn('tipekesehatan', function ($namaposyandu) {
                return $namaposyandu->tipekesehatan->tipekesehatan;
            })
            ->addColumn('statustanah', function ($namaposyandu) {
                return $namaposyandu->statustanah->statustanah;
            })
            ->addColumn('district', function ($namaposyandu) {
                return $namaposyandu->district->name;
            })
            ->addColumn('village', function ($namaposyandu) {
                return $namaposyandu->village->name;
            })

            ->addColumn('edit', function ($namaposyandu) {
                if (auth()->user()->role == "superadmin" || auth()->user()->role == "permasbang" || auth()->user()->role == "user") {
                    return '<a href="namaposyandu/' . $namaposyandu->id . '/edit" class="btn btn-warning" title="Edit">
                <i class="fas fa-edit"></i></a>';
                }
            })

            ->addColumn('view', function ($namaposyandu) {
                return '<a href="#" class="btn btn-primary viewnamaposyandu" data-id="' . $namaposyandu->id . '">
                <i class="fas fa-eye"></i></a>';
            })

            ->addColumn('hapus', function ($namaposyandu) {
                if (auth()->user()->role == "superadmin" || auth()->user()->role == "permasbang" || auth()->user()->role == "user") {
                    return '<a href="#" class="btn btn-danger deletenamaposyandu"
                data-id="' . $namaposyandu->id . '"
                data-nama="' . $namaposyandu->nama . '">
                <i class="fas fa-trash"></i></a>';
                }
            })

            ->rawColumns([
                'rw', 'rt', 'statustanah', 'tipekesehatan',
                'district', 'village', 'edit', 'view', 'hapus'
            ])
            ->toJson();
    }
}
