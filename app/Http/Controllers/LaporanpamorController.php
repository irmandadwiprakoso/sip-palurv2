<?php

namespace App\Http\Controllers;

use App\Models\Laporanpamor;
use Illuminate\Http\Request;
use App\Models\Rt;
use App\Models\Rw;
use App\Models\User;
use App\Models\Seksi;
use App\Models\Regency;
use App\Models\Province;
use App\Models\District;
use App\Models\Village;
use App\Models\kelbekasi;
use Carbon\Carbon;

use Barryvdh\DomPDF\Facade\Pdf;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class LaporanpamorController extends Controller
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

    public function index(Request $request)
    {
        $rt = Rt::all();
        $rw = Rw::all();
        $seksi = Seksi::all();
        $user = User::all();
        $laporanpamor = Laporanpamor::all();
        // Get semua data
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();
        $villages = Village::all();
        $kelbekasi = kelbekasi::all();

        return view(
            'sekret.laporan.index',
            compact(
                'rt',
                'rw',
                'seksi',
                'provinces',
                'regencies',
                'districts',
                'villages',
                'kelbekasi',
                'laporanpamor',
                'user',
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
        $rt = Rt::all();
        $rw = Rw::all();
        $seksi = Seksi::all();
        $user = User::all();
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();
        $villages = Village::all();

        return view(
            'sekret.laporan.index',
            compact('rt', 'rw', 'seksi', 'provinces', 'regencies', 'districts', 'villages', 'user')
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
        $request->validate(
            [
                'tanggal' => 'required',
                'kegiatan' => 'required',
                'jumlah' => 'required',
                'seksi_id' => 'required',
                'keterangan' => 'required',
                'tinjut' => 'required',
                'foto' => 'required|max:10240',
                'rt_id' => 'required',
                'rw_id' => 'required',
                // 'province_id' => 'required',
                // 'regency_id' => 'required',
                // 'district_id' => 'required',
                // 'village_id' => 'required',
            ],
            [
                'tanggal.required' => 'Harus di Isi',
                'kegiatan.required' => 'Harus di Isi',
                'jumlah.required' => 'Harus di Isi',
                'seksi_id.required' => 'Harus di Isi',
                'keterangan.required' => 'Harus di Isi',
                'tinjut.required' => 'Harus di Isi',
                'foto.required' => 'Diupload yaa Foto Kegiatan Kamu',
                'rt_id.required' => 'Harus di Isi',
                'rw_id.required' => 'Harus di Isi',
                // 'province_id.required' => 'Harus Di Isi Yaa',
                // 'regency_id.required' => 'Harus Di Isi Yaa',
                // 'district_id.required' => 'Harus Di Isi Yaa',
                // 'village_id.required' => 'Harus Di Isi Yaa',
            ]
        );
        $imgName = $request->foto->getClientOriginalName() . '-' . time()
            . '.' . $request->foto->extension();
        $request->foto->move('images/LaporanHarian/', $imgName);

        //Laporanharian::create($request->all());
        Laporanpamor::create([
            'tanggal' => $request->tanggal,
            'kegiatan' => $request->kegiatan,
            'jumlah' => $request->jumlah,
            'seksi_id' => $request->seksi_id,
            'keterangan' => $request->keterangan,
            'tinjut' => $request->tinjut,
            'rt_id' => $request->rt_id,
            'rw_id' => $request->rw_id,
            'district_id' => Auth::user()->district_id,
            'village_id' => Auth::user()->village_id,
            'foto' => $imgName,
            'user_id' => Auth::user()->id,
        ]);

        return redirect('/laporanpamor')->with('success', 'Laporan Harian Pamor Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laporanpamor  $laporanpamor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rt = Rt::all();
        $rw = Rw::all();
        $seksi = Seksi::all();
        $user = User::all();
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();
        $villages = Village::all();
        $laporanpamor = Laporanpamor::all();

        $laporanpamor = Laporanpamor::find($id);
        return view(
            'sekret.laporan.view',
            compact('rt', 'rw', 'seksi', 'provinces', 'regencies', 'districts', 'villages', 'laporanpamor', 'user')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laporanpamor  $laporanpamor
     * @return \Illuminate\Http\Response
     */
    public function edit(Laporanpamor $laporanpamor)
    {
        $rt = Rt::all();
        $rw = Rw::all();
        $seksi = Seksi::all();
        $user = User::all();
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();
        $villages = Village::all();
        $kelbekasi = kelbekasi::all();

        return view(
            'sekret.laporan.edit',
            compact('laporanpamor', 'rt', 'rw', 'seksi', 'provinces', 'regencies', 'districts', 'villages', 'kelbekasi', 'user')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laporanpamor  $laporanpamor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laporanpamor $laporanpamor)
    {
        //dd($request->all());
        $request->validate([
            'tanggal' => 'required',
            'kegiatan' => 'required',
            'jumlah' => 'required',
            'seksi_id' => 'required',
            'keterangan' => 'required',
            'tinjut' => 'required',
            'rt_id' => 'required',
            'rw_id' => 'required',
            // 'foto' => 'max:10240',
            // 'province_id' => 'required',
            // 'regency_id' => 'required',
            // 'district_id' => 'required',
            // 'village_id' => 'required',
        ]);

        Laporanpamor::where('id', $laporanpamor->id)
            ->update([
                'tanggal' => $request->tanggal,
                'kegiatan' => $request->kegiatan,
                'jumlah' => $request->jumlah,
                'seksi_id' => $request->seksi_id,
                'keterangan' => $request->keterangan,
                'tinjut' => $request->tinjut,
                'rt_id' => $request->rt_id,
                'rw_id' => $request->rw_id,
                // 'province_id' => $request->province_id,
                // 'regency_id' => $request->regency_id,
                // 'district_id' => $request->district_id,
                // 'village_id' => $request->village_id,
                // 'foto' => $request->foto,
            ]);
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('images/LaporanHarian/', $request->file('foto')->getClientOriginalName());
            $laporanpamor->foto = $request->file('foto')->getClientOriginalName();
            $laporanpamor->save();
        }
        return redirect('/laporanpamor')->with('success', 'Laporan Harian Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laporanpamor  $laporanpamor
     * @return \Illuminate\Http\Response
     */
    public function destroylaporanpamor(Laporanpamor $laporanpamor, $id)
    {
        $laporanpamor = Laporanpamor::find($id);
        $laporanpamor->delete();
        return redirect('/laporanpamor');
    }
    
    public function getdatalaporanpamor(Request $request)
    {
    if (auth()->user()->role == 'user') {
        if ($request->input('tahun') != null) {
            $laporanpamor = Laporanpamor::where('user_id', Auth()->user()->id)
            ->whereYear('tanggal', $request->tahun)
            ->orderBy('tanggal', 'desc')->orderBy('rt_id', 'asc');
        }

        if ($request->input('startdatepamor') != null) {
            $laporanpamor = Laporanpamor::where('user_id', Auth()->user()->id)
            ->whereBetween('tanggal', [$request->startdatepamor, $request->enddatepamor]);
        }

    }

    if (auth()->user()->role == 'sekret' || auth()->user()->role == 'struktural'  ) {
        if ($request->input('tahun') != null) {
            $laporanpamor = Laporanpamor::select('laporanpamor.*')
                ->where('village_id', '=', auth()->user()->village_id)
                ->whereYear('tanggal', $request->tahun)
                ->orderBy('tanggal', 'desc')
                ->orderBy('rw_id', 'asc')
                ->orderBy('rt_id', 'asc');
        }

        if ($request->input('rwpamor') != null) {
            $laporanpamor = Laporanpamor::select('laporanpamor.*')
            ->where('village_id', '=', auth()->user()->village_id)
            ->whereYear('tanggal', $request->tahun)
            ->where('rw_id', $request->rwpamor)
            ->orderBy('tanggal', 'desc')
            ->orderBy('rt_id', 'asc');
        }

        if ($request->input('startdatepamor') != null) {
            $laporanpamor = Laporanpamor::select('laporanpamor.*')
            ->where('village_id', '=', auth()->user()->village_id)
            ->whereBetween('tanggal', [$request->startdatepamor, $request->enddatepamor]);
        }

    }

    if (auth()->user()->role == 'superadmin') {
        if ($request->input('tahun') != null) {
            $laporanpamor = Laporanpamor::whereYear('tanggal', $request->tahun)->orderBy('tanggal', 'desc');
        }

        if ($request->input('pamorkel') != null) {
            $laporanpamor = Laporanpamor::whereYear('tanggal', $request->tahun)->where('village_id', $request->pamorkel);
        }

        if ($request->input('rwpamor') != null) {
            $laporanpamor = Laporanpamor::whereYear('tanggal', $request->tahun)
            ->where('village_id', $request->pamorkel)->where('rw_id', $request->rwpamor)->orderBy('tanggal', 'desc');
        }

        if ($request->input('startdatepamor') != null) {
            $laporanpamor = Laporanpamor::whereBetween('tanggal', [$request->startdatepamor, $request->enddatepamor]);
        }
    }
    // die;
    $laporanpamor = $laporanpamor->get();
    
    dd ($laporanpamor);
        return DataTables::eloquent($laporanpamor)
            ->addIndexColumn()
            ->addColumn('name', function ($laporanpamor) {
                return $laporanpamor->user['name'];
            })
            ->addColumn('rt', function ($laporanpamor) {
                return $laporanpamor->rt->rt;
            })
            ->addColumn('rw', function ($laporanpamor) {
                return $laporanpamor->rw->rw;
            })
            ->addColumn('seksi', function ($laporanpamor) {
                return $laporanpamor->seksi->seksi;
            })
            ->addColumn('district', function ($laporanpamor) {
                return $laporanpamor->district->name;
            })
            ->addColumn('village', function ($laporanpamor) {
                return $laporanpamor->village->name;
            })


            ->addColumn('edit', function ($laporanpamor) {
                if (auth()->user()->role == "superadmin" || auth()->user()->role == "user") {
                    return '<a href="laporanpamor/' . $laporanpamor->id . '/edit" class="btn btn-warning" title="Edit">
                <i class="fas fa-edit"></i></a>';
                }
            })

            ->addColumn('view', function ($laporanpamor) {
                return '<a href="#" class="btn btn-primary viewlaporanpamor" data-id="' . $laporanpamor->id . '">
                <i class="fas fa-eye"></i></a>';
            })

            ->addColumn('hapus', function ($laporanpamor) {
                if (auth()->user()->role == "superadmin" || auth()->user()->role == "user") {
                    return '<a href="#" class="btn btn-danger deletelaporanpamor"
                data-id="' . $laporanpamor->id . '"
                data-nama="' . $laporanpamor->nama . '"
                data-tgl="' . $laporanpamor->tanggal . '">
                <i class="fas fa-trash"></i></a>';
                }
            })

            ->rawColumns([
                'district', 'village', 'seksi', 'rt', 'rw', 'edit', 'view', 'hapus', 'name'
            ])
            ->orderColumns(['tanggal','keterangan'],"-:column $1")
            ->toJson();
    }

    // public function cetaklaporanpamor()
    // {
    //     $pdf = App::make('dompdf.wrapper');
    //     $pdf->loadHTML('<h1>Test</h1>');
    //     return $pdf->stream();
    // }

    public function cetaklaporanpamor()
    {
        return view(
            'sekret.laporan.cetaklaporanpamor'
        );
    }

    public function cetaklaporanbydate($startdatepamor)
    {
        // dd(["tanggal awal : ".$startdatepamor]);

        $rt = Rt::all();
        $rw = Rw::all();
        $seksi = Seksi::all();
        $user = User::all();
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();
        $villages = Village::all();
        $kelbekasi = kelbekasi::all();


        if (auth()->user()->role == 'superadmin') {
            $cetaklaporanbydate = Laporanpamor::where('tanggal', '=' , $startdatepamor)->get();
        }

        if (auth()->user()->role == 'user') {
            $cetaklaporanbydate = Laporanpamor::where('user_id', Auth()->user()->id)->where('tanggal', '=', $startdatepamor)->get();
        }

        return view('sekret.laporan.cetaklaporanbydate', 
        compact(
            'rt', 'rw', 'seksi', 'provinces', 'regencies', 'districts', 'villages', 'kelbekasi', 'user','cetaklaporanbydate'
        ));
    }


}
