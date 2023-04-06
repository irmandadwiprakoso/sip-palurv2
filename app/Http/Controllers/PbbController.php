<?php

namespace App\Http\Controllers;

use App\Models\Pbb;
use App\Models\Rt;
use App\Models\Rw;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\kelbekasi;
use Yajra\DataTables\Facades\DataTables;

class PbbController extends Controller
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
        $rw = Rw::all();
        $rt = Rt::all();
        // Get semua data 
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();
        $villages = Village::all();
        $pbb = Pbb::all();
        $kelbekasi = kelbekasi::all();

        return view(
            'permasbang.pbb.index',
            compact(
                'rw',
                'rt',
                'provinces',
                'regencies',
                'districts',
                'villages',
                'pbb',
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
        $rt = Rt::all();
        $rw = Rw::all();
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();
        $villages = Village::all();

        return view('permasbang.pbb.index', compact(
            'rt',
            'rw',
            'provinces',
            'regencies',
            'districts',
            'villages'
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
        $request->validate(
            [
                'NOP' => 'required',
                'NM_WP_SPPT' => 'required',
                'TOTAL_LUAS_BUMI' => 'required',
                'NJOP_BUMI_SPPT' => 'required',
                'TOTAL_LUAS_BNG' => 'required',
                'NJOP_BNG_SPPT' => 'required',
                'ALM_OP' => 'required',
                'rt_id' => 'required',
                'rw_id' => 'required',
                'ALM_WP' => 'required',
                'PBB_TERHUTANG_SPPT' => 'required',
                'TAHUN_SPPT' => 'required',
                'KETERANGAN' => 'required',
            ],
            [
                'NOP.required' => 'Harus di Isi',
                'NM_WP_SPPT.required' => 'Harus di Isi',
                'TOTAL_LUAS_BUMI.required' => 'Harus di Isi',
                'NJOP_BUMI_SPPT.required' => 'Harus di Isi',
                'TOTAL_LUAS_BNG.required' => 'Harus di Isi',
                'NJOP_BNG_SPPT.required' => 'Harus di Isi',
                'ALM_OP.required' => 'Harus di Isi',
                'rt_id.required' => 'Harus di Isi',
                'rw_id.required' => 'Harus di Isi',
                'ALM_WP.required' => 'Harus di Isi',
                'PBB_TERHUTANG_SPPT.required' => 'Harus di Isi',
                'TAHUN_SPPT.required' => 'Harus di Isi',
                'KETERANGAN.required' => 'Harus di Isi',
            ]
        );
        Pbb::create([
            'NOP' => $request->NOP,
            'NM_WP_SPPT' => $request->NM_WP_SPPT,
            'TOTAL_LUAS_BUMI' => $request->TOTAL_LUAS_BUMI,
            'NJOP_BUMI_SPPT' => $request->NJOP_BUMI_SPPT,
            'TOTAL_LUAS_BNG' => $request->TOTAL_LUAS_BNG,
            'NJOP_BNG_SPPT' => $request->NJOP_BNG_SPPT,
            'ALM_OP' => $request->ALM_OP,
            'rt_id' => $request->rt_id,
            'rw_id' => $request->rw_id,
            'ALM_WP' => $request->ALM_WP,
            'PBB_TERHUTANG_SPPT' => $request->PBB_TERHUTANG_SPPT,
            'TAHUN_SPPT' => $request->TAHUN_SPPT,
            'KETERANGAN' => $request->KETERANGAN,
            'province_id' => $request->province_id,
            'regency_id' => $request->regency_id,
            'district_id' => $request->district_id,
            'village_id' => $request->village_id,
        ]);

        return redirect('/pbb')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pbb  $pbb
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rt = Rt::all();
        $rw = Rw::all();
        // Get semua data 
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();
        $villages = Village::all();
        $pbb = Pbb::all();

        $pbb = Pbb::find($id);
        return view(
            'permasbang.pbb.view',
            compact(
                'rt',
                'rw',
                'provinces',
                'regencies',
                'districts',
                'villages',
                'pbb'
            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pbb  $pbb
     * @return \Illuminate\Http\Response
     */
    public function edit(Pbb $pbb)
    {
        $rt = Rt::all();
        $rw = Rw::all();
        // Get semua data 
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();
        $villages = Village::all();
        $kelbekasi = kelbekasi::all();

        return view('permasbang.pbb.edit', compact(
            'pbb',
            'rt',
            'rw',
            'provinces',
            'regencies',
            'districts',
            'villages',
            'kelbekasi'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pbb  $pbb
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pbb $pbb)
    {
        $request->validate([
            'ALM_OP' => 'required',
            'rt_id' => 'required',
            'rw_id' => 'required',
            'KETERANGAN' => 'required',
        ]);

        Pbb::where('id', $pbb->id)
            ->update([
                'ALM_OP' => $request->ALM_OP,
                'rt_id' => $request->rt_id,
                'rw_id' => $request->rw_id,
                'KETERANGAN' => $request->KETERANGAN,
                // 'village_id' => $request->village_id,
            ]);

        return redirect('/pbb')->with('success', 'Data Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pbb  $pbb
     * @return \Illuminate\Http\Response
     */
    public function destroypbb($id, Pbb $pbb)
    {
        $pbb = Pbb::find($id);
        $pbb->delete();
        return redirect('/pbb');
    }

    public function getdatapbb(Request $request)
    {

        if (auth()->user()->role == 'superadmin') {
            if ($request->input('pbbkel') != null) {
                $pbb = Pbb::where('village_id', $request->pbbkel)
                ->where('TAHUN_SPPT', $request->tahunpbb);
            } else {
                $pbb = Pbb::select('pbb.*')
                ->where('TAHUN_SPPT', $request->tahunpbb)
                ->orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc');
            }
            if ($request->input('rwpbb') != null) {
                $pbb = Pbb::where('rw_id', $request->rwpbb)
                ->where('village_id', $request->pbbkel)
                ->where('TAHUN_SPPT', $request->tahunpbb);
            }
            if ($request->input('rtpbb') != null) {
                $pbb = Pbb::where('rt_id', $request->rtpbb)
                ->where('village_id', $request->pbbkel)
                ->where('TAHUN_SPPT', $request->tahunpbb)
                ->where('rw_id', $request->rwpbb);
            }
        }

        if (auth()->user()->role == 'permasbang' || auth()->user()->role == 'struktural') {
            if ($request->input('rwpbb') != null) {
                $pbb = Pbb::where('rw_id', $request->rwpbb)
                ->where('village_id', '=', auth()->user()->village_id)
                ->where('TAHUN_SPPT', $request->tahunpbb);
            }else{
                $pbb = Pbb::select('pbb.*')
                ->where('TAHUN_SPPT', $request->tahunpbb)
                ->where('village_id', '=', auth()->user()->village_id)
                ->orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc');
            }
            if ($request->input('rtpbb') != null) {
                $pbb = Pbb::where('rt_id', $request->rtpbb)
                ->where('village_id', '=', auth()->user()->village_id)
                ->where('TAHUN_SPPT', $request->tahunpbb)
                ->where('rw_id', $request->rwpbb);
            }
        }

        if (auth()->user()->role == 'user') {
            if($request->input('rtpbb')!=null){
                $pbb = Pbb::where('rw_id', '=', auth()->user()->rw_id)
                ->where('village_id', '=', auth()->user()->village_id)
                ->where('rt_id', $request->rtpbb)
                ->where('TAHUN_SPPT', $request->tahunpbb)
                ->orderBy('rt_id', 'asc');
            }else{
                $pbb = Pbb::where('rw_id', '=', auth()->user()->rw_id)
                ->where('village_id', '=', auth()->user()->village_id)
                ->where('TAHUN_SPPT', $request->tahunpbb)
                ->orderby('rt_id', 'asc');
            }
        }
    
        return DataTables::eloquent($pbb)
            ->addIndexColumn()
            ->addColumn('rw', function ($pbb) {
                return $pbb->rw->rw;
            })
            ->addColumn('rt', function ($pbb) {
                return $pbb->rt->rt;
            })
            ->addColumn('district', function ($pbb) {
                return $pbb->district->name;
            })
            ->addColumn('village', function ($pbb) {
                return $pbb->village->name;
            })

            ->addColumn('edit', function ($pbb) {
                if (auth()->user()->role == "superadmin" || 
                auth()->user()->role == "permasbang" ||
                auth()->user()->role == "user") {
                    return '<a href="pbb/' . $pbb->id . '/edit" class="btn btn-warning" title="Edit">
                <i class="fas fa-edit"></i></a>';
                }
            })

            ->addColumn('view', function ($pbb) {
                return '<a href="#" class="btn btn-primary viewpbb" data-id="' . $pbb->id . '">
                <i class="fas fa-eye"></i></a>';
            })

            ->addColumn('hapus', function ($pbb) {
                if (auth()->user()->role == "superadmin") {
                    return '<a href="#" class="btn btn-danger deletepbb"
                data-id="' . $pbb->id . '"
                data-nama="' . $pbb->NOP . '">
                <i class="fas fa-trash"></i></a>';
                }
            })

            ->rawColumns([
                'rw', 'rt','province', 'regency', 'district', 'village', 'edit', 'view', 'hapus'
            ])
            ->toJson();
    }

    public function getdetaildatapbb(Request $request)
    {
        if (auth()->user()->role == 'superadmin') {
            if ($request->input('pbbkel') != null) {
                $pbb = Pbb::where('village_id', $request->pbbkel)
                ->where('TAHUN_SPPT', $request->tahunpbb);
            } else {
                $pbb = Pbb::select('pbb.*')
                ->where('TAHUN_SPPT', $request->tahunpbb)
                ->orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc');
            }
            if ($request->input('rwpbb') != null) {
                $pbb = Pbb::where('rw_id', $request->rwpbb)
                ->where('village_id', $request->pbbkel)
                ->where('TAHUN_SPPT', $request->tahunpbb);
            }
            if ($request->input('rtpbb') != null) {
                $pbb = Pbb::where('rt_id', $request->rtpbb)
                ->where('village_id', $request->pbbkel)
                ->where('TAHUN_SPPT', $request->tahunpbb)
                ->where('rw_id', $request->rwpbb);
            }
        }

        if (auth()->user()->role == 'permasbang' || auth()->user()->role == 'struktural') {
            if ($request->input('rwpbb') != null) {
                $pbb = Pbb::where('rw_id', $request->rwpbb)
                ->where('village_id', '=', auth()->user()->village_id)
                ->where('TAHUN_SPPT', $request->tahunpbb);
            }else{
                $pbb = Pbb::select('pbb.*')
                ->where('TAHUN_SPPT', $request->tahunpbb)
                ->where('village_id', '=', auth()->user()->village_id)
                ->orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc');
            }
            if ($request->input('rtpbb') != null) {
                $pbb = Pbb::where('rt_id', $request->rtpbb)
                ->where('village_id', '=', auth()->user()->village_id)
                ->where('TAHUN_SPPT', $request->tahunpbb)
                ->where('rw_id', $request->rwpbb);
            }
        }

        if (auth()->user()->role == 'user') {
            if($request->input('rtpbb')!=null){
                $pbb = Pbb::where('rw_id', '=', auth()->user()->rw_id)
                ->where('village_id', '=', auth()->user()->village_id)
                ->where('rt_id', $request->rtpbb)
                ->where('TAHUN_SPPT', $request->tahunpbb)
                ->orderBy('rt_id', 'asc');
            }else{
                $pbb = Pbb::where('rw_id', '=', auth()->user()->rw_id)
                ->where('village_id', '=', auth()->user()->village_id)
                ->where('TAHUN_SPPT', $request->tahunpbb)
                ->orderby('rt_id', 'asc');
            }
        }
    
        return DataTables::eloquent($pbb)
            ->addIndexColumn()
            ->addColumn('rw', function ($pbb) {
                return $pbb->rw->rw;
            })
            ->addColumn('rt', function ($pbb) {
                return $pbb->rt->rt;
            })
            ->addColumn('jumlahsppt', function ($pbb) {
                return $pbb->where('TAHUN_SPPT', '=', $request->tahunpbb)
                ->where('village_id', '=', auth()->user()->village_id)
                ->where('rw_id', '=', auth()->user()->rw_id)
                ->count();
            })
            ->addColumn('district', function ($pbb) {
                return $pbb->district->name;
            })
            ->addColumn('village', function ($pbb) {
                return $pbb->village->name;
            })

            ->rawColumns([
                'rw', 'rt','province', 'regency', 'district', 'village', 'jumlahsppt'
            ])
            ->toJson();
    }
}
