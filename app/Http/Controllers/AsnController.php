<?php

namespace App\Http\Controllers;

use App\Models\Asn;
use Illuminate\Http\Request;
use App\Models\Statuskawin;
use App\Models\Pendidikan;
use App\Models\Jeniskelamin;
use App\Models\Agama;
use App\Models\Jabatan;
use App\Models\Golongan;
use App\Models\Pangkat;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\kelbekasi;
use App\Models\kecbekasi;
use Illuminate\Support\Facades\Auth;

class AsnController extends Controller
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
        $agama = Agama::all();
        $jeniskelamin = Jeniskelamin::all();
        $statuskawin = Statuskawin::all();
        $pendidikan = Pendidikan::all();
        $jabatan = Jabatan::all();
        $pangkat = Pangkat::all();
        $golongan = Golongan::all();
        $asn = Asn::all();
        // Get semua data 
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();
        $villages = Village::all();
        $kelbekasi = kelbekasi::all();

        return view(
            'sekret.asn.index',
            compact(
                'agama',
                'jeniskelamin',
                'statuskawin',
                'pendidikan',
                'pangkat',
                'golongan',
                'jabatan',
                'asn',
                'provinces',
                'regencies',
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
        $agama = Agama::all();
        $jeniskelamin = Jeniskelamin::all();
        $pendidikan = Pendidikan::all();
        $statuskawin = Statuskawin::all();
        $jabatan = Jabatan::all();
        $pangkat = Pangkat::all();
        $golongan = Golongan::all();
        $asn = Asn::all();
        // Get semua data 
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();
        $villages = Village::all();

        return view(
            'sekret.asn.index',
            compact(
                'agama',
                'jeniskelamin',
                'pendidikan',
                'statuskawin',
                'jabatan',
                'pangkat',
                'golongan',
                'asn',
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
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate(
            [
                'id' => 'required|size:18|unique:asn,id',
                'NIK' => 'required|size:16',
                'nama' => 'required',
                'pangkat_id' => 'required',
                'golongan_id' => 'required',
                'jabatan_id' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'jeniskelamin_id' => 'required',
                'alamat' => 'required',
                'agama_id' => 'required',
                'pendidikan_id' => 'required',
                'statuskawin_id' => 'required',
                'tipe_pns' => 'required',
                'foto' => 'required|max:1024',
            ],
            [
                'id.required' => 'Harus di Isi Yaa',
                'id.unique' => 'NIP Sudah Digunakan',
                'NIK.required' => 'Harus di Isi Yaa',
                'nama.required' => 'Harus di Isi Yaa',
                'pangkat_id.required' => 'Harus di Isi Yaa',
                'golongan_id.required' => 'Harus di Isi Yaa',
                'jabatan_id.required' => 'Harus di Isi Yaa',
                'tempat_lahir.required' => 'Harus di Isi Yaa',
                'tanggal_lahir.required' => 'Harus di Isi Yaa',
                'jeniskelamin_id.required' => 'Harus di Isi Yaa',
                'alamat.required' => 'Harus di Isi Yaa',
                'agama_id.required' => 'Harus di Isi Yaa',
                'pendidikan_id.required' => 'Harus di Isi Yaa',
                'statuskawin_id.required' => 'Harus di Isi Yaa',
                'tipe_pns.required' => 'Harus di Isi Yaa',
                'foto.required' => 'Upload Foto Pegawai',
            ]
        );
        $imgName = $request->foto->getClientOriginalName() . '-' . time()
            . '.' . $request->foto->extension();
        $request->foto->move('images/Asn/', $imgName);

        Asn::create([
            'id' => $request->id,
            'NIK' => $request->NIK,
            'nama' => $request->nama,
            'pangkat_id' => $request->pangkat_id,
            'golongan_id' => $request->golongan_id,
            'jabatan_id' => $request->jabatan_id,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jeniskelamin_id' => $request->jeniskelamin_id,
            'alamat' => $request->alamat,
            'agama_id' => $request->agama_id,
            'pendidikan_id' => $request->pendidikan_id,
            'statuskawin_id' => $request->statuskawin_id,
            'SK_Jabatan' => $request->SK_Jabatan,
            'no_rek' => $request->no_rek,
            'npwp' => $request->npwp,
            'email' => $request->email,
            'no_HP' => $request->no_HP,
            'district_id' => Auth::user()->district_id,
            'village_id' => Auth::user()->village_id,
            'tipe_pns' => $request->tipe_pns,
            'foto' => $imgName,
        ]);

        //Asn::create($request->all());
        return redirect('/asn')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asn  $asn
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agama = Agama::all();
        $jeniskelamin = Jeniskelamin::all();
        $statuskawin = Statuskawin::all();
        $pendidikan = Pendidikan::all();
        $jabatan = Jabatan::all();
        $pangkat = Pangkat::all();
        $golongan = Golongan::all();
        $asn = Asn::all();
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();
        $villages = Village::all();
        $kelbekasi = kelbekasi::all();

        $asn = Asn::find($id);
        return view(
            'sekret.asn.view',
            compact(
                'agama',
                'jeniskelamin',
                'statuskawin',
                'pendidikan',
                'pangkat',
                'golongan',
                'jabatan',
                'asn',
                'provinces',
                'regencies',
                'districts',
                'villages',
            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asn  $asn
     * @return \Illuminate\Http\Response
     */
    public function edit(Asn $asn)
    {
        // $asn = Asn::all();
        $agama = Agama::all();
        $jeniskelamin = Jeniskelamin::all();
        $pendidikan = Pendidikan::all();
        $statuskawin = Statuskawin::all();
        $jabatan = Jabatan::all();
        $pangkat = Pangkat::all();
        $golongan = Golongan::all();
        // Get semua data 
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();
        $villages = Village::all();
        $kelbekasi = kelbekasi::all();
        $kecbekasi = kecbekasi::all();

        return view(
            'sekret.asn.edit',
            compact(
                'asn',
                'agama',
                'jeniskelamin',
                'pendidikan',
                'statuskawin',
                'jabatan',
                'pangkat',
                'golongan',
                'provinces',
                'regencies',
                'districts',
                'villages',
                'kelbekasi',
                'kecbekasi'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asn  $asn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asn $asn)
    {
        //dd($request->all());
        $request->validate(
            [
                // 'id' => 'required|size:18',
                'NIK' => 'required|size:16',
                'nama' => 'required',
                'pangkat_id' => 'required',
                'golongan_id' => 'required',
                'jabatan_id' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'jeniskelamin_id' => 'required',
                'alamat' => 'required',
                'agama_id' => 'required',
                'pendidikan_id' => 'required',
                'statuskawin_id' => 'required',
                'SK_Jabatan' => 'required',
                'tipe_pns' => 'required',
                'foto' => 'max:1024',
            ],
            [
                // 'id.required' => 'NIP Pegawai Negeri Sipil',
                'NIK.required' => 'Harus di Isi Yaa',
                'nama.required' => 'Harus di Isi Yaa',
                'pangkat_id.required' => 'Harus di Isi Yaa',
                'golongan_id.required' => 'Harus di Isi Yaa',
                'jabatan_id.required' => 'Harus di Isi Yaa',
                'tempat_lahir.required' => 'Harus di Isi Yaa',
                'tanggal_lahir.required' => 'Harus di Isi Yaa',
                'jeniskelamin_id.required' => 'Harus di Isi Yaa',
                'alamat.required' => 'Harus di Isi Yaa',
                'agama_id.required' => 'Harus di Isi Yaa',
                'pendidikan_id.required' => 'Harus di Isi Yaa',
                'statuskawin_id.required' => 'Harus di Isi Yaa',
                'tipe_pns.required' => 'Harus di Isi Yaa',
            ]
        );

        Asn::where('id', $asn->id)
            ->update([
                // 'id' => $request->id,
                'NIK' => $request->NIK,
                'nama' => $request->nama,
                'pangkat_id' => $request->pangkat_id,
                'golongan_id' => $request->golongan_id,
                'jabatan_id' => $request->jabatan_id,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jeniskelamin_id' => $request->jeniskelamin_id,
                'alamat' => $request->alamat,
                'agama_id' => $request->agama_id,
                'pendidikan_id' => $request->pendidikan_id,
                'statuskawin_id' => $request->statuskawin_id,
                'SK_Jabatan' => $request->SK_Jabatan,
                'no_rek' => $request->no_rek,
                'npwp' => $request->npwp,
                'email' => $request->email,
                'no_HP' => $request->no_HP,
                'district_id' => $request->district_id,
                'village_id' => $request->village_id,
                'tipe_pns' => $request->tipe_pns,
                // 'foto' => $request->foto
            ]);


        if ($request->hasFile('foto')) {
            $request->file('foto')->move('images/Asn/', $request->file('foto')->getClientOriginalName());
            $asn->foto = $request->file('foto')->getClientOriginalName();
            $asn->save();
        }

        return redirect('/asn')->with('success', 'Data Berhasil Di Update!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asn  $asn
     * @return \Illuminate\Http\Response
     */
    public function destroyasn($id, Asn $asn)
    {
        $asn = Asn::find($id);
        $asn->delete();
        return redirect('/asn');
    }

    public function getdataasn(Request $request)
    {
        if (auth()->user()->role == 'superadmin') {            
            if ($request->input('asnkel') != null) {
                $asn = Asn::where('village_id', $request->asnkel);
            }else {
                $asn = Asn::select('asn.*')->orderBy('jabatan_id', 'asc');
            }

            if ($request->input('jabatanasn') != null) {
                $asn = Asn::where('jabatan_id', $request->jabatanasn)->where('village_id', $request->asnkel);
            }
        }

        if (auth()->user()->role == 'sekret' || auth()->user()->role == 'stuktural') {
            if ($request->input('jabatanasn') != null) {
                $asn = Asn::where('jabatan_id', $request->jabatanasn)->where('village_id', $request->asnkel);
            } else
            $asn = Asn::select('asn.*')
            ->where('village_id', '=', auth()->user()->village_id)
            ->orderBy('jabatan_id', 'asc');
        }

        return DataTables::eloquent($asn)
            ->addIndexColumn()
            ->addColumn('agama', function ($asn) {
                return $asn->agama->agama;
            })
            ->addColumn('pangkat', function ($asn) {
                return $asn->pangkat->pangkat;
            })
            ->addColumn('golongan', function ($asn) {
                return $asn->golongan->golongan;
            })
            ->addColumn('statuskawin', function ($asn) {
                return $asn->statuskawin->statuskawin;
            })
            ->addColumn('jeniskelamin', function ($asn) {
                return $asn->jeniskelamin->jeniskelamin;
            })
            ->addColumn('pendidikan', function ($asn) {
                return $asn->pendidikan->pendidikan;
            })
            ->addColumn('jabatan', function ($asn) {
                return $asn->jabatan->jabatan;
            })
            ->addColumn('district', function ($asn) {
                return $asn->district->name;
            })
            ->addColumn('village', function ($asn) {
                return $asn->village->name;
            })

            ->addColumn('edit', function ($asn) {
                if (auth()->user()->role == "superadmin" || auth()->user()->role == "sekret") {
                    return '<a href="asn/' . $asn->id . '/edit" class="btn btn-warning" title="Edit">
                <i class="fas fa-edit"></i></a>';
                }
            })

            ->addColumn('view', function ($asn) {
                return '<a href="#" class="btn btn-primary viewasn" data-id="' . $asn->id . '">
                <i class="fas fa-eye"></i></a>';
            })

            ->addColumn('hapus', function ($asn) {
                if (auth()->user()->role == "superadmin" || auth()->user()->role == "sekret") {
                    return '<a href="#" class="btn btn-danger destroyasn"
                data-id="' . $asn->id . '"
                data-nama="' . $asn->nama . '">
                <i class="fas fa-trash"></i></a>';
                }
            })

            ->rawColumns([
                'statuskawin', 'jeniskelamin', 'agama', 'jabatan', 'pangkat', 'golongan',
                'pendidikan', 'edit', 'view', 'hapus', 'province', 'regency', 'district', 'village',
            ])
            ->toJson();
    }

    public function trashasn()
    {
        $agama = Agama::all();
        $jeniskelamin = Jeniskelamin::all();
        $statuskawin = Statuskawin::all();
        $pendidikan = Pendidikan::all();
        $jabatan = Jabatan::all();
        $pangkat = Pangkat::all();
        $golongan = Golongan::all();
        $asn = Asn::all();
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();
        $villages = Village::all();
        $kelbekasi = kelbekasi::all();

        $asn = Asn::onlyTrashed()->get();
        return view(
            'sekret.asn.trash',
            compact(
                'agama',
                'jeniskelamin',
                'statuskawin',
                'pendidikan',
                'pangkat',
                'golongan',
                'jabatan',
                'asn',
                'provinces',
                'regencies',
                'districts',
                'villages',
                'kelbekasi',
            )
        );
    }

    public function gettrashdataasn(Request $request)
    {
        $asn = Asn::onlyTrashed();
        return DataTables::eloquent($asn)
            ->addIndexColumn()
            ->addColumn('agama', function ($asn) {
                return $asn->agama->agama;
            })
            ->addColumn('pangkat', function ($asn) {
                return $asn->pangkat->pangkat;
            })
            ->addColumn('golongan', function ($asn) {
                return $asn->golongan->golongan;
            })
            ->addColumn('statuskawin', function ($asn) {
                return $asn->statuskawin->statuskawin;
            })
            ->addColumn('jeniskelamin', function ($asn) {
                return $asn->jeniskelamin->jeniskelamin;
            })
            ->addColumn('pendidikan', function ($asn) {
                return $asn->pendidikan->pendidikan;
            })
            ->addColumn('jabatan', function ($asn) {
                return $asn->jabatan->jabatan;
            })
            ->addColumn('district', function ($asn) {
                return $asn->district->name;
            })
            ->addColumn('village', function ($asn) {
                return $asn->village->name;
            })

            ->addColumn('restore', function ($asn) {
                if (auth()->user()->role == "superadmin" || auth()->user()->role == "strukturalsekret") {
                    return '<a href="/restoreasn/' . $asn->id . '" class="btn btn-warning" title="Restore">
                <i class="fas fa-undo"></i></a>';
                }
            })

            ->addColumn('delete', function ($asn) {
                if (auth()->user()->role == "superadmin" || auth()->user()->role == "strukturalsekret") {
                    return '<a href="#" class="btn btn-danger deleteasn"
                data-id="' . $asn->id . '"
                data-nama="' . $asn->nama . '">
                <i class="fas fa-trash"></i></a>';
                }
            })

            ->rawColumns([
                'statuskawin', 'jeniskelamin', 'agama', 'jabatan', 'pangkat', 'golongan',
                'pendidikan', 'restore', 'delete', 'province', 'regency', 'district', 'village',
            ])
            ->toJson();
    }

    public function deleteasn($id = null)
    {
        if($id != null) {
            $asn = Asn::onlyTrashed()->where('id', $id)->forceDelete(); 
        } else {
            $asn = Asn::onlyTrashed()->forceDelete();
        }
        return redirect('/asn')->with('success', 'Data Berhasil dihapus Permanent!');
    }

    public function restoreasn($id = null)
    {
        if($id != null) {
            $asn = Asn::onlyTrashed()->where('id', $id)->restore(); 
        } else {
        $asn = Asn::onlyTrashed()->restore();
        }
        return redirect('/asn')->with('success', 'Data Berhasil direstore!');
    }
}
