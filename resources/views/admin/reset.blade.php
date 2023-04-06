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
                                    <h3 class="card-title">Reset Password USER</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                            <form action="/user/{{ $user->id }}" method="post">
                                    @method('patch')
                                    @csrf
                                <div class="card-body">
                                <form>
                                    <div class="row">

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="nama" class="form-label">Anda akan Reset Password:</label>
                                                <input type="text" disabled readonly
                                                    class="form-control" id="nama" value="{{ $user->name }}">
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                            <a class="btn btn-default" href="/user" role="button">Close</a>
                                            <button type="submit" class="btn btn-success">Reset Password</button>
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
