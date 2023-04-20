<?php

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AsnController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FasosfasumController;
use App\Http\Controllers\KependudukanController;
use App\Http\Controllers\KsbrtController;
use App\Http\Controllers\KsbrwController;
use App\Http\Controllers\KtpController;
use App\Http\Controllers\LaporanharianController;
use App\Http\Controllers\LaporanpamorController;
use App\Http\Controllers\PbbController;
use App\Http\Controllers\PnsController;
use App\Http\Controllers\PosyanduController;
use App\Http\Controllers\SaranaibadahController;
use App\Http\Controllers\SaranakesehatanController;
use App\Http\Controllers\SaranapendidikanController;
use App\Http\Controllers\TkkController;
use App\Http\Controllers\DtksController;
use App\Http\Controllers\VaksinController;
use App\Http\Controllers\PkkController;
use App\Http\Controllers\PospinController;
use App\Http\Controllers\SiksController;
use App\Http\Controllers\DtksnondtksController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\DetekaesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/maintenance', function () {
    return view('admin.maintenance');
});

Route::get('/auth/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth/postlogin', [AuthController::class, 'postlogin'])->name('postlogin');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/maintenis', function () {
    return view('layout.maintenance');
});

Route::group(['middleware' => ['auth', 'checkrole:superadmin,struktural,user,sekret,permasbang,pemtrantibum,kessos']], function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard']);
    Route::get('/lockscreen', [AuthController::class, 'lockscreen']);
    Route::post('/lockscreen', [AuthController::class, 'lockscreen'])->name('lockscreen');
});

// USERS //
Route::group(['middleware' => ['auth', 'checkrole:superadmin']], function () {
    Route::resource('user', AuthController::class);
    Route::post('/getkabupaten', [AuthController::class, 'getkabupaten'])->name('getkabupaten');
    Route::post('/getkecamatan', [AuthController::class, 'getkecamatan'])->name('getkecamatan');
    Route::post('/getdesa', [AuthController::class, 'getdesa'])->name('getdesa');
    Route::get('/destroyuser/{id}', [AuthController::class, 'destroyuser'])->name('Destroyuser');
    Route::get('/getdatauser', [AuthController::class, 'getdatauser'])->name('datauser');

    Route::get('/user/{user}/changepassword', [AuthController::class, 'changepassword'])->name('changepassword');
    Route::patch('/user/{user}', [AuthController::class, 'updatepassword'])->name('updatepassword');
});   
 
// PROFILE USER //
Route::group(['middleware' => ['auth', 'checkrole:superadmin,user,struktural,sekret,permasbang,pemtrantibum,kessos']], function () {
    Route::get('/auth/profile', [TkkController::class, 'profileuser'])->name('profileuser');
    Route::get('/password/reset', [PasswordController::class,'reset'])->name('reset');
    Route::patch('/password/update', [PasswordController::class,'update'])->name('update');
});

// MENU KESSOS //
Route::group(['middleware' => ['auth', 'checkrole:superadmin,struktural,user,sekret,permasbang,pemtrantibum,kessos']], function () {
    //Saranaibadah//
    Route::resource('saranaibadah', SaranaibadahController::class);
    Route::post('/getkabupaten', [SaranaibadahController::class, 'getkabupaten'])->name('getkabupaten');
    Route::post('/getkecamatan', [SaranaibadahController::class, 'getkecamatan'])->name('getkecamatan');
    Route::post('/getdesa', [SaranaibadahController::class, 'getdesa'])->name('getdesa');
    Route::get('/destroysaranaibadah/{id}', [SaranaibadahController::class, 'destroysaranaibadah'])->name('DestroySaranaibadah');
    Route::get('/getdatasaranaibadah', [SaranaibadahController::class, 'getdatasaranaibadah'])->name('datasaranaibadah');

    //Saranapendidikan//
    Route::resource('saranapendidikan', SaranapendidikanController::class);
    Route::post('/getkabupaten', [SaranapendidikanController::class, 'getkabupaten'])->name('getkabupaten');
    Route::post('/getkecamatan', [SaranapendidikanController::class, 'getkecamatan'])->name('getkecamatan');
    Route::post('/getdesa', [SaranapendidikanController::class, 'getdesa'])->name('getdesa');
    Route::get('/destroysaranapendidikan/{id}', [SaranapendidikanController::class, 'destroysaranapendidikan'])->name('DestroySaranapendidikan');
    Route::get('/getdatasaranapendidikan', [SaranapendidikanController::class, 'getdatasaranapendidikan'])->name('datasaranapendidikan');
    
    //Saranakesehatan//
    Route::resource('saranakesehatan', SaranakesehatanController::class);
    Route::post('/getkabupaten', [SaranakesehatanController::class, 'getkabupaten'])->name('getkabupaten');
    Route::post('/getkecamatan', [SaranakesehatanController::class, 'getkecamatan'])->name('getkecamatan');
    Route::post('/getdesa', [SaranakesehatanController::class, 'getdesa'])->name('getdesa');
    Route::get('/destroysaranakesehatan/{id}', [SaranakesehatanController::class, 'destroysaranakesehatan'])->name('DestroySaranakesehatan');
    Route::get('/getdatasaranakesehatan', [SaranakesehatanController::class, 'getdatasaranakesehatan'])->name('datasaranakesehatan');

    //D T K S//
    Route::resource('detekaes', DetekaesController::class);
    Route::post('/getkabupaten', [DetekaesController::class, 'getkabupaten'])->name('getkabupaten');
    Route::post('/getkecamatan', [DetekaesController::class, 'getkecamatan'])->name('getkecamatan');
    Route::post('/getdesa', [DetekaesController::class, 'getdesa'])->name('getdesa');
    Route::get('/destroydetekaes/{id}', [DetekaesController::class, 'destroydetekaes'])->name('destroydetekaes');
    Route::get('/getdatadetekaes', [DetekaesController::class, 'getdatadetekaes'])->name('datadetekaes');
});

