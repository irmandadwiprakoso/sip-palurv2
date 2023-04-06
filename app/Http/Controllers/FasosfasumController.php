<?php

namespace App\Http\Controllers;

use App\Models\Fasosfasum;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Rt;
use App\Models\Rw;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\kelbekasi;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class FasosfasumController extends Controller
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
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();
        $villages = Village::all();
        $rw = Rw::all();
        $rt = Rt::all();
        $kelbekasi = kelbekasi::all();
        $fasosfasum = Fasosfasum::all();

        return view('permasbang.fasosfasum.index', compact(
            'rt',
            'rw',
            'provinces',
            'regencies',
            'districts',
            'villages',
            'fasosfasum',
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
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();
        $villages = Village::all();
        $rw = Rw::all();
        $rt = Rt::all();
        $kelbekasi = kelbekasi::all();
        $fasosfasum = Fasosfasum::all();
        return view ('permasbang.fasosfasum.index', compact(
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
        //dd($request->all());
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'rt_id' => 'required',
            // 'rw_id' => 'required',
            // 'koordinat' => 'required',
            'luas' => 'required',
            'pemanfaatan' => 'required',
            // 'nama_pengembang' => 'required',
            // 'nama_perumahan' => 'required',
            'foto' => 'required|max:10240',       
        ],
        [
        'nama.required' => 'Harus di Isi Yaa',
        'alamat.required' => 'Harus di Isi Yaa',
        'rt_id.required' => 'Harus di Isi Yaa',
        // 'rw_id.required' => 'Harus di Isi Yaa',
        'luas.required' => 'Harus di Isi Yaa',
        'pemanfaatan.required' => 'Harus di Isi Yaa',
        'foto.required' => 'diUpload yaa Foto Lokasinya',
        ]);
        $imgName = $request->foto->getClientOriginalName() . '-' . time() 
        . '.' . $request->foto->extension();
        $request->foto->move('images/FasosFasum/',$imgName);

        //Fasosfasum::create($request->all());
        Fasosfasum::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'rt_id' => $request->rt_id,
            'rw_id' => Auth::user()->rw_id,
            'koordinat' => $request->koordinat,
            'luas' => $request->luas,
            'pemanfaatan' => $request->pemanfaatan,
            'nama_pengembang' => $request->nama_pengembang,
            'nama_perumahan' => $request->nama_perumahan,
            'province_id' => Auth::user()->province_id,
            'regency_id' => Auth::user()->regency_id,
            'district_id' => Auth::user()->district_id,
            'village_id' => Auth::user()->village_id,
            'foto' => $imgName,
        ]);

        return redirect('/fasosfasum')->with('success', 'Data Berhasil Ditambahkan!');
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fasosfasum  $fasosfasum
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();
        $villages = Village::all();
        $rw = Rw::all();
        $rt = Rt::all();
        $kelbekasi = kelbekasi::all();
        $fasosfasum = Fasosfasum::all();

        $fasosfasum = Fasosfasum::find($id);
        return view ('permasbang.fasosfasum.view', compact(
            'rt',
            'rw',
            'provinces',
            'regencies',
            'districts',
            'villages',
            'kelbekasi',
            'fasosfasum'
            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fasosfasum  $fasosfasum
     * @return \Illuminate\Http\Response
     */
    public function edit(Fasosfasum $fasosfasum)
    {
        $rt = Rt::all();
        $rw = Rw::all();
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();
        $villages = Village::all();
        $kelbekasi = kelbekasi::all();

        return view (
            'permasbang.fasosfasum.edit', 
            compact(
                'rt',
                'rw',
                'provinces',
                'regencies',
                'districts',
                'villages',
                'kelbekasi',
                'fasosfasum'
                )
            );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fasosfasum  $fasosfasum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fasosfasum $fasosfasum)
    {
        //dd($request->all());
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'rt_id' => 'required',
            // 'rw_id' => 'required',
            // 'koordinat' => 'required',
            'luas' => 'required',
            'pemanfaatan' => 'required',
            // 'nama_pengembang' => 'required',
            // 'nama_perumahan' => 'required',
            'foto' => 'max:10240',       
        ]);

        Fasosfasum::where('id', $fasosfasum->id)
        ->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'rt_id' => $request->rt_id,
            // 'rw_id' => $request->rw_id,
            'koordinat' => $request->koordinat,
            'luas' => $request->luas,
            'pemanfaatan' => $request->pemanfaatan,
            'nama_pengembang' => $request->nama_pengembang,
            'nama_perumahan' => $request->nama_perumahan,
            // 'village_id' => $request->village_id,
            // 'foto' => $request->foto,
        ]);
        if ($request->hasFile('foto')){
            $request->file('foto')->move('images/FasosFasum/',$request->file('foto')->getClientOriginalName());
            $fasosfasum->foto = $request->file('foto')->getClientOriginalName();
            $fasosfasum->save();
        }
        return redirect('/fasosfasum')->with('success', 'Data Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fasosfasum  $fasosfasum
     * @return \Illuminate\Http\Response
     */
    public function destroyfasosfasum($id, Fasosfasum $fasosfasum)
    {
        $fasosfasum = Fasosfasum::find($id);
        $fasosfasum->delete();
        return redirect('/fasosfasum');
    }

    public function getdatafasosfasum(Request $request)
    {
        if (auth()->user()->role == 'superadmin') {
            if ($request->input('fasosfasumkel') != null) {
                $fasosfasum = Fasosfasum::where('village_id', $request->fasosfasumkel);
            }else{
                $fasosfasum = Fasosfasum::select('fasosfasum.*')->orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc');
            }

            if ($request->input('rwfasosfasum') != null) {
                $fasosfasum = Fasosfasum::where('rw_id', $request->rwfasosfasum)
                ->where('village_id', $request->fasosfasumkel)
                ->orderBy('rt_id', 'asc');
            } 

            if ($request->input('rtfasosfasum') != null) {
                $fasosfasum = Fasosfasum::where('rt_id', $request->rtfasosfasum)
                ->where('village_id', $request->fasosfasumkel)
                ->where('rw_id', $request->rwfasosfasum);
            }
        }

        if (auth()->user()->role == 'user') {
            if ($request->input('rtfasosfasum') != null) {
                $fasosfasum = Fasosfasum::where('rt_id', $request->rtfasosfasum)
                ->where('rw_id', '=', auth()->user()->rw_id)
                ->where('village_id', '=', auth()->user()->village_id);
            } else {
                $fasosfasum = Fasosfasum::select('fasosfasum.*')
                ->where('rw_id', '=', auth()->user()->rw_id)
                ->where('village_id', '=', auth()->user()->village_id)
                ->orderby('rt_id', 'asc');
            }
        }

        if (auth()->user()->role == 'permasbang' || auth()->user()->role == 'struktural' ) {
            if ($request->input('rwfasosfasum') != null) {
                $fasosfasum = Fasosfasum::where('rw_id', $request->rwfasosfasum)
                ->where('village_id', '=', auth()->user()->village_id)
                ->orderBy('rt_id', 'asc');
            }else {
                $fasosfasum = Fasosfasum::select('fasosfasum.*')
                ->where('village_id', '=', auth()->user()->village_id)
                ->orderby('rw_id', 'asc');
            }

            if ($request->input('rtfasosfasum') != null) {
                $fasosfasum = Fasosfasum::where('rt_id', $request->rtfasosfasum)
                ->where('village_id', '=', auth()->user()->village_id)
                ->where('rw_id', $request->rwfasosfasum);
            }
        }

        return DataTables::eloquent($fasosfasum)
            ->addIndexColumn()
            ->addColumn('rt', function ($fasosfasum) {
                return $fasosfasum->rt->rt;
            })
            ->addColumn('rw', function ($fasosfasum) {
                return $fasosfasum->rw->rw;
            })
            ->addColumn('district', function ($fasosfasum) {
                return $fasosfasum->district->name;
            })
            ->addColumn('village', function ($fasosfasum) {
                return $fasosfasum->village->name;
            })

            ->addColumn('edit', function ($fasosfasum) {
                if (
                auth()->user()->role == "superadmin" || 
                auth()->user()->role == "permasbang" ||
                auth()->user()->role == "user") {
                    return '<a href="fasosfasum/' . $fasosfasum->id . '/edit" class="btn btn-warning" title="Edit">
                <i class="fas fa-edit"></i></a>';
                }
            })

            ->addColumn('view', function ($fasosfasum) {
                return '<a href="#" class="btn btn-primary viewfasosfasum" data-id="' . $fasosfasum->id . '">
                <i class="fas fa-eye"></i></a>';
            })

            ->addColumn('hapus', function ($fasosfasum) {
                if (auth()->user()->role == "superadmin" ||
                auth()->user()->role == "permasbang" ||
                auth()->user()->role == "user") {
                    return '<a href="#" class="btn btn-danger deletefasosfasum"
                data-id="' . $fasosfasum->id . '"
                data-nama="' . $fasosfasum->nama . '">
                <i class="fas fa-trash"></i></a>';
                }
            })

            ->rawColumns([
                'rw', 'rt', 'province', 'regency', 'district', 'village', 'edit', 'view', 'hapus'
            ])
            ->toJson();
    }
}
