<?php

namespace App\Http\Controllers;

use App\Models\Saranakesehatan;
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
class SaranakesehatanController extends Controller
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
        $saranakesehatan = Saranakesehatan::all();
        // Get semua data 
        $districts = District::all();
        $villages = Village::all();
        $kelbekasi = kelbekasi::all();
        $tipekesehatan = Tipekesehatan::all();
        $statustanah = Statustanah::all();
        $rt = Rt::all();
        $rw = Rw::all();
        return view(
            'kessos.saranakesehatan.index', 
            compact(
                'saranakesehatan',
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
           'kessos.saranakesehatan.index', 
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
            $request->foto->move('images/Saranakesehatan/',$imgName);

        Saranakesehatan::create([
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
            
            'foto' => $imgName,
        ]);

        return redirect('/saranakesehatan')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Saranakesehatan  $saranakesehatan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $saranakesehatan = Saranakesehatan::all();
        // Get semua data 
        $districts = District::all();
        $villages = Village::all();
        $kelbekasi = kelbekasi::all();
        $tipekesehatan = Tipekesehatan::all();
        $statustanah = Statustanah::all();
        $rt = Rt::all();
        $rw = Rw::all();

        $saranakesehatan = Saranakesehatan::find($id);
        return view(
            'kessos.saranakesehatan.view', 
            compact(
                'saranakesehatan',
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
     * @param  \App\Models\Saranakesehatan  $saranakesehatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $saranakesehatan = Saranakesehatan::find($id);

        $tipekesehatan = Tipekesehatan::all();
        $statustanah = Statustanah::all();
        $rt = Rt::all();
        $rw = Rw::all();
        $kelbekasi = kelbekasi::all();
        // Get semua data
        $districts = District::all();
        $villages = Village::all();
        
        return view ('kessos.saranakesehatan.edit',
        compact('kelbekasi','saranakesehatan', 'tipekesehatan','rt', 
        'rw', 'statustanah', 'districts', 'villages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Saranakesehatan  $saranakesehatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Saranakesehatan $saranakesehatan)
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

        Saranakesehatan::where('id', $saranakesehatan->id)
        ->update([
            'nama' => $request->nama,
            'tipekesehatan_id' => $request->tipekesehatan_id,
            'nama_pimpinan' => $request->nama_pimpinan,
            'statustanah_id' => $request->statustanah_id,
            'alamat' => $request->alamat,
            'rt_id' => $request->rt_id,
            
            // 'rw_id' => $request->rw_id,
            // 'district_id' => $request->district_id,
            // 'village_id' => $request->village_id,
            'no_HP' => $request->no_HP,
            ]);

            if ($request->hasFile('foto')){
                $request->file('foto')->move('images/Saranakesehatan/',$request->file('foto')->getClientOriginalName());
                $saranakesehatan->foto = $request->file('foto')->getClientOriginalName();
                $saranakesehatan->save();
            }
        return redirect('/saranakesehatan')->with('success', 'Data Berhasil Diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Saranakesehatan  $saranakesehatan
     * @return \Illuminate\Http\Response
     */
    public function destroysaranakesehatan($id, Saranakesehatan $saranakesehatan)
    {
        $saranakesehatan = Saranakesehatan::find($id);
        $saranakesehatan->delete();
        return redirect('/saranakesehatan');
    }
    public function getdatasaranakesehatan(Request $request)
    {
        if (auth()->user()->role == 'superadmin') {
            if ($request->input('saranakesehatankel') != null) {
                $saranakesehatan = Saranakesehatan::where('village_id', $request->saranakesehatankel)
                ->orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc');
            } else {
                $saranakesehatan = Saranakesehatan::select('saranakesehatan.*')->orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc');
            }
            if ($request->input('rwsaranakesehatan') != null) {
                $saranakesehatan = Saranakesehatan::where('village_id', $request->saranakesehatankel)
                ->where('rw_id', $request->rwsaranakesehatan)->orderBy('rt_id', 'asc');
            }
        }
        
        if (auth()->user()->role == 'user') {
            $saranakesehatan = Saranakesehatan::where('rw_id', '=', auth()->user()->rw_id)
            ->where('village_id', '=', auth()->user()->village_id)->orderBy('rt_id', 'asc');
        }

        if (auth()->user()->role == 'kessos' || auth()->user()->role == 'struktural' ) {
            if ($request->input('rwsaranakesehatan') != null) {
                $saranakesehatan = Saranakesehatan::where('rw_id', $request->rwsaranakesehatan)
                ->where('village_id', '=', auth()->user()->village_id)->orderBy('rt_id', 'asc');
            }else {
                $saranakesehatan = Saranakesehatan::select('saranakesehatan.*')
                ->where('village_id', '=', auth()->user()->village_id)->orderBy('rt_id', 'asc');
            }
        }

        return DataTables::eloquent($saranakesehatan)
            ->addIndexColumn()
            ->addColumn('rw', function ($saranakesehatan) {
                return $saranakesehatan->rw->rw;
            })
            ->addColumn('rt', function ($saranakesehatan) {
                return $saranakesehatan->rt->rt;
            })
            ->addColumn('tipekesehatan', function ($saranakesehatan) {
                return $saranakesehatan->tipekesehatan->tipekesehatan;
            })
            ->addColumn('statustanah', function ($saranakesehatan) {
                return $saranakesehatan->statustanah->statustanah;
            })
            ->addColumn('district', function ($saranakesehatan) {
                return $saranakesehatan->district->name;
            })
            ->addColumn('village', function ($saranakesehatan) {
                return $saranakesehatan->village->name;
            })

            ->addColumn('edit', function ($saranakesehatan) {
                if (auth()->user()->role == "superadmin" || auth()->user()->role == "kessos" || auth()->user()->role == "user") {
                    return '<a href="saranakesehatan/' . $saranakesehatan->id . '/edit" class="btn btn-warning" title="Edit">
                <i class="fas fa-edit"></i></a>';
                }
            })

            ->addColumn('view', function ($saranakesehatan) {
                return '<a href="#" class="btn btn-primary viewsaranakesehatan" data-id="' . $saranakesehatan->id . '">
                <i class="fas fa-eye"></i></a>';
            })

            ->addColumn('hapus', function ($saranakesehatan) {
                if (auth()->user()->role == "superadmin" || auth()->user()->role == "kessos" || auth()->user()->role == "user") {
                    return '<a href="#" class="btn btn-danger deletesaranakesehatan"
                data-id="' . $saranakesehatan->id . '"
                data-nama="' . $saranakesehatan->nama . '">
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
