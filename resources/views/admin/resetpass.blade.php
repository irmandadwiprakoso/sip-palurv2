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
                    <div class="row mb-2">

                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Reset Password User</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                            <form action="/password/update" method="post">
                                    @method('patch')
                                    @csrf
                                <div class="card-body">
                                <form>
                                    <div class="row">

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="old_password">Old Password</label>
                                                <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" id="old_password">
                                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                                @error('old_password') <div class="invalid-feedback">{{ $message }} </div>@enderror  
                                            </div>
                                        </div>
                                        

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="password">New Password</label>
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                                @error('password') <div class="invalid-feedback">{{ $message }} </div>@enderror  
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="password_confirmation">Confirmed Password</label>
                                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation">
                                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                                @error('password_confirmation') <div class="invalid-feedback">{{ $message }} </div>@enderror  
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <a class="btn btn-default" href="/dashboard" role="button">Close</a>
                                                <button type="submit" class="btn btn-success">Change Password</button>
                                            </div>
                                        </div>
                                    
                                    </div>
                                </form>
                            </div>
            </section>
            <!-- /.content -->
        </div>
        @include('master.csidebar')
        @include('master.footer')
        @include('master.script')
</body>
</html>