// MENU PEM TRANTIBUM //
Route::group(['middleware' => ['auth', 'checkrole:superadmin,struktural,user,sekret,permasbang,pemtrantibum,kessos']], function () {
    //KTP//
    Route::resource('ktp', KtpController::class);
    Route::post('/getkabupaten', [KtpController::class, 'getkabupaten'])->name('getkabupaten');
    Route::post('/getkecamatan', [KtpController::class, 'getkecamatan'])->name('getkecamatan');
    Route::post('/getdesa', [KtpController::class, 'getdesa'])->name('getdesa');
    Route::get('/destroyktp/{id}', [KtpController::class, 'destroyktp'])->name('DestroyKtp');
    Route::get('/getdataktp', [KtpController::class, 'getdataktp'])->name('dataktp');

    //KSB RT//
    Route::resource('ksbrt', KsbrtController::class);
    Route::post('/getkabupaten', [KsbrtController::class, 'getkabupaten'])->name('getkabupaten');
    Route::post('/getkecamatan', [KsbrtController::class, 'getkecamatan'])->name('getkecamatan');
    Route::post('/getdesa', [KsbrtController::class, 'getdesa'])->name('getdesa');
    Route::get('/destroyksbrt/{id}', [KsbrtController::class, 'destroyksbrt'])->name('Destroyksbrt');
    Route::get('/getdataksbrt', [KsbrtController::class, 'getdataksbrt'])->name('dataksbrt');

    //KSB RW//
    Route::resource('ksbrw', KsbrwController::class);
    Route::post('/getkabupaten', [KsbrwController::class, 'getkabupaten'])->name('getkabupaten');
    Route::post('/getkecamatan', [KsbrwController::class, 'getkecamatan'])->name('getkecamatan');
    Route::post('/getdesa', [KsbrwController::class, 'getdesa'])->name('getdesa');
    Route::get('/destroyksbrw/{id}', [KsbrwController::class, 'destroyksbrw'])->name('Destroyksbrw');
    Route::get('/getdataksbrw', [KsbrwController::class, 'getdataksbrw'])->name('dataksbrw');
});

// MENU SEKRETARIAT //
Route::group(['middleware' => ['auth', 'checkrole:superadmin,struktural,user,sekret,permasbang,pemtrantibum,kessos']], function () {
    //ASN//
    Route::resource('asn', AsnController::class);
    Route::post('/getkabupaten', [TkkController::class, 'getkabupaten'])->name('getkabupaten');
    Route::post('/getkecamatan', [TkkController::class, 'getkecamatan'])->name('getkecamatan');
    Route::post('/getdesa', [TkkController::class, 'getdesa'])->name('getdesa');
    Route::get('/destroyasn/{id}', [AsnController::class, 'destroyasn'])->name('destroyasn');
    Route::get('/getdataasn', [AsnController::class, 'getdataasn'])->name('dataasn');
    //View Restore Data ASN//
    Route::get('/trashasn', [AsnController::class, 'trashasn'])->name('trashasn');
    Route::get('/gettrashdataasn', [AsnController::class, 'gettrashdataasn'])->name('gettrashdataasn');
    //Restore dan Delete Permantent Data ASN//
    Route::get('/restoreasn/{id?}', [AsnController::class, 'restoreasn'])->name('restoreasn');
    Route::get('/deleteasn/{id?}', [AsnController::class, 'deleteasn'])->name('deleteasn');

    //TKK//
    Route::resource('tkk', TkkController::class);
    Route::post('/getkabupaten', [TkkController::class, 'getkabupaten'])->name('getkabupaten');
    Route::post('/getkecamatan', [TkkController::class, 'getkecamatan'])->name('getkecamatan');
    Route::post('/getdesa', [TkkController::class, 'getdesa'])->name('getdesa');
    Route::get('/destroytkk/{id}', [TkkController::class, 'destroytkk'])->name('destroytkk');
    Route::get('/getdatatkk', [TkkController::class, 'getdatatkk'])->name('datatkk');
    //View Restore Data TKK//
    Route::get('/trashtkk', [TkkController::class, 'trashtkk'])->name('trashtkk');
    Route::get('/gettrashdatatkk', [TkkController::class, 'gettrashdatatkk'])->name('gettrashdatatkk');
    //Restore dan Delete Permantent Data TKK//
    Route::get('/restoretkk/{id?}', [TkkController::class, 'restoretkk'])->name('restoretkk');
    Route::get('/deletetkk/{id?}', [TkkController::class, 'deletetkk'])->name('deletetkk');

    //Laporan Pamor//
    Route::resource('laporanpamor', LaporanpamorController::class);
    Route::get('/destroylaporanpamor/{id}', [LaporanpamorController::class, 'destroylaporanpamor'])->name('destroylaporanpamor');
    Route::get('/getdatalaporanpamor', [LaporanpamorController::class, 'getdatalaporanpamor'])->name('datalaporanpamor');
});

