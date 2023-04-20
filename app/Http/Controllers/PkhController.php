<?php

namespace App\Http\Controllers;

use App\Models\Pkh;
use App\Models\Ktp;
use App\Models\Rt;
use App\Models\Rw;
use App\Models\Statusdtks;
use App\Models\District;
use App\Models\Village;
use App\Models\kelbekasi;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class PkhController extends Controller
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
         $rt = Rt::all();
         $rw = Rw::all();
         $ktp = Ktp::all();
         $kelbekasi = kelbekasi::all();
         $statusdtks = Statusdtks::all();
         // Get semua data
         $districts = District::all();
         $villages = Village::all();
         $pkh = Pkh::all();

         return view('kessos.pkh.index',
         compact(
             'rt',
             'rw',
             'ktp',
             'kelbekasi',
             'statusdtks',
             'districts',
             'villages',
             'pkh',
         ));
     }

 
     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         $rw = Rw::all();
         $rt = Rt::all();
         $ktp = Ktp::all();
         $kelbekasi = kelbekasi::all();
         $statusdtks = Statusdtks::all();
         // Get semua data
         $districts = District::all();
         $villages = Village::all();
 
         return view('kessos.pkh.index', compact(
             'rt',
             'rw',
             'ktp',
             'kelbekasi',
             'statusdtks',
             'districts',
             'villages',
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
        //  dd($request->all());
         $request->validate(
             [
                 'ktp_id' => 'required|unique:pkh,ktp_id',
                 'keterangan' => 'required',
                 'statusdtks_id' => 'required',    
             ],
             [
                 'ktp_id.required' => 'Harus di Isi Yaa',
                 'ktp_id.unique' => 'NIK Sudah Digunakan',
                 'keterangan.required' => 'Harus di Isi Yaa',
                 'statusdtks_id.required' => 'Harus di Isi Yaa',
             ]
         );
         Pkh::create([
             'ktp_id' => $request->ktp_id,
             'statusdtks_id' => $request->statusdtks_id,
             'keterangan' => $request->keterangan,
             'rt_id' => $request->rt_id,
             'rw_id' => Auth::user()->rw_id,
             'district_id' => Auth::user()->district_id,
             'village_id' => Auth::user()->village_id,
         ]);
         // Pkh::create($request->all());
         return redirect('/pkh')->with('success', 'Data Berhasil Ditambahkan!');
     }
 
     /**
      * Display the specified resource.
      *
      * @param  \App\Models\Pkh  $pkh
      * @return \Illuminate\Http\Response
      */
     public function show($id)
     {
         $rw = Rw::all();
         $rt = Rt::all();
         $ktp = Ktp::all();
         $kelbekasi = kelbekasi::all();
         $statusdtks = Statusdtks::all();
         // Get semua data
         $districts = District::all();
         $villages = Village::all();
         $pkh = Pkh::find($id);
 
         return view('kessos.pkh.view', compact(
             'rw',
             'rt',
             'ktp',
             'kelbekasi',
             'statusdtks',
             'districts',
             'villages',
             'pkh',
         ));
     }
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\Models\Pkh  $pkh
      * @return \Illuminate\Http\Response
      */
     public function edit(Pkh $pkh)
     {
         $ktp = Ktp::all();
         $rw = Rw::all();
         $rt = Rt::all();
         $kelbekasi = kelbekasi::all();
         $statusdtks = Statusdtks::all();
         // Get semua data
         $districts = District::all();
         $villages = Village::all();
 
         return view('kessos.pkh.edit', compact(
             'rt',
             'rw',
             'ktp',
             'kelbekasi',
             'statusdtks',
             'districts',
             'villages',
             'pkh',
         ));
     }
 
     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\Models\Pkh  $pkh
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, Pkh $pkh)
     {
     //  dd($request->all());   
         $request->validate([
             // 'ktp_id' => 'required',
             'statusdtks_id' => 'required',     
         ]);
 
         Pkh::where('id', $pkh->id)
             ->update([
                 'ktp_id' => $request->ktp_id,
                 'statusdtks_id' => $request->statusdtks_id,
                 'keterangan' => $request->keterangan,
             ]);
 
         return redirect('/pkh')->with('success', 'Data Berhasil Di Update!');
     }
 
     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\Models\Pkh  $pkh
      * @return \Illuminate\Http\Response
      */
     public function destroypkh($id, Pkh $pkh)
     {
         $pkh = Pkh::find($id);
         $pkh->delete();
         return redirect('/pkh');
     }
 
     public function getdatapkh(Request $request)
     {
         if (auth()->user()->role == 'superadmin') {
             if ($request->input('pkhkel') != null) {
                 $pkh = Pkh::where('village_id', $request->pkhkel)->orderBy('rw_id', 'asc');
             } else {
                 $pkh = Pkh::select('pkh.*')->orderBy('rw_id', 'asc');
             }
             if ($request->input('rwpkh') != null) {
                 $pkh = Pkh::where('village_id', $request->pkhkel)
                 ->where('rw_id', $request->rwpkh);
             }
             if ($request->input('posyandupin') != null) {
                 $pkh = Pkh::where('village_id', $request->pkhkel)
                 ->where('rw_id', $request->rwpkh)
                 ->where('saranakeseahtan_id', $request->posyandupin);
             }
         }
         
         if (auth()->user()->role == 'user') {
             if ($request->input('rtpkh') != null) {
                 $pkh = Pkh::where('rt_id', $request->rtpkh)
                 ->where('village_id', '=', auth()->user()->village_id)
                 ->where('rw_id', '=', auth()->user()->rw_id);
             }else {
                 $pkh = Pkh::where('rw_id', '=', auth()->user()->rw_id)
                 ->where('village_id', '=', auth()->user()->village_id);
             }
         }
 
         if (auth()->user()->role == 'kessos' || auth()->user()->role == 'struktural' ) {
             if ($request->input('rwpkh') != null) {
                 $pkh = Pkh::where('rw_id', $request->rwpkh)
                 ->where('village_id', '=', auth()->user()->village_id);
             }else {
                 $pkh = Pkh::select('pkh.*')
                 ->where('village_id', '=', auth()->user()->village_id)
                 ->orderby('rt_id', 'asc');
             }
         }
 
         return DataTables::eloquent($pkh)
             ->addIndexColumn()
             ->addColumn('nama_ktp', function ($pkh) {
                 return $pkh->ktp->nama;
             })
             ->addColumn('alamat_ktp', function ($pkh) {
                 return $pkh->ktp->alamat;
             })
             ->addColumn('statusdtks', function ($pkh) {
                 return $pkh->statusdtks->statusdtks;
             })
             ->addColumn('rt', function ($pkh) {
                 return $pkh->rt->rt;
             })
             ->addColumn('rw', function ($pkh) {
                 return $pkh->rw->rw;
             })
             ->addColumn('district', function ($pkh) {
                 return $pkh->district->name;
             })
             ->addColumn('village', function ($pkh) {
                 return $pkh->village->name;
             })
 
             ->addColumn('edit', function ($pkh) {
                 if (auth()->user()->role == "superadmin" || auth()->user()->role == "kessos" ||
                 auth()->user()->role == "user") {
                     return '<a href="pkh/' . $pkh->id . '/edit" class="btn btn-warning" title="Edit">
                 <i class="fas fa-edit"></i></a>';
                 }
             })
 
             ->addColumn('view', function ($pkh) {
                 return '<a href="#" class="btn btn-primary viewpkh" data-id="' . $pkh->id . '">
                 <i class="fas fa-eye"></i></a>';
             })
 
             ->addColumn('hapus', function ($pkh) {
                 if (auth()->user()->role == "superadmin" || auth()->user()->role == "kessos" ||
                 auth()->user()->role == "user" ) {
                     return '<a href="#" class="btn btn-danger deletepkh"
                 data-id="' . $pkh->id . '"
                 data-nama="' . $pkh->ktp->nama . '">
                 <i class="fas fa-trash"></i></a>';
                 }
             })
 
             ->rawColumns([
             'rt', 
             'rw', 
             'ktp', 
             'nama_ktp', 
             'alamat_ktp', 
             'statusdtks', 
             'village', 
             'district', 
             'statusdtks', 
             'edit', 
             'view', 
             'hapus'
             ])
             ->toJson();
     }
 }
 