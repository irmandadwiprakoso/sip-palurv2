<!DOCTYPE html>
<html lang="en">

<head>
    @include ('master.header')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        @include('master.navbar')
        @include('master.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
            <!-- Button Tambah Data -->    
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default">
                                <i class="fas fa-plus-square"></i> Add Data 
                        </button>
                        </div>
                    </div>
            <!-- Filter Data --> 
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Filter Data User</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="row">            
                                        <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="filter-userkel" class="form-label">Kelurahan</label>
                                            <select class="form-control filter" id="filter-userkel" name="filter-userkel">
                                                <option value="">-- Pilih Kelurahan --</option>
                                                @foreach ($kelbekasi as $kelbekasi)
                                                    <option value="{{ $kelbekasi->id }}">{{ $kelbekasi->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>									
                </div>									
                
                <!-- Detail Data --> 
                    <div class="row">
                        <div class="col-lg-3 col-3">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{$user->count()}}</h3>
                                    <p>Jumlah User</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-thin fa-user-plus"></i>
                                </div>
                            </div>
                        </div>															
                        <div class="col-lg-3 col-3">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{$user->where('role', '=', 'superadmin')->count()}}</h3>
                                    <p> Superadmin</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-thin fa-user-plus"></i>
                                </div>
                            </div>
                        </div>	
                        <div class="col-lg-3 col-3">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{$user->where('role', '=', 'struktural')->count()}}</h3>
                                    <p> Struktural</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-thin fa-user-plus"></i>
                                </div>
                            </div>
                        </div>															
                        <div class="col-lg-3 col-3">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{$user->where('role', '=', 'user')->count()}}</h3>
                                    <p> User</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-thin fa-user-plus"></i>
                                </div>
                            </div>
                        </div>															
                        <div class="col-lg-3 col-3">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{$user->where('role', '=', 'sekret')->count()}}</h3>
                                    <p> Admin Sekret</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-thin fa-user-plus"></i>
                                </div>
                            </div>
                        </div>															
                        <div class="col-lg-3 col-3">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{$user->where('role', '=', 'permasbang')->count()}}</h3>
                                    <p> Admin Permasbang</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-thin fa-user-plus"></i>
                                </div>
                            </div>
                        </div>															
                        <div class="col-lg-3 col-3">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{$user->where('role', '=', 'kessos')->count()}}</h3>
                                    <p> Admin Kessos</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-thin fa-user-plus"></i>
                                </div>
                            </div>
                        </div>															
                        <div class="col-lg-3 col-3">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{$user->where('role', '=', 'pemtrantibum')->count()}}</h3>
                                    <p> Admin PemTrantibum</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-thin fa-user-plus"></i>
                                </div>
                            </div>
                        </div>															
														
                </div>															
                								
<!-- Main content / Tampilan Data -->
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Data User</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="datauser" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">RW</th>
                                    <th scope="col">Kecamatan</th>
                                    <th scope="col">Kelurahan</th>
                                    <th scope="col">Reset Password</th>
                                    <!-- <th scope="col">Detail</th> -->
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
   
        @include('master.csidebar')
        @include('master.footer')
        @include('master.script')

<!--------------Modal Create User------------------------->
<form action="/user" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Data User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Nama</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                            placeholder="Nama User" name="name">
                                        @error('name') <div class="alert alert-danger">{{ $message }} </div>
                                        @enderror
                                    </div>
                                    </div>

                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control @error('username') is-invalid @enderror"
                                            id="username" placeholder="username" name="username">
                                        @error('username') <div class="alert alert-danger">{{ $message }}
                                        </div>@enderror
                                    </div>
                                    </div>
        
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                        <label for="role" class="form-label">-- Tipe User --</label>
                                        <select class="form-control @error('role') is-invalid @enderror" id="role" name="role">
                                            <option selected disabled>- Select -</option>
                                            <option value="struktural">Struktural</option>
                                            <option value="kessos">Kessos</option>
                                            <option value="sekret">Sekret</option>
                                            <option value="permasbang">Permasbang</option>
                                            <option value="pemtrantibum">PemTrantibum</option>
                                        </select>
                                        @error('role') <div class="alert alert-danger">{{ $message }} </div>
                                        @enderror
                                    </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Email" name="email">
                                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                        @error('email') <div class="alert alert-danger">{{ $message }} </div>
                                        @enderror
                                    </div> 
                                    </div> 

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                                <label for="provinsi">Provinsi</label>
                                                <select class="form-control @error('province_id') is-invalid @enderror"
                                                    id="provinsi" name="province_id" value="{{ old('province_id') }}">
                                                    <option selected disabled>- Pilih Provinsi-</option>
                                                    @foreach ($provinces as $provinsi)
                                                        <option value="{{ $provinsi->id }}">{{ $provinsi->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('province_id') <div class="alert alert-danger">{{ $message }}
                                                </div>@enderror
                                            </div>
                                            </div>

                                        <div class="col-sm-6">
                                        <div class="form-group">
                                                <label for="kabupaten">Kota/Kabupaten</label>
                                                <select class="form-control @error('regency_id') is-invalid @enderror"
                                                    id="kabupaten" name="regency_id" value="{{ old('regency_id') }}">
                                                    <option selected disabled>- Pilih Kota/Kabupaten-</option>
                                                    @foreach ($regencies as $kabupaten)
                                                        <option value="{{ $kabupaten->id }}">{{ $kabupaten->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('regency_id') <div class="alert alert-danger">{{ $message }}
                                                </div>@enderror
                                            </div>
                                            </div>

                                <div class="col-sm-6">
                                <div class="form-group">
                                        <label for="kecamatan">Kecamatan</label>
                                        <select class="form-control @error('district_id') is-invalid @enderror"
                                            id="kecamatan" name="district_id" value="{{ old('district_id') }}">
                                            <option selected disabled>- Pilih Kecamatan-</option>
                                            @foreach ($districts as $kecamatan)
                                                <option value="{{ $kecamatan->id }}">{{ $kecamatan->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('district_id') <div class="alert alert-danger">{{ $message }}
                                        </div>@enderror
                                    </div>
                                    </div>

                                <div class="col-sm-6">
                                <div class="form-group">
                                        <label for="desa">Desa/Kelurahan</label>
                                        <select class="form-control @error('village_id') is-invalid @enderror"
                                            id="desa" name="village_id" value="{{ old('village_id') }}">
                                            <option selected disabled>- Pilih Desa/Kelurahan-</option>
                                            @foreach ($villages as $desa)
                                                <option value="{{ $desa->id }}">{{ $desa->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('village_id') <div class="alert alert-danger">{{ $message }}
                                        </div>@enderror
                                    </div>	
                                    </div> 

                                </div>
                            </form>
                        </div>  
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
    <!-- /.endmodal -->
</form>

<!--------------Modal View User------------------------->
    <div class="modal fade" id="modal-view">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail Data User </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
  
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
    <!-- /.endmodal -->
</body>
</html>

