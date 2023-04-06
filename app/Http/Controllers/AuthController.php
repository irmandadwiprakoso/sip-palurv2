<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\Rw;
use App\Models\kelbekasi;
use App\Models\Tkk;
use App\Models\Asn;
use App\Models\Covid19;
use App\Models\Fasosfasum;
use App\Models\Ksbrt;
use App\Models\Ksbrw;
use App\Models\Ktp;
use App\Models\Pbb;
use App\Models\Posyandu;
use App\Models\Saranaibadah;
use App\Models\Saranapendidikan;
use App\Models\Saranakesehatan;
use Yajra\DataTables\Facades\DataTables;

class AuthController extends Controller
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

    public function login()
    {
        return view('admin.login');
    }

    public function dashboard()
    {
        $user = User::all();
        $tkk = Tkk::all();
        $asn = Asn::all();
        $pbb = Pbb::all();
        $saranaibadah = Saranaibadah::all();
        $saranapendidikan = Saranapendidikan::all();
        $saranakesehatan = Saranakesehatan::all();
        $ksbrt = Ksbrt::all();
        $ksbrw = Ksbrw::all();
        $ktp = Ktp::all();
        $fasosfasum = Fasosfasum::all();

        // Get semua data 
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();
        $villages = Village::all();
        $kelbekasi = kelbekasi::all();

        return view('admin.dashboard', compact (
            'provinces',
            'regencies',
            'districts',
            'villages',
            'tkk',
            'user', 
            'asn',
            'pbb',
            'fasosfasum',
            'saranaibadah',
            'saranapendidikan',
            'saranakesehatan',
            'ksbrt',
            'ksbrw',
            'ktp',
        ));
    }

    public function lockscreen()
    {
        return view('admin.lockscreen');
    }

    public function postlockscreen(Request $request)
    {
        if(Auth::attempt($request->only('password'))) {
            // dd('sip');
            return redirect('/dashboard')->with('success', 'Ehh Kamu Balik Lagi :D');
        }
        // dd('no');
        return redirect('/lockscreeen')->with('error', 'Password kamu salah!');
    }

    public function postlogin(Request $request)
    {
        // dd($request->all());
        if(Auth::attempt($request->only('username','password'))) {
            // dd('sip');
            return redirect('/dashboard')->with('success', 'Haii :)');
        }
        // dd('no');
        return redirect('/auth/login')->with('error', 'Username atau Password kamu salah!');
    } 

    public function logout()
    {
        Auth::logout();
        return redirect('/auth/login')->with('success', 'Berhasil Logout!');
    }

    public function index()
    {
        $user = User::all();
        $tkk = Tkk::all();
        // Get semua data 
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();
        $villages = Village::all();
        $kelbekasi = kelbekasi::all();
        $rw = Rw::all();

        return view(
            'admin.user',
            compact(
                'rw',
                'provinces',
                'regencies',
                'districts',
                'villages',
                'user',
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
        // Get semua data 
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();
        $villages = Village::all();
        $rw = Rw::all();

        return view(
            'admin.user',
            compact(
                'rw',
                'provinces',
                'regencies',
                'districts',
                'villages',
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
            'name' => 'required',
            'username' => 'required',
            'role' => 'required',
            'email' => 'required',
        ],
        [
            'name.required' => 'Harus Di isi yaa',
            'username.required' => 'Harus Di isi yaa',
            'role.required' => 'Harus Di isi yaa',
            'email.required' => 'Harus Di isi yaa',
        ]
    );
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt ('kotabekasi'),
            'remember_token' => Str::random(60),
            'district_id' => $request->district_id,
            'village_id' => $request->village_id,
            'rw_id' => '100',
        ]);

        return redirect('/user')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get semua data 
        $districts = District::all();
        $villages = Village::all();
        $rw = Rw::all();
        $user = User::all();
        $tkk = Tkk::all();

        $user = User::find($id);
        return view(
            'admin.view',
            compact(
                'rw',
                'districts',
                'villages',
                'user',
            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
////////////////////////////////////////////////////////////////////////////////////////////////
    public function changepassword(User $user)
    {
        return view ('admin.reset', compact('user'));
    }

    public function updatepassword(Request $request, User $user)
    {
        //($request->all());
        // $request->validate([
        //     'password' => 'required',
        // ]);

        User::where('id', $user->id)
        ->update([
            'password' => bcrypt ('kotabekasi'),
            'remember_token' => Str::random(60),
        ]);
        return redirect('/user')->with('success', 'Password User Berhasil Direset!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroyuser($id, User $user)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/user');
    }

    public function getdatauser(Request $request)
    {
        if ($request->input('userkel') != null) {
            $user = User::where('village_id', $request->userkel)->orderBy('rw_id', 'asc');
        } else {
            $user = User::select('users.*')->orderBy('rw_id', 'asc');
        }

        return DataTables::eloquent($user)
            ->addIndexColumn()
            ->addColumn('rw', function ($user) {
                return $user->rw->rw;
            })
            ->addColumn('district', function ($user) {
                return $user->district->name;
            })
            ->addColumn('village', function ($user) {
                return $user->village->name;
            })

            ->addColumn('reset', function ($user) {
                return '<a href="user/' . $user->id . '/changepassword" class="btn btn-warning" title="Edit">
                <i class="fas fa-edit"></i></a>';
            })

            ->addColumn('view', function ($user) {
                return '<a href="#" class="btn btn-primary viewuser" data-id="' . $user->id . '">
                <i class="fas fa-eye"></i></a>';
            })
 
            ->addColumn('hapus', function ($user) {
                return '<a href="#" class="btn btn-danger deleteuser"
                data-id="' . $user->id . '"
                data-nama="' . $user->name . '">
                <i class="fas fa-trash"></i></a>';
            })

            ->rawColumns([
                'rw', 'district', 'village', 'view', 'hapus', 'reset'
            ])
            ->toJson();
    }

}
