<?php

namespace App\Http\Controllers;

use App\Models\Tkk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\Rw;
use App\Models\Statuskawin;
use App\Models\Pendidikan;
use App\Models\Jeniskelamin;
use App\Models\Agama;
use App\Models\Jabatan;
use App\Models\Seksi;
use App\Models\kelbekasi;
use App\Models\kecbekasi;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class TkkController extends Controller
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
        $rw = Rw::all();
        $pendidikan = Pendidikan::all();
        $seksi = Seksi::all();
        $jabatan = Jabatan::all();
        // Get semua data 
        $districts = District::all();
        $villages = Village::all();
        $tkk = Tkk::all();
        $kelbekasi = kelbekasi::all();

        return view(
            'sekret.tkk.index',
            compact(
                'agama',
                'jeniskelamin',
                'statuskawin',
                'rw',
                'pendidikan',
                'seksi',
                'jabatan',
                'districts',
                'villages',
                'tkk',
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
        $statuskawin = Statuskawin::all();
        $rw = Rw::all();
        $pendidikan = Pendidikan::all();
        $seksi = Seksi::all();
        $jabatan = Jabatan::all();
        // Get semua data 
        $districts = District::all();
        $villages = Village::all();

        return view(
            'sekret.tkk.index',
            compact(
                'agama',
                'jeniskelamin',
                'statuskawin',
                'rw',
                'pendidikan',
                'seksi',
                'jabatan',
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
        $request->validate(
            [
                'id' => 'required|size:16|unique:tkk,id',
                'nama' => 'required',
                'KK' => 'required|size:16',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'jeniskelamin_id' => 'required',
                'alamat' => 'required',
                'agama_id' => 'required',
                'pendidikan_id' => 'required',
                'statuskawin_id' => 'required',
                'seksi_id' => 'required',
                'jabatan_id' => 'required',
                'SK_Tkk' => 'required',
                'no_rek' => 'required',
                'npwp' => 'required',
                'email' => 'required',
                'no_HP' => 'required',
                // 'username' => 'required',
                'rw_id' => 'required',
                'foto' => 'required|max:1024',
            ],
            [
                'id.required' => 'Harus di Isi Yaa',
                'id.unique' => 'NIK Sudah Digunakan',
                'KK.required' => 'Harus di Isi Yaa',
                'nama.required' => 'Harus di Isi Yaa',
                'tempat_lahir.required' => 'Harus di Isi Yaa',
                'tanggal_lahir.required' => 'Harus di Isi Yaa',
                'jeniskelamin_id.required' => 'Harus di Isi Yaa',
                'alamat.required' => 'Harus di Isi Yaa',
                'agama_id.required' => 'Harus di Isi Yaa',
                'pendidikan_id.required' => 'Harus di Isi Yaa',
                'statuskawin_id.required' => 'Harus di Isi Yaa',
                'seksi_id.required' => 'Harus di Isi Yaa',
                'jabatan_id.required' => 'Harus di Isi Yaa',
                'SK_Tkk.required' => 'Harus di Isi Yaa',
                'no_rek.required' => 'Harus di Isi Yaa',
                'no_HP.required' => 'Harus di Isi Yaa',
                'npwp.required' => 'Harus di Isi Yaa',
                'email.required' => 'Harus di Isi Yaa',
                // 'username.required' => 'Harus di Isi Yaa',
                'rw_id.required' => 'Harus di Isi Yaa',
            ]
        );
        //INSERT TO TABLE USERS
        $user = new \App\Models\User;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->username = $request->id;
        $user->rw_id = $request->rw_id;
        $user->role = 'user';
        $user->password = bcrypt('kotabekasi');
        $user->remember_token = Str::random(60);
        $user->district_id = $request->district_id;
        $user->village_id = $request->village_id;
        $user->save();

        $request->request->add(['user_id' => $user->id]);

        $imgName = $request->foto->getClientOriginalName() . '-' . time()
            . '.' . $request->foto->extension();
        $request->foto->move('images/TKK/', $imgName);

        Tkk::create([
            'nama' => $request->nama,
            'id' => $request->id,
            'user_id' => $request->user_id,
            'KK' => $request->KK,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jeniskelamin_id' => $request->jeniskelamin_id,
            'alamat' => $request->alamat,
            'agama_id' => $request->agama_id,
            'pendidikan_id' => $request->pendidikan_id,
            'statuskawin_id' => $request->statuskawin_id,
            'seksi_id' => $request->seksi_id,
            'jabatan_id' => $request->jabatan_id,
            'SK_Tkk' => $request->SK_Tkk,
            'no_rek' => $request->no_rek,
            'npwp' => $request->npwp,
            'email' => $request->email,
            'no_HP' => $request->no_HP,
            'district_id' => $request->district_id,
            'village_id' => $request->village_id,
            'username' => $request->id,
            'rw_id' => $request->rw_id,
            'foto' => $imgName,
        ]);

        return redirect('/tkk')->with('success', 'Data Berhasil Ditambahkan!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tkk  $tkk
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agama = Agama::all();
        $jeniskelamin = Jeniskelamin::all();
        $statuskawin = Statuskawin::all();
        $rw = Rw::all();
        $pendidikan = Pendidikan::all();
        $seksi = Seksi::all();
        $jabatan = Jabatan::all();
        // Get semua data 
        $districts = District::all();
        $villages = Village::all();
        $tkk = Tkk::all();

        $tkk = Tkk::find($id);
        return view(
            'sekret.tkk.view',
            compact(
                'agama',
                'jeniskelamin',
                'statuskawin',
                'rw',
                'pendidikan',
                'seksi',
                'jabatan',
                'districts',
                'villages',
                'tkk'
            )
        );
    }

    public function profileuser()
    {
        return view(
            'sekret.tkk.profile'
        );
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tkk  $tkk
     * @return \Illuminate\Http\Response
     */
    public function edit(Tkk $tkk)
    {
        $agama = Agama::all();
        $jeniskelamin = Jeniskelamin::all();
        $statuskawin = Statuskawin::all();
        $rw = Rw::all();
        $pendidikan = Pendidikan::all();
        $seksi = Seksi::all();
        $jabatan = Jabatan::all();
        // Get semua data 
        $districts = District::all();
        $villages = Village::all();
        $kelbekasi = kelbekasi::all();
        $kecbekasi = kecbekasi::all();

        return view(
            'sekret.tkk.edit',
            compact(
                'agama',
                'jeniskelamin',
                'statuskawin',
                'rw',
                'pendidikan',
                'seksi',
                'jabatan',
                'districts',
                'villages',
                'tkk',
                'kelbekasi',
                'kecbekasi',
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tkk  $tkk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tkk $tkk)
    {
        $request->validate(
            [
                // 'id' => 'required|size:16|unique:tkk,id',
                'nama' => 'required',
                'KK' => 'required|size:16',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'jeniskelamin_id' => 'required',
                'alamat' => 'required',
                'agama_id' => 'required',
                'pendidikan_id' => 'required',
                'statuskawin_id' => 'required',
                'seksi_id' => 'required',
                'jabatan_id' => 'required',
                'SK_Tkk' => 'required',
                'no_rek' => 'required',
                'npwp' => 'required',
                'email' => 'required',
                'no_HP' => 'required',
                'rw_id' => 'required'
            ],
            [
                // 'id.required' => 'Wajib 16 Digit NIK e-KTP',
                'id.unique' => 'NIK Sudah Digunakan yaa',
                'KK.required' => 'Harus di Isi Yaa',
                'nama.required' => 'Harus di Isi Yaa',
                'tempat_lahir.required' => 'Harus di Isi Yaa',
                'tanggal_lahir.required' => 'Harus di Isi Yaa',
                'jeniskelamin_id.required' => 'Harus di Isi Yaa',
                'alamat.required' => 'Harus di Isi Yaa',
                'agama_id.required' => 'Harus di Isi Yaa',
                'pendidikan_id.required' => 'Harus di Isi Yaa',
                'statuskawin_id.required' => 'Harus di Isi Yaa',
                'seksi_id.required' => 'Harus di Isi Yaa',
                'jabatan_id.required' => 'Harus di Isi Yaa',
                'SK_Tkk.required' => 'Harus di Isi Yaa',
                'no_rek.required' => 'Harus di Isi Yaa',
                'no_HP.required' => 'Harus di Isi Yaa',
                'npwp.required' => 'Harus di Isi Yaa',
                'email.required' => 'Harus di Isi Yaa',
                'email.required' => 'Harus di Isi Yaa',
                'rw_id.required' => 'Harus di Isi Yaa',
            ]
        );

            Tkk::where('id', $tkk->id)
            ->update([
                // 'id' => $request->id,
                'KK' => $request->KK,
                'nama' => $request->nama,
                'username' => $request->username,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jeniskelamin_id' => $request->jeniskelamin_id,
                'alamat' => $request->alamat,
                'agama_id' => $request->agama_id,
                'pendidikan_id' => $request->pendidikan_id,
                'statuskawin_id' => $request->statuskawin_id,
                'seksi_id' => $request->seksi_id,
                'jabatan_id' => $request->jabatan_id,
                'SK_Tkk' => $request->SK_Tkk,
                'no_rek' => $request->no_rek,
                'npwp' => $request->npwp,
                'email' => $request->email,
                'no_HP' => $request->no_HP,
                'rw_id' => $request->rw_id,
                'district_id' => $request->district_id,
                'village_id' => $request->village_id,
                // 'foto' => $request->foto
            ]);

        if ($request->hasFile('foto')) {
            $request->file('foto')->move('images/TKK/', $request->file('foto')->getClientOriginalName());
            $tkk->foto = $request->file('foto')->getClientOriginalName();
            $tkk->save();
        }

        User::where('id', $tkk->user_id)
        ->update([
            'rw_id' => $request->rw_id,
            'email' => $request->email,
            'name' => $request->nama,
            'username' => $request->username,
            'district_id' => $request->district_id,
            'village_id' => $request->village_id,
        ]);

        return redirect('/tkk')->with('success', 'Data Berhasil Di Update!');
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tkk  $tkk
     * @return \Illuminate\Http\Response
     */
    public function destroytkk($id, Tkk $tkk)
    {
        $tkk = Tkk::find($id);
        $tkk->delete();
        return redirect('/tkk');
    }

    public function getdatatkk(Request $request)
    {
        if (auth()->user()->role == 'sekret' || auth()->user()->role == 'struktural') {
            $tkk = Tkk::select('tkk.*')
            ->where('village_id', '=', auth()->user()->village_id)
            ->orderBy('rw_id', 'asc');
        }

        if (auth()->user()->role == 'superadmin') {
            if ($request->input('tkkkel') != null) {
                $tkk = Tkk::where('village_id', $request->tkkkel)->orderBy('rw_id', 'asc');
            } else {
                $tkk = Tkk::select('tkk.*')->orderBy('rw_id', 'asc');
            }
        }

        return DataTables::eloquent($tkk)
            ->addIndexColumn()
            ->addColumn('rw', function ($tkk) {
                return $tkk->rw->rw;
            })
            ->addColumn('agama', function ($tkk) {
                return $tkk->agama->agama;
            })
            ->addColumn('statuskawin', function ($tkk) {
                return $tkk->statuskawin->statuskawin;
            })
            ->addColumn('jeniskelamin', function ($tkk) {
                return $tkk->jeniskelamin->jeniskelamin;
            })
            ->addColumn('pendidikan', function ($tkk) {
                return $tkk->pendidikan->pendidikan;
            })
            ->addColumn('jabatan', function ($tkk) {
                return $tkk->jabatan->jabatan;
            })
            ->addColumn('seksi', function ($tkk) {
                return $tkk->seksi->seksi;
            })
            ->addColumn('district', function ($tkk) {
                return $tkk->district->name;
            })
            ->addColumn('village', function ($tkk) {
                return $tkk->village->name;
            })

            ->addColumn('edit', function ($tkk) {
                if (auth()->user()->role == "superadmin" || auth()->user()->role == "sekret") {
                    return '<a href="tkk/' . $tkk->id . '/edit" class="btn btn-warning" title="Edit">
                <i class="fas fa-edit"></i></a>';
                }
            })

            ->addColumn('view', function ($tkk) {
                return '<a href="#" class="btn btn-primary viewtkk" data-id="' . $tkk->id . '">
                <i class="fas fa-eye"></i></a>';
            })

            ->addColumn('hapus', function ($tkk) {
                if (auth()->user()->role == "superadmin" || auth()->user()->role == "sekret") {
                    return '<a href="#" class="btn btn-danger destroytkk"
                data-id="' . $tkk->id . '"
                data-nama="' . $tkk->nama . '">
                <i class="fas fa-trash"></i></a>';
                }
            })

            ->rawColumns([
                'rw', 'statuskawin', 'jeniskelamin', 'agama', 'jabatan',
                'district', 'village', 'pendidikan', 'seksi', 'edit', 'view', 'hapus'
            ])
            ->toJson();
    }

    public function trashtkk()
    {
        $agama = Agama::all();
        $jeniskelamin = Jeniskelamin::all();
        $statuskawin = Statuskawin::all();
        $rw = Rw::all();
        $pendidikan = Pendidikan::all();
        $seksi = Seksi::all();
        $jabatan = Jabatan::all();
        // Get semua data 
        $districts = District::all();
        $villages = Village::all();
        $kelbekasi = kelbekasi::all();
        $tkk = Tkk::all();

        $tkk = Tkk::onlyTrashed()->get();
        return view(
            'sekret.tkk.trash',
            compact(
                'agama',
                'jeniskelamin',
                'statuskawin',
                'rw',
                'pendidikan',
                'seksi',
                'jabatan',
                'districts',
                'villages',
                'tkk',
                'kelbekasi'
            )
        );
    }

    public function gettrashdatatkk(Request $request)
    {
        $tkk = Tkk::onlyTrashed();
        return DataTables::eloquent($tkk)
            ->addIndexColumn()
            ->addColumn('rw', function ($tkk) {
                return $tkk->rw->rw;
            })
            ->addColumn('agama', function ($tkk) {
                return $tkk->agama->agama;
            })
            ->addColumn('statuskawin', function ($tkk) {
                return $tkk->statuskawin->statuskawin;
            })
            ->addColumn('jeniskelamin', function ($tkk) {
                return $tkk->jeniskelamin->jeniskelamin;
            })
            ->addColumn('pendidikan', function ($tkk) {
                return $tkk->pendidikan->pendidikan;
            })
            ->addColumn('jabatan', function ($tkk) {
                return $tkk->jabatan->jabatan;
            })
            ->addColumn('seksi', function ($tkk) {
                return $tkk->seksi->seksi;
            })
            ->addColumn('district', function ($tkk) {
                return $tkk->district->name;
            })
            ->addColumn('village', function ($tkk) {
                return $tkk->village->name;
            })

            ->addColumn('restore', function ($tkk) {
                if (auth()->user()->role == "superadmin" || auth()->user()->role == "sekret") {
                    return '<a href="/restoretkk/' . $tkk->id . '" class="btn btn-warning" title="Restore">
                <i class="fas fa-undo"></i></a>';
                }
            })

            ->addColumn('delete', function ($tkk) {
                if (auth()->user()->role == "superadmin" || auth()->user()->role == "sekret") {
                    return '<a href="#" class="btn btn-danger deletetkk"
                data-id="' . $tkk->id . '"
                data-nama="' . $tkk->nama . '">
                <i class="fas fa-trash"></i></a>';
                }
            })

            ->rawColumns([
                'rw', 'statuskawin', 'jeniskelamin', 'agama', 'jabatan',
                'district', 'village', 'pendidikan', 'seksi', 'restore', 'delete'
            ])
            ->toJson();
    }

    public function deletetkk($id = null)
    {
        if($id != null) {
            $tkk = Tkk::onlyTrashed()->where('id', $id)->forceDelete(); 
        } else {
            $tkk = Tkk::onlyTrashed()->forceDelete();
        }
        return redirect('/tkk')->with('success', 'Data Berhasil dihapus Permanent!');
    }

    public function restoretkk($id = null)
    {
        if($id != null) {
            $tkk = Tkk::onlyTrashed()->where('id', $id)->restore(); 
        } else {
        $tkk = Tkk::onlyTrashed()->restore();
        }
        return redirect('/tkk')->with('success', 'Data Berhasil direstore!');
    }
}
