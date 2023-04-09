<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\Ktp;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\Rt;
use App\Models\Rw;
use App\Models\Pekerjaan;
use App\Models\Hubkeluarga;
use App\Models\Golongandarah;
use App\Models\Statuskawin;
use App\Models\Pendidikan;
use App\Models\Jeniskelamin;
use App\Models\Agama;
use App\Models\kelbekasi;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class KtpController extends Controller
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
        $agama = Agama::all();
        $jeniskelamin = Jeniskelamin::all();
        $statuskawin = Statuskawin::all();
        $rt = Rt::all();
        $rw = Rw::all();
        $pekerjaan = Pekerjaan::all();
        $hubkeluarga = Hubkeluarga::all();
        $ktp = Ktp::all();

        // Get semua data
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();
        $villages = Village::all();
        $kelbekasi = kelbekasi::all();

        return view(
            'pemtrantibum.ktp.index',
            compact(
                'agama',
                'jeniskelamin',
                'statuskawin',
                'rt',
                'rw',
                'pekerjaan',
                'hubkeluarga',
                'provinces',
                'regencies',
                'districts',
                'villages',
                'kelbekasi',
                'ktp'
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
        $agama = Agama::all();
        $jeniskelamin = Jeniskelamin::all();
        $statuskawin = Statuskawin::all();
        $rt = Rt::all();
        $rw = Rw::all();
        $pekerjaan = Pekerjaan::all();
        $hubkeluarga = Hubkeluarga::all();

        // Get semua data
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();
        $villages = Village::all();

        return view(
            'pemtrantibum.ktp.create',
            compact(
                'agama',
                'jeniskelamin',
                'statuskawin',
                'rt',
                'rw',
                'pekerjaan',
                'hubkeluarga',
                'provinces',
                'regencies',
                'districts',
                'villages'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Ktp $ktp)
    {
        // dd($request->all());
        $request->validate(
            [
                'id' => 'required|size:16',
                'KK' => 'required|size:16',
                'hubkeluarga_id' => 'required',
                'nama' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'alamat' => 'required',
                'rt_id' => 'required',
                'rw_id' => 'required',
                // 'province_id' => 'required',
                // 'regency_id' => 'required',
                // 'district_id' => 'required',
                // 'village_id' => 'required',
                'agama_id' => 'required',
                'jeniskelamin_id' => 'required',
                'statuskawin_id' => 'required',
                'pekerjaan_id' => 'required',
            ],
            [
                'id.required' => 'Di Isi 16 Digit NIK e-KTP',
                'KK.required' => 'Di Isi 16 Digit Nomor KK',
                'hubkeluarga_id.required' => 'Harus Di Isi Yaa',
                'nama.required' => 'Harus Di Isi Yaa',
                'tempat_lahir.required' => 'Harus Di Isi Yaa',
                'tanggal_lahir.required' => 'Harus Di Isi Yaa',
                'alamat.required' => 'Harus Di Isi Yaa',
                'rt_id.required' => 'Harus Di Isi Yaa',
                'rw_id.required' => 'Harus Di Isi Yaa',
                // 'province_id.required' => 'Harus Di Isi Yaa',
                // 'regency_id.required' => 'Harus Di Isi Yaa',
                // 'district_id.required' => 'Harus Di Isi Yaa',
                // 'village_id.required' => 'Harus Di Isi Yaa',
                'agama_id.required' => 'Harus Di Isi Yaa',
                'jeniskelamin_id.required' => 'Harus Di Isi Yaa',
                'statuskawin_id.required' => 'Harus Di Isi Yaa',
                'pekerjaan_id.required' => 'Harus Di Isi Yaa',
            ]
        );

        Ktp::create([
            'id' => $request->id,
            'KK' => $request->KK,
            'hubkeluarga_id' => $request->hubkeluarga_id,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'rt_id' => $request->rt_id,
            'rw_id' => $request->rw_id,
            'province_id' => Auth::user()->province_id,
            'regency_id' => Auth::user()->regency_id,
            'district_id' => Auth::user()->district_id,
            'village_id' => Auth::user()->village_id,
            'agama_id' => $request->agama_id,
            'jeniskelamin_id' => $request->jeniskelamin_id,
            'statuskawin_id' => $request->statuskawin_id,
            'pekerjaan_id' => $request->pekerjaan_id
        ]);

        return redirect('/ktp')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ktp  $ktp
     * @return \Illuminate\Http\Response
     */
    public function show(Ktp $ktp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ktp  $ktp
     * @return \Illuminate\Http\Response
     */
    public function edit(Ktp $ktp)
    {
        $agama = Agama::all();
        $jeniskelamin = Jeniskelamin::all();
        $statuskawin = Statuskawin::all();
        $rt = Rt::all();
        $rw = Rw::all();
        $pekerjaan = Pekerjaan::all();
        $hubkeluarga = Hubkeluarga::all();
        // Get semua data
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();
        $villages = Village::all();
        $kelbekasi = kelbekasi::all();

        return view(
            'pemtrantibum.ktp.edit',
            compact('ktp', 
            'kelbekasi', 'agama', 'jeniskelamin', 'statuskawin', 'rt', 'rw', 'pekerjaan', 'hubkeluarga', 
            'provinces', 'regencies', 'districts', 'villages')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ktp  $ktp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ktp $ktp)
    {
        // dd($request->all());
        $request->validate(
            [
                'id' => 'required|size:16',
                'KK' => 'required|size:16',
                'hubkeluarga_id' => 'required',
                'nama' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'alamat' => 'required',
                'rt_id' => 'required',
                'rw_id' => 'required',
                'province_id' => 'required',
                'regency_id' => 'required',
                'district_id' => 'required',
                'village_id' => 'required',
                'agama_id' => 'required',
                'jeniskelamin_id' => 'required',
                'statuskawin_id' => 'required',
                'pekerjaan_id' => 'required',
            ],
            [
                'id.required' => 'Di Isi 16 Digit NIK e-KTP',
                'KK.required' => 'Di Isi 16 Digit Nomor KK',
                'hubkeluarga_id.required' => 'Harus Di Isi Yaa',
                'nama.required' => 'Harus Di Isi Yaa',
                'tempat_lahir.required' => 'Harus Di Isi Yaa',
                'tanggal_lahir.required' => 'Harus Di Isi Yaa',
                'alamat.required' => 'Harus Di Isi Yaa',
                'rt_id.required' => 'Harus Di Isi Yaa',
                'rw_id.required' => 'Harus Di Isi Yaa',
                'province_id.required' => 'Harus Di Isi Yaa',
                'regency_id.required' => 'Harus Di Isi Yaa',
                'district_id.required' => 'Harus Di Isi Yaa',
                'village_id.required' => 'Harus Di Isi Yaa',
                'agama_id.required' => 'Harus Di Isi Yaa',
                'jeniskelamin_id.required' => 'Harus Di Isi Yaa',
                'statuskawin_id.required' => 'Harus Di Isi Yaa',
                'pekerjaan_id.required' => 'Harus Di Isi Yaa',
            ]
        );

        Ktp::where('id', $ktp->id)
            ->update([
                'id' => $request->id,
                'KK' => $request->KK,
                'nama' => $request->nama,
                'hubkeluarga_id' => $request->hubkeluarga_id,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'alamat' => $request->alamat,
                'rt_id' => $request->rt_id,
                'rw_id' => $request->rw_id,
                'province_id' => $request->province_id,
                'regency_id' => $request->regency_id,
                'district_id' => $request->district_id,
                'village_id' => $request->village_id,
                'agama_id' => $request->agama_id,
                'jeniskelamin_id' => $request->jeniskelamin_id,
                'statuskawin_id' => $request->statuskawin_id,
                'pekerjaan_id' => $request->pekerjaan_id
            ]);
        return redirect('/ktp')->with('success', 'Data KTP Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ktp  $ktp
     * @return \Illuminate\Http\Response
     */
    public function destroyktp($id, Ktp $ktp)
    {
        $ktp = Ktp::find($id);
        $ktp->delete();
        return redirect('/ktp');
    }

    public function getdataktp(Request $request)
    {
        if (auth()->user()->role == 'superadmin') {
            if ($request->input('kelktp') != null) {
                $ktp = Ktp::where('village_id', $request->kelktp);
            }else{
                $ktp = Ktp::select('ktp.*')->orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc');
            }

            if ($request->input('rw') != null) {
                $ktp = Ktp::where('rw_id', $request->rw)
                ->where('village_id', $request->kelktp)
                ->orderBy('rt_id', 'asc');
            } 

            if ($request->input('rt') != null) {
                $ktp = Ktp::where('rt_id', $request->rt)
                ->where('village_id', $request->kelktp)
                ->where('rw_id', $request->rw);
            }
        }

        if (auth()->user()->role == 'user') {
            if ($request->input('rt') != null) {
                $ktp = Ktp::where('rt_id', $request->rt)
                ->where('rw_id', '=', auth()->user()->rw_id)
                ->where('village_id', '=', auth()->user()->village_id);
            } else {
                $ktp = Ktp::select('ktp.*')
                ->where('rw_id', '=', auth()->user()->rw_id)
                ->where('village_id', '=', auth()->user()->village_id)
                ->orderby('rt_id', 'asc');
            }
        }

        if (auth()->user()->role == 'pemtrantibum' || auth()->user()->role == 'struktural' ) {
            if ($request->input('rw') != null) {
                $ktp = Ktp::where('rw_id', $request->rw)
                ->where('village_id', '=', auth()->user()->village_id)
                ->orderBy('rt_id', 'asc');
            }else {
                $ktp = Ktp::select('ktp.*')
                ->where('village_id', '=', auth()->user()->village_id)
                ->orderby('rt_id', 'asc');
            }

            if ($request->input('rt') != null) {
                $ktp = Ktp::where('rt_id', $request->rt)
                ->where('village_id', '=', auth()->user()->village_id)
                ->where('rw_id', $request->rw);
            }
        }

        return DataTables::eloquent($ktp)
            ->addIndexColumn()
            ->addColumn('rt', function ($ktp) {
                return $ktp->rt->rt;
            })
            ->addColumn('rw', function ($ktp) {
                return $ktp->rw->rw;
            })
            ->addColumn('agama', function ($ktp) {
                return $ktp->agama->agama;
            })
            ->addColumn('statuskawin', function ($ktp) {
                return $ktp->statuskawin->statuskawin;
            })
            ->addColumn('jeniskelamin', function ($ktp) {
                return $ktp->jeniskelamin->jeniskelamin;
            })
            ->addColumn('hubkeluarga', function ($ktp) {
                return $ktp->hubkeluarga->hubkeluarga;
            })
            ->addColumn('pekerjaan', function ($ktp) {
                return $ktp->pekerjaan->pekerjaan;
            })
            ->addColumn('province', function ($ktp) {
                return $ktp->province->name;
            })
            ->addColumn('regency', function ($ktp) {
                return $ktp->regency->name;
            })
            ->addColumn('district', function ($ktp) {
                return $ktp->district->name;
            })
            ->addColumn('village', function ($ktp) {
                return $ktp->village->name;
            })

            ->addColumn('edit', function ($ktp) {
                if (auth()->user()->role != "struktural" ) {
                    return '<a href="ktp/' . $ktp->id . '/edit" class="btn btn-warning" title="Edit">
                <i class="fas fa-edit"></i></a>';
                }
            })

            ->addColumn('hapus', function ($ktp) {
                if (auth()->user()->role == "superadmin") {
                    return '<a href="#" class="btn btn-danger deletektp"
                data-id="' . $ktp->id . '"
                data-nama="' . $ktp->nama . '">
                <i class="fas fa-trash"></i></a>';
                }
            })

            ->rawColumns([
                'rt', 'rw', 'statuskawin', 'jeniskelamin', 'agama',
                'province', 'regency', 'district', 'village', 'hubkeluarga', 'pekerjaan', 'edit', 'hapus'
            ])
            ->toJson();
    }
}