// MENU PERMASBANG //
Route::group(['middleware' => ['auth', 'checkrole:superadmin,struktural,user,sekret,permasbang,pemtrantibum,kessos']], function () {
    //PBB//
    Route::resource('pbb', PbbController::class);
    Route::post('/getkabupaten', [PbbController::class, 'getkabupaten'])->name('getkabupaten');
    Route::post('/getkecamatan', [PbbController::class, 'getkecamatan'])->name('getkecamatan');
    Route::post('/getdesa', [PbbController::class, 'getdesa'])->name('getdesa');
    Route::get('/destroypbb/{id}', [PbbController::class, 'destroypbb'])->name('destroypbb');
    Route::get('/getdatapbb', [PbbController::class, 'getdatapbb'])->name('datapbb');
    Route::get('/getdetaildatapbb', [PbbController::class, 'getdetaildatapbb'])->name('detaildatapbb');

    //FASOS FASUM//
    Route::resource('fasosfasum', FasosfasumController::class);
    Route::post('/getkabupaten', [FasosfasumController::class, 'getkabupaten'])->name('getkabupaten');
    Route::post('/getkecamatan', [FasosfasumController::class, 'getkecamatan'])->name('getkecamatan');
    Route::post('/getdesa', [FasosfasumController::class, 'getdesa'])->name('getdesa');
    Route::get('/destroyfasosfasum/{id}', [FasosfasumController::class, 'destroyfasosfasum'])->name('destroyfasosfasum');
    Route::get('/getdatafasosfasum', [FasosfasumController::class, 'getdatafasosfasum'])->name('datafasosfasum');

    //POSYANDU//
    Route::resource('posyandu', PosyanduController::class);
    Route::post('/getkabupaten', [PosyanduController::class, 'getkabupaten'])->name('getkabupaten');
    Route::post('/getkecamatan', [PosyanduController::class, 'getkecamatan'])->name('getkecamatan');
    Route::post('/getdesa', [PosyanduController::class, 'getdesa'])->name('getdesa');
    Route::get('/destroyposyandu/{id}', [PosyanduController::class, 'destroyposyandu'])->name('destroyposyandu');
    Route::get('/getdataposyandu', [PosyanduController::class, 'getdataposyandu'])->name('dataposyandu');
    
    //PKK//
    Route::resource('pkk', PkkController::class);
    Route::post('/getkabupaten', [PkkController::class, 'getkabupaten'])->name('getkabupaten');
    Route::post('/getkecamatan', [PkkController::class, 'getkecamatan'])->name('getkecamatan');
    Route::post('/getdesa', [PkkController::class, 'getdesa'])->name('getdesa');
    Route::get('/destroypkk/{id}', [PkkController::class, 'destroypkk'])->name('destroypkk');
    Route::get('/getdatapkk', [PkkController::class, 'getdatapkk'])->name('datapkk');

    //POSPIN//
    Route::resource('pospin', PospinController::class);
    Route::post('/getkabupaten', [PospinController::class, 'getkabupaten'])->name('getkabupaten');
    Route::post('/getkecamatan', [PospinController::class, 'getkecamatan'])->name('getkecamatan');
    Route::post('/getdesa', [PospinController::class, 'getdesa'])->name('getdesa');
    Route::get('/destroypospin/{id}', [PospinController::class, 'destroypospin'])->name('destroypospin');
    Route::get('/getdatapospin', [PospinController::class, 'getdatapospin'])->name('datapospin');
    
    //SIKS-NG//
    Route::resource('siks', SiksController::class);
    Route::post('/getkabupaten', [SiksController::class, 'getkabupaten'])->name('getkabupaten');
    Route::post('/getkecamatan', [SiksController::class, 'getkecamatan'])->name('getkecamatan');
    Route::post('/getdesa', [SiksController::class, 'getdesa'])->name('getdesa');
    Route::get('/destroysiks/{id}', [SiksController::class, 'destroysiks'])->name('destroysiks');
    Route::get('/getdatasiks', [SiksController::class, 'getdatasiks'])->name('datasiks');

});