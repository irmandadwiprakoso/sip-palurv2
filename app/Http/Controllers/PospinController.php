<?php

namespace App\Http\Controllers;

use App\Models\Pospin;
use App\Models\Ktp;
use App\Models\Rw;
use App\Models\Namaposyandu;
use App\Models\District;
use App\Models\Jeniskelamin;
use App\Models\Village;
use App\Models\kelbekasi;
use App\Charts\PospinChart;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class PospinController extends Controller
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

     public function index(PospinChart $chart)
     {
         $rw = Rw::all();
         $ktp = Ktp::all();
         $kelbekasi = kelbekasi::all();
         $jeniskelamin = Jeniskelamin::all();
         $namaposyandu = Namaposyandu::all();
         // Get semua data
         $districts = District::all();
         $villages = Village::all();
         $pospin = Pospin::all();


         return view('permasbang.pospin.index', 
         ['chart' => $chart->build()],
         
         compact(
             'rw',
             'ktp',
             'kelbekasi',
             'namaposyandu',
             'districts',
             'villages',
             'pospin',
             'jeniskelamin',
             'chart'
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
         $jeniskelamin = Jeniskelamin::all();
         $namaposyandu = Namaposyandu::all();
         // Get semua data
         $districts = District::all();
         $villages = Village::all();
 
         return view('permasbang.pospin.index', compact(
             'rw',
             'ktp',
             'kelbekasi',
             'namaposyandu',
             'districts',
             'villages',
             'jeniskelamin',
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
                 'id' => 'required|unique:pospin,id',
                 'nama_ortu' => 'required',
                 'namaposyandu_id' => 'required',    
             ],
             [
                 'id.required' => 'Harus di Isi Yaa',
                 'id.unique' => 'id Sudah Digunakan',
                 'nama_ortu.required' => 'Harus di Isi Yaa',
                 'namaposyandu_id.required' => 'Harus di Isi Yaa',
             ]
         );
         Pospin::create([
             'id' => $request->id,
             'nama' => $request->nama,
             'tgl_lahir' => $request->tgl_lahir,
             'jeniskelamin_id' => $request->jeniskelamin_id,
             'namaposyandu_id' => $request->namaposyandu_id,
             'nama_ortu' => $request->nama_ortu,
             'pin_1' => $request->pin_1,
             'pin_2' => $request->pin_2,
             'rw_id' => Auth::user()->rw_id,
             'district_id' => Auth::user()->district_id,
             'village_id' => Auth::user()->village_id,
         ]);
         // Pospin::create($request->all());
         return redirect('/pospin')->with('success', 'Data Berhasil Ditambahkan!');
     }
 
     /**
      * Display the specified resource.
      *
      * @param  \App\Models\Pospin  $pospin
      * @return \Illuminate\Http\Response
      */
     public function show($id)
     {
         $rw = Rw::all();
         $ktp = Ktp::all();
         $kelbekasi = kelbekasi::all();
         $jeniskelamin = Jeniskelamin::all();
         $namaposyandu = Namaposyandu::all();
         // Get semua data
         $districts = District::all();
         $villages = Village::all();
         $pospin = Pospin::find($id);
 
         return view('permasbang.pospin.view', compact(
             'rw',
             'ktp',
             'kelbekasi',
             'namaposyandu',
             'districts',
             'villages',
             'jeniskelamin',
             'pospin',
         ));
     }
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\Models\Pospin  $pospin
      * @return \Illuminate\Http\Response
      */
     public function edit(Pospin $pospin)
     {
         $ktp = Ktp::all();
         $rw = Rw::all();
         $kelbekasi = kelbekasi::all();
         $jeniskelamin = Jeniskelamin::all();
         $namaposyandu = Namaposyandu::all();
         // Get semua data
         $districts = District::all();
         $villages = Village::all();
 
         return view('permasbang.pospin.edit', compact(
             'rw',
             'ktp',
             'kelbekasi',
             'namaposyandu',
             'districts',
             'villages',
             'pospin',
             'jeniskelamin',
         ));
     }
 
     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\Models\Pospin  $pospin
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, Pospin $pospin)
     {
    //   dd($request->all());   
         $request->validate([
             // 'id' => 'required',
             'namaposyandu_id' => 'required',
             'pin_1' => 'required',      
             'pin_2' => 'required',      
         ]);
 
         Pospin::where('id', $pospin->id)
             ->update([
                //  'id' => $request->id,
                 'nama' => $request->nama,
                 'tgl_lahir' => $request->tgl_lahir,
                 'jeniskelamin_id' => $request->jeniskelamin_id,
                 'namaposyandu_id' => $request->namaposyandu_id,
                 'nama_ortu' => $request->nama_ortu,
                 'pin_1' => $request->pin_1,
                 'pin_2' => $request->pin_2,
             ]);
 
         return redirect('/pospin')->with('success', 'Data Berhasil Di Update!');
     }
 
     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\Models\Pospin  $pospin
      * @return \Illuminate\Http\Response
      */
     public function destroypospin($id, Pospin $pospin)
     {
         $pospin = Pospin::find($id);
         $pospin->delete();
         return redirect('/pospin');
     }
 
     public function getdatapospin(Request $request)
     {
         if (auth()->user()->role == 'superadmin') {
             if ($request->input('pospinkel') != null) {
                 $pospin = Pospin::where('village_id', $request->pospinkel)->orderBy('rw_id', 'asc');
             } else {
                 $pospin = Pospin::select('pospin.*')->orderBy('rw_id', 'asc');
             }
             if ($request->input('rwpospin') != null) {
                 $pospin = Pospin::where('village_id', $request->pospinkel)
                 ->where('rw_id', $request->rwpospin);
             }
             if ($request->input('posyandupin') != null) {
                 $pospin = Pospin::where('village_id', $request->pospinkel)
                 ->where('rw_id', $request->rwpospin)
                 ->where('saranakeseahtan_id', $request->posyandupin);
             }
         }
         
         if (auth()->user()->role == 'user') {
                 $pospin = Pospin::where('rw_id', '=', auth()->user()->rw_id)
                 ->where('village_id', '=', auth()->user()->village_id);
         }
 
         if (auth()->user()->role == 'permasbang' || auth()->user()->role == 'struktural' ) {
             if ($request->input('rwpospin') != null) {
                 $pospin = Pospin::where('rw_id', $request->rwpospin)
                 ->where('village_id', '=', auth()->user()->village_id);
             }else {
                 $pospin = Pospin::select('pospin.*')
                 ->where('village_id', '=', auth()->user()->village_id);
             }
         }
 
         return DataTables::eloquent($pospin)
             ->addIndexColumn()
             ->addColumn('jeniskelamin', function ($pospin) {
                 return $pospin->jeniskelamin->jeniskelamin;
             })
             ->addColumn('namaposyandu', function ($pospin) {
                 return $pospin->namaposyandu->nama;
             })
             ->addColumn('rw', function ($pospin) {
                 return $pospin->rw->rw;
             })
             ->addColumn('district', function ($pospin) {
                 return $pospin->district->name;
             })
             ->addColumn('village', function ($pospin) {
                 return $pospin->village->name;
             })
 
             ->addColumn('edit', function ($pospin) {
                 if (auth()->user()->role == "superadmin" || auth()->user()->role == "permasbang" ||
                 auth()->user()->role == "user") {
                     return '<a href="pospin/' . $pospin->id . '/edit" class="btn btn-warning" title="Edit">
                 <i class="fas fa-edit"></i></a>';
                 }
             })
 
             ->addColumn('view', function ($pospin) {
                 return '<a href="#" class="btn btn-primary viewpospin" data-id="' . $pospin->id . '">
                 <i class="fas fa-eye"></i></a>';
             })
 
             ->addColumn('hapus', function ($pospin) {
                 if (auth()->user()->role == "superadmin" || auth()->user()->role == "permasbang" ||
                 auth()->user()->role == "user" ) {
                     return '<a href="#" class="btn btn-danger deletepospin"
                 data-id="' . $pospin->id . '"
                 data-nama="' . $pospin->nama . '">
                 <i class="fas fa-trash"></i></a>';
                 }
             })
 
             ->rawColumns([
             'rw', 
             'jeniskelamin', 
             'village', 
             'district', 
             'namaposyandu', 
             'edit', 
             'view', 
             'hapus'
             ])
             ->toJson();
     }
 }
 