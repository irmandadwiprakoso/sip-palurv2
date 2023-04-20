<?php

namespace App\Http\Controllers;

use App\Models\Siks;
use App\Models\Ktp;
use App\Models\Rw;
use App\Models\Rt;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\kelbekasi;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class SiksController extends Controller
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
         $rw = Rw::all();
         $ktp = Ktp::all();
         $kelbekasi = kelbekasi::all();
         $rt = Rt::all();
         // Get semua data
         $districts = District::all();
         $villages = Village::all();
         $siks = Siks::all(); 

         return view('permasbang.siks.index', 
         compact(
             'rw',
             'ktp',
             'kelbekasi',
             'rt',
             'districts',
             'villages',
             'siks',
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
         $ktp = Ktp::all();
         $kelbekasi = kelbekasi::all();
         $rt = Rt::all();
         // Get semua data
         $districts = District::all();
         $villages = Village::all();
 
         return view('permasbang.siks.index', compact(
             'rw',
             'ktp',
             'kelbekasi',
             'rt',
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
                 'ktp_id' => 'required|unique:siks,ktp_id',  
             ],
             [
                 'ktp_id.required' => 'Harus di Isi Yaa',
                 'ktp_id.unique' => 'NIK Sudah Digunakan',
             ]
         );
         Siks::create([
             'ktp_id' => $request->ktp_id,
             'pbi' => $request->pbi,
             'non_bansos' => $request->non_bansos,
             'bpnt' => $request->bpnt,
             'pkh' => $request->pkh,
             'keterangan' => $request->keterangan,
             'rt_id' => $request->rt_id,
             'rw_id' => Auth::user()->rw_id,
             'district_id' => Auth::user()->district_id,
             'village_id' => Auth::user()->village_id,
         ]);
         // Siks::create($request->all());
         return redirect('/siks')->with('success', 'Data Berhasil Ditambahkan!');
     }
 
     /**
      * Display the specified resource.
      *
      * @param  \App\Models\Siks  $siks
      * @return \Illuminate\Http\Response
      */
     public function show($id)
     {
         $rw = Rw::all();
         $ktp = Ktp::all();
         $kelbekasi = kelbekasi::all();
         $rt = Rt::all();
         // Get semua data
         $districts = District::all();
         $villages = Village::all();
         $siks = Siks::find($id);
         
         return view('permasbang.siks.view', compact(
             'rw',
             'ktp',
             'kelbekasi',
             'rt',
             'districts',
             'villages',
             'siks',
         ));
     }
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\Models\Siks  $siks
      * @return \Illuminate\Http\Response
      */
     public function edit($id, Siks $siks)
     {

         dd($siks);
         $ktp = Ktp::all();
         $rw = Rw::all();
         $rt = Rt::all();
         // Get semua data
         $districts = District::all();
         $villages = Village::all();

         return view('permasbang.siks.edit', compact(
             'siks',
             'rw',
             'ktp',
             'rt',
             'districts',
             'villages',
         ));
     }
 
     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\Models\Siks  $siks
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, Siks $siks)
     {
         $request->validate([
             'ktp_id' => 'required',
             'rt_id' => 'required',      
             'keterangan' => 'required',      
         ]);
 
         Siks::where('id', $siks->id)
             ->update([
                 'ktp_id' => $request->ktp_id,
                 'rt_id' => $request->rt_id,
                 'bpnt' => $request->bpnt,
                 'pkh' => $request->pkh,
                 'pbi' => $request->pbi,
                 'non_bansos' => $request->non_bansos,
                 'keterangan' => $request->keterangan,
             ]);
    //   dd($request->all()); 

         return redirect('/siks')->with('success', 'Data Berhasil Di Update!');
     }
 
     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\Models\Siks  $siks
      * @return \Illuminate\Http\Response
      */
     public function destroysiks($id, Siks $siks)
     {
         $siks = Siks::find($id);
         $siks->delete();
         return redirect('/siks');
     }
 
     public function getdatasiks(Request $request)
     {
         if (auth()->user()->role == 'superadmin') {
             if ($request->input('sikskel') != null) {
                 $siks = Siks::where('village_id', $request->sikskel)->orderBy('rw_id', 'asc');
             } else {
                 $siks = Siks::select('siks.*')->orderBy('rw_id', 'asc');
             }
             if ($request->input('rwsiks') != null) {
                 $siks = Siks::where('village_id', $request->sikskel)
                 ->where('rw_id', $request->rwsiks);
             }
             if ($request->input('posyandupin') != null) {
                 $siks = Siks::where('village_id', $request->sikskel)
                 ->where('rw_id', $request->rwsiks)
                 ->where('saranakeseahtan_id', $request->posyandupin);
             }
         }
         
         if (auth()->user()->role == 'user') {
             if ($request->input('rtsiks') != null) {
                 $siks = Siks::where('rt_id', $request->rtsiks)
                 ->where('village_id', '=', auth()->user()->village_id)
                 ->where('rw_id', '=', auth()->user()->rw_id);
             }else {
                 $siks = Siks::where('rw_id', '=', auth()->user()->rw_id)
                 ->where('village_id', '=', auth()->user()->village_id);
             }
         }
 
         if (auth()->user()->role == 'permasbang' || auth()->user()->role == 'struktural' ) {
             if ($request->input('rwsiks') != null) {
                 $siks = Siks::where('rw_id', $request->rwsiks)
                 ->where('village_id', '=', auth()->user()->village_id);
             }else {
                 $siks = Siks::select('siks.*')
                 ->where('village_id', '=', auth()->user()->village_id)
                 ->orderby('rt_id', 'asc');
             }
         }
 
         return DataTables::eloquent($siks)
             ->addIndexColumn()
             ->addColumn('nama_ktp', function ($siks) {
                 return $siks->ktp->nama;
             })
             ->addColumn('rt', function ($siks) {
                 return $siks->rt->rt;
             })
             ->addColumn('rw', function ($siks) {
                 return $siks->rw->rw;
             })
             ->addColumn('district', function ($siks) {
                 return $siks->district->name;
             })
             ->addColumn('village', function ($siks) {
                 return $siks->village->name;
             })
 
             ->addColumn('edit', function ($siks) {
                 if (auth()->user()->role == "superadmin" || auth()->user()->role == "permasbang" ||
                 auth()->user()->role == "user") {
                     return '<a href="siks/' . $siks->id . '/edit" class="btn btn-warning" title="Edit">
                 <i class="fas fa-edit"></i></a>';
                 }
             })
 
             ->addColumn('view', function ($siks) {
                 return '<a href="#" class="btn btn-primary viewsiks" data-id="' . $siks->id . '">
                 <i class="fas fa-eye"></i></a>';
             })
 
             ->addColumn('hapus', function ($siks) {
                 if (auth()->user()->role == "superadmin" || auth()->user()->role == "permasbang" ||
                 auth()->user()->role == "user" ) {
                     return '<a href="#" class="btn btn-danger deletesiks"
                 data-id="' . $siks->id . '"
                 data-nama="' . $siks->ktp->nama . '">
                 <i class="fas fa-trash"></i></a>';
                 }
             })
 
             ->rawColumns([
             'rt', 
             'rw', 
             'nama_ktp',  
             'village', 
             'district', 
             'edit', 
             'view', 
             'hapus'
             ])
             ->toJson();
     }
 }
 