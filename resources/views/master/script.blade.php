<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- assets App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.3/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.3/js/buttons.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.3/js/buttons.colVis.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.3/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.3/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.4.0/js/responsive.bootstrap4.js"></script>
<!-- Toastr -->
<script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

<!-- IndoRegion -->
<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(function() {
            $('#provinsi').on('change', function() {
                let id_provinsi = $('#provinsi').val();
                console.log(id_provinsi);

                $.ajax({
                    type: 'POST',
                    url: "{{ route('getkabupaten') }}",
                    data: {
                        id_provinsi: id_provinsi
                    },
                    cache: false,

                    success: function(msg) {
                        $('#kabupaten').html(msg);
                        $('#kecamatan').html('');
                        $('#desa').html('');
                    },
                    error: function(data) {
                        console.log('error:', data);
                    },
                })
            })

            $('#kabupaten').on('change', function() {
                let id_kabupaten = $('#kabupaten').val();

                $.ajax({
                    type: 'POST',
                    url: "{{ route('getkecamatan') }}",
                    data: {
                        id_kabupaten: id_kabupaten
                    },
                    cache: false,

                    success: function(msg) {
                        $('#kecamatan').html(msg);
                        $('#desa').html('');
                    },
                    error: function(data) {
                        console.log('error:', data);
                    },
                })
            })

            $('#kecamatan').on('change', function() {
                let id_kecamatan = $('#kecamatan').val();

                $.ajax({
                    type: 'POST',
                    url: "{{ route('getdesa') }}",
                    data: {
                        id_kecamatan: id_kecamatan
                    },
                    cache: false,

                    success: function(msg) {
                        $('#desa').html(msg);
                    },
                    error: function(data) {
                        console.log('error:', data);
                    },
                })
            })
        })
    });

</script>

<!-- Toastr -->
<script>
@if (Session::has('success'))
    toastr.success( "{{ Session::get('success') }}")
@endif
</script>

<!----------------------------------------------- PEM TRANTIBUM---------------------------->
<!-- DataTables KSB RT-->
<script>
    let rwksbrt = $("#filter-rwksbrt").val()
        ,rtksbrt = $("#filter-rtksbrt").val()
        ,ksbrtkel = $("#filter-ksbrtkel").val()

    $(document).ready(function() {
        var table = $('#dataksbrt').DataTable({
            processing:true,
            serverSide:true,            
            responsive: true,
            autoWidth: false,
            paging: true,
            lengthChange: true,
            info: true,
            buttons: ['copy', 'csv', 'print', 'colvis'],           
            dom: 
                "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row'<'col-md-5'i><'col-md-7'p>>",
                lengthMenu:[
                    [5,10,25,50,100,-1],
                    [5,10,25,50,100,"All"]
                ],
            ajax: {
                url : "{{'getdataksbrt'}}",
                data:function(d){
                d.rwksbrt = rwksbrt;
                d.rtksbrt = rtksbrt;
                d.ksbrtkel = ksbrtkel;
                return d               
                }
            },
            columns:[
                {data:'DT_RowIndex', name:'DT_RowIndex', orderable: false, searchable: false},
                {data:'ktp_id', name:'ktp_id'},
                {data:'ksbrt', name:'ksbrt'},
                {data:'jabatan', name:'jabatan'},
                {data:'rt', name:'rt'},
                {data:'rw', name:'rw'},
                {data:'village', name:'village'},
                {data:'edit', name:'edit', orderable: false, searchable: false},
                {data:'view', name:'view', orderable: false, searchable: false},
                {data:'hapus', name:'hapus', orderable: false, searchable: false},
                {data:'no_sk', name:'no_sk'},
                {data:'tmt_mulai', name:'tmt_mulai'},
                {data:'tmt_akhir', name:'tmt_akhir'},
                {data:'no_rek', name:'no_rek'},
                {data:'npwp', name:'npwp'},
                {data:'no_hp', name:'no_hp'},
                ],
        })

        table.buttons().container()
            .appendTo( '#dataksbrt_wrapper .col-md-6:e(0)' 
        );

            $(".filter").on('change', function() { 
                rwksbrt = $("#filter-rwksbrt").val()
                rtksbrt = $("#filter-rtksbrt").val()
                ksbrtkel = $("#filter-ksbrtkel").val()
                table.ajax.reload(null, false);            
            })
    })

    $(document).on('click', '.viewksbrt', function(){
        console.log($(this).data('id'))
        let id = $(this).data('id')
        $.ajax({
            url:`/ksbrt/${id}`,
            method:"GET",
            success:function(data){
                console.log(data)
                $('#modal-view').find('.modal-body').html(data)
                $('#modal-view').modal('show')
            },
            error:function(error){
                console.log(error)
            }
        })
    })
</script>

<!--SweetAlert2 KSB RT -->
<script>
    $(document).on('click', '.deleteksbrt', function() {
        var id = $(this).attr('data-id')
        var namaid = $(this).attr('data-nama')

        Swal.fire({
            title: 'Yakin di Hapus?',
            text: "Kamu Akan Ngapus Data KSB RT : " + namaid + " ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Apus Aja!',
            cancelButtonText: 'Gajadi!',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/destroyksbrt/" + id + ""
                Swal.fire(
                    'Ahsyiappp!',
                    'Datanya Udah Keapus!',
                    'success'
                )
            }
        })
    })

</script>

<!-- DataTables KSB RW-->
<script>
    let ksbrwkel = $("#filter-ksbrwkel").val()
        ,rwksbrw = $("#filter-rwksbrw").val()

    $(document).ready(function() {
        var table = $('#dataksbrw').DataTable({
            processing:true,
            serverSide:true,            
            responsive: true,
            autoWidth: false,
            paging: true,
            lengthChange: true,
            info: true,
            buttons: ['copy', 'csv', 'excel', 'print', 'colvis'],           
            dom: 
                "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row'<'col-md-5'i><'col-md-7'p>>",
                lengthMenu:[
                    [5,10,25,50,100,-1],
                    [5,10,25,50,100,"All"]
                ],
            ajax: {
                url : "{{'getdataksbrw'}}",
                data:function(d){
                d.ksbrwkel = ksbrwkel;
                d.rwksbrw = rwksbrw;
                return d               
                }
            },
            columns:[
                {data:'DT_RowIndex', name:'DT_RowIndex', orderable: false, searchable: false},
                {data:'ksbrw', name:'ksbrw'},
                {data:'ktp_id', name:'ktp_id'},
                {data:'jabatan', name:'jabatan'},
                {data:'rw', name:'rw'},
                {data:'village', name:'village'},
                {data:'edit', name:'edit', orderable: false, searchable: false},
                {data:'view', name:'view', orderable: false, searchable: false},
                {data:'hapus', name:'hapus', orderable: false, searchable: false},
                {data:'no_sk', name:'no_sk'},
                {data:'tmt_mulai', name:'tmt_mulai'},
                {data:'tmt_akhir', name:'tmt_akhir'},
                {data:'no_rek', name:'no_rek'},
                {data:'npwp', name:'npwp'},
                {data:'no_hp', name:'no_hp'},
                ],
        })

        table.buttons().container()
            .appendTo( '#dataksbrw_wrapper .col-md-6:e(0)' 
        );

            $(".filter").on('change', function() { 
                ksbrwkel = $("#filter-ksbrwkel").val()
                rwksbrw = $("#filter-rwksbrw").val()
                table.ajax.reload(null, false);            
            })
    })

    $(document).on('click', '.viewksbrw', function(){
        console.log($(this).data('id'))
        let id = $(this).data('id')
        $.ajax({
            url:`/ksbrw/${id}`,
            method:"GET",
            success:function(data){
                console.log(data)
                $('#modal-view').find('.modal-body').html(data)
                $('#modal-view').modal('show')
            },
            error:function(error){
                console.log(error)
            }
        })
    })
</script>

<!--SweetAlert2 KSB RW -->
<script>
    $(document).on('click', '.deleteksbrw', function() {
        var id = $(this).attr('data-id')
        var namaid = $(this).attr('data-nama')

        Swal.fire({
            title: 'Yakin di Hapus?',
            text: "Kamu Akan Ngapus Data KSB RW : " + namaid + " ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Apus Aja!',
            cancelButtonText: 'Gajadi!',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/destroyksbrw/" + id + ""
                Swal.fire(
                    'Ahsyiappp!',
                    'Datanya Udah Keapus!',
                    'success'
                )
            }
        })
    })

</script>

<!--SweetAlert2 Data Total Kependudukan -->
<script>
    $(document).on('click', '.deletekependudukan', function() {
        var id = $(this).attr('data-id')
        var namart = $(this).attr('data-rt')
        var namarw = $(this).attr('data-pamor')

        Swal.fire({
            title: 'Yakin di Hapus?',
            text: "Kamu Akan Ngapus Data dari RT : " + namart + " ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Apus Aja!',
            cancelButtonText: 'Gajadi!',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/destroykependudukan/" + id + ""
                Swal.fire(
                    'Ahsyiappp!',
                    'Datanya Udah Keapus!',
                    'success'
                )
            }
        })
    })

</script>

<!-- DataTables KTP-->
<script>
    let rw = $("#filter-rw").val()
      ,rt = $("#filter-rt").val()
      ,kelktp = $("#filter-kelktp").val()

    $(document).ready(function() {
        var table = $('#dataktp').DataTable({
            processing:true,
            serverSide:true,            
            responsive: true,
            autoWidth: false,
            paging: true,
            lengthChange: true,
            ordering: true,
            info: true,
            buttons: ['copy', 'csv', 'excel', 'print', 'colvis'],           
            dom: 
                "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row'<'col-md-5'i><'col-md-7'p>>",
                lengthMenu:[
                    [5,10,25,50,100,-1],
                    [5,10,25,50,100,"All"]
                ],
            ajax: {
                url : "{{'getdataktp'}}",
                data:function(d){
                d.rt = rt;
                d.rw = rw;
                d.kelktp = kelktp;
                return d               
                }
            },
            columns:[
                {data:'DT_RowIndex', name:'DT_RowIndex', orderable: false, searchable: false},
                {data:'id', name:'id'},
                {data:'KK', name:'KK'},
                {data:'hubkeluarga', name:'hubkeluarga'},
                {data:'nama', name:'nama'},
                {data:'tempat_lahir', name:'tempat_lahir'},
                {data:'tanggal_lahir', name:'tanggal_lahir'},
                {data:'alamat', name:'alamat'},
                {data:'rt', name:'rt'},
                {data:'rw', name:'rw'},
                {data:'province', name:'province'},
                {data:'regency', name:'regency'},
                {data:'district', name:'district'},
                {data:'village', name:'village'},
                {data:'agama', name:'agama'},
                {data:'statuskawin', name:'statuskawin'},
                {data:'jeniskelamin', name:'jeniskelamin'},
                {data:'pekerjaan', name:'pekerjaan'},
                {data:'edit', name:'edit', orderable: false, searchable: false},
                {data:'hapus', name:'hapus', orderable: false, searchable: false}
                ],
        })

        table.buttons().container()
            .appendTo( '#dataktp_wrapper .col-md-6:e(0)' 
        );

            $(".filter").on('change', function() { 
                rw = $("#filter-rw").val()
                rt = $("#filter-rt").val()
                kelktp = $("#filter-kelktp").val()
                table.ajax.reload(null, false);            
            })
    })
</script>

<!--SweetAlert2 Delete KTP -->
<script>
    $(document).on('click', '.deletektp', function() {
        var id = $(this).attr('data-id')
        var namaid = $(this).attr('data-nama')

        Swal.fire({
            title: 'Yakin di Hapus?',
            text: "Kamu Akan Ngapus Data Dengan Nama : " + namaid + " ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Apus Aja!',
            cancelButtonText: 'Gajadi!',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/destroyktp/" + id + ""
                Swal.fire(
                    'Ahsyiappp!',
                    'Datanya Udah Keapus!',
                    'success'
                )
            }
        })
    })

</script>
<!-----------------------------------------------SEKRETARIAT---------------------------->
<!-- DataTables TKK-->
<script>
    let rwtkk = $("#filter-rwtkk").val()
        ,tkkkel = $("#filter-tkkkel").val()

    $(document).ready(function() {
        var table = $('#datatkk').DataTable({
            processing:true,
            serverSide:true,            
            responsive: true,
            autoWidth: false,
            paging: true,
            lengthChange: true,
            info: true,
            buttons: ['copy', 'csv', 'print', 'colvis'],           
            dom: 
                "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row'<'col-md-5'i><'col-md-7'p>>",
                lengthMenu:[
                    [10,25,50,100,-1],
                    [10,25,50,100,"All"]
                ],
            ajax: {
                url : "{{'getdatatkk'}}",
                data:function(d){
                d.rwtkk = rwtkk;
                d.tkkkel = tkkkel;
                return d               
                }
            },
            columns:[
                {data:'DT_RowIndex', name:'DT_RowIndex', orderable: false, searchable: false},
                {data:'nama', name:'nama'},
                {data:'id', name:'id'},
                {data:'KK', name:'KK'},
                {data:'rw', name:'rw'},
                {data:'district', name:'district'},
                {data:'village', name:'village'},
                {data:'edit', name:'edit', orderable: false, searchable: false},
                {data:'view', name:'view', orderable: false, searchable: false},
                {data:'hapus', name:'hapus', orderable: false, searchable: false},
                {data:'tempat_lahir', name:'tempat_lahir'},
                {data:'tanggal_lahir', name:'tanggal_lahir'},
                {data:'jeniskelamin', name:'jeniskelamin'},
                {data:'alamat', name:'alamat'},
                {data:'agama', name:'agama'},
                {data:'pendidikan', name:'pendidikan'},
                {data:'statuskawin', name:'statuskawin'},
                {data:'seksi', name:'seksi'},
                {data:'jabatan', name:'jabatan'},
                {data:'SK_Tkk', name:'SK_Tkk'},
                {data:'no_rek', name:'no_rek'},
                {data:'npwp', name:'npwp'},
                {data:'email', name:'email'},
                {data:'no_HP', name:'no_HP'},
                {data:'foto', name:'foto',
                    render: function( data, type, full, meta ) {
                        return "<img src=\"/images/TKK/" + data + "\" height=\"100\"/>";
                    }
                },
                ],
        })

        table.buttons().container()
            .appendTo( '#datatkk_wrapper .col-md-6:e(0)' 
        );

            $(".filter").on('change', function() { 
                rwtkk = $("#filter-rwtkk").val()
                tkkkel = $("#filter-tkkkel").val()
                table.ajax.reload(null, false);            
            })
    })

    $(document).on('click', '.viewtkk', function(){
        console.log($(this).data('id'))
        let id = $(this).data('id')
        $.ajax({
            url:`/tkk/${id}`,
            method:"GET",
            success:function(data){
                console.log(data)
                $('#modal-view').find('.modal-body').html(data)
                $('#modal-view').modal('show')
            },
            error:function(error){
                console.log(error)
            }
        })
    })
</script>

<!-- DataTables Restore TKK-->
<script>
    let trashrwtkk = $("#filter-trashrwtkk").val()
        ,trashtkkkel = $("#filter-trashtkkkel").val()

    $(document).ready(function() {
        var table = $('#gettrashdatatkk').DataTable({
            processing:true,
            serverSide:true,            
            responsive: true,
            autoWidth: false,
            paging: true,
            lengthChange: true,
            info: true,
            buttons: ['copy', 'csv', 'print', 'colvis'],           
            dom: 
                "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row'<'col-md-5'i><'col-md-7'p>>",
                lengthMenu:[
                    [10,25,50,100,-1],
                    [10,25,50,100,"All"]
                ],
            ajax: {
                url : "{{'gettrashdatatkk'}}",
                data:function(d){
                d.trashrwtkk = trashrwtkk;
                d.trashtkkkel = trashtkkkel;
                return d               
                }
            },
            columns:[
                {data:'DT_RowIndex', name:'DT_RowIndex', orderable: false, searchable: false},
                {data:'nama', name:'nama'},
                {data:'id', name:'id'},
                {data:'KK', name:'KK'},
                {data:'rw', name:'rw'},
                {data:'district', name:'district'},
                {data:'village', name:'village'},
                {data:'restore', name:'restore', orderable: false, searchable: false},
                {data:'delete', name:'delete', orderable: false, searchable: false},
                {data:'tempat_lahir', name:'tempat_lahir'},
                {data:'tanggal_lahir', name:'tanggal_lahir'},
                {data:'jeniskelamin', name:'jeniskelamin'},
                {data:'alamat', name:'alamat'},
                {data:'agama', name:'agama'},
                {data:'pendidikan', name:'pendidikan'},
                {data:'statuskawin', name:'statuskawin'},
                {data:'seksi', name:'seksi'},
                {data:'jabatan', name:'jabatan'},
                {data:'SK_Tkk', name:'SK_Tkk'},
                {data:'no_rek', name:'no_rek'},
                {data:'npwp', name:'npwp'},
                {data:'email', name:'email'},
                {data:'no_HP', name:'no_HP'},
                {data:'foto', name:'foto',
                    render: function( data, type, full, meta ) {
                        return "<img src=\"/images/TKK/" + data + "\" height=\"100\"/>";
                    }
                },
                ],
        })

        table.buttons().container()
            .appendTo( '#gettrashdatatkk_wrapper .col-md-6:e(0)' 
        );

            $(".filter").on('change', function() { 
                trashrwtkk = $("#filter-trashrwtkk").val()
                trashtkkkel = $("#filter-trashtkkkel").val()
                table.ajax.reload(null, false);            
            })
    })
</script>

<!--SweetAlert2 Delete TKK -->
<script>
    $(document).on('click', '.destroytkk', function() {
        var id = $(this).attr('data-id')
        var namaid = $(this).attr('data-nama')

        Swal.fire({
            title: 'Yakin di Hapus?',
            text: "Kamu Akan Ngapus Data Diri Dari : " + namaid + " ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Apus Aja!',
            cancelButtonText: 'Gajadi!',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/destroytkk/" + id + ""
                Swal.fire(
                    'Ahsyiappp!',
                    'Datanya Udah Keapus!',
                    'success'
                )
            }
        })
    })

</script>

<script>
    $(document).on('click', '.deletetkk', function() {
        var id = $(this).attr('data-id')
        var namaid = $(this).attr('data-nama')

        Swal.fire({
            title: 'Yakin di Hapus?',
            text: "Kamu Akan Ngapus Data Diri Dari : " + namaid + " ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Apus Aja!',
            cancelButtonText: 'Gajadi!',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/deletetkk/" + id + ""
                Swal.fire(
                    'Ahsyiappp!',
                    'Datanya Udah Keapus Permanent!',
                    'success'
                )
            }
        })
    })
</script>

<!-- DataTables ASN-->
<script>
    let jabatanasn = $("#filter-jabatanasn").val()
        ,asnkel = $("#filter-asnkel").val()

    $(document).ready(function() {
        var table = $('#dataasn').DataTable({
            processing:true,
            serverSide:true,            
            responsive:true,
            autoWidth:false,
            paging:true,
            lengthChange:true,
            info:true,
            buttons: ['copy', 'csv', 'print', 'colvis'],           
            dom: 
                "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row'<'col-md-5'i><'col-md-7'p>>",
                lengthMenu:[
                    [5,10,25,50,100,-1],
                    [5,10,25,50,100,"All"]
                ],
            ajax: {
                url : "{{'getdataasn'}}",
                data:function(d){
                d.jabatanasn = jabatanasn;
                d.asnkel = asnkel;
                return d               
                }
            },
            columns:[
                {data:'DT_RowIndex', name:'DT_RowIndex', orderable: false, searchable: false},
                {data:'nama', name:'nama'},
                {data:'id', name:'id'},
                {data:'NIK', name:'NIK'},
                {data:'pangkat', name:'pangkat'},
                {data:'golongan', name:'golongan'},
                {data:'jabatan', name:'jabatan'},
                {data:'edit', name:'edit', orderable: false, searchable: false},
                {data:'view', name:'view', orderable: false, searchable: false},
                {data:'hapus', name:'hapus', orderable: false, searchable: false},
                {data:'district', name:'district'},
                {data:'village', name:'village'},
                {data:'tempat_lahir', name:'tempat_lahir'},
                {data:'tanggal_lahir', name:'tanggal_lahir'},
                {data:'jeniskelamin', name:'jeniskelamin'},
                {data:'alamat', name:'alamat'},
                {data:'agama', name:'agama'},
                {data:'pendidikan', name:'pendidikan'},
                {data:'statuskawin', name:'statuskawin'},
                {data:'SK_Jabatan', name:'SK_Jabatan'},
                {data:'no_rek', name:'no_rek'},
                {data:'npwp', name:'npwp'},
                {data:'email', name:'email'},
                {data:'no_HP', name:'no_HP'},
                {data:'foto', name:'foto',
                    render: function( data, type, full, meta ) {
                        return "<img src=\"/images/Asn/" + data + "\" height=\"100\"/>";
                    }
                },
                ],
        })

        table.buttons().container()
            .appendTo( '#dataasn_wrapper .col-md-6:e(0)' 
        );

        $(".filter").on('change', function() { 
                jabatanasn = $("#filter-jabatanasn").val()
                asnkel = $("#filter-asnkel").val()
                table.ajax.reload(null, false);            
            })
    })

    $(document).on('click', '.viewasn', function(){
        console.log($(this).data('id'))
        let id = $(this).data('id')
        $.ajax({
            url:`/asn/${id}`,
            method:"GET",
            success:function(data){
                console.log(data)
                $('#modal-viewasn').find('.modal-body').html(data)
                $('#modal-viewasn').modal('show')
            },
            error:function(error){
                console.log(error)
            }
        })
    })
</script>

<script>
    let trashjabatanasn = $("#filter-trashjabatanasn").val()
        ,trashasnkel = $("#filter-trashasnkel").val()

    $(document).ready(function() {
        var table = $('#gettrashdataasn').DataTable({
            processing:true,
            serverSide:true,            
            responsive:true,
            autoWidth:false,
            paging:true,
            lengthChange:true,
            info:true,
            buttons: ['copy', 'csv', 'print', 'colvis'],           
            dom: 
                "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row'<'col-md-5'i><'col-md-7'p>>",
                lengthMenu:[
                    [5,10,25,50,100,-1],
                    [5,10,25,50,100,"All"]
                ],
            ajax: {
                url : "{{'gettrashdataasn'}}",
                data:function(d){
                d.trashjabatanasn = trashjabatanasn;
                d.trashasnkel = trashasnkel;
                return d               
                }
            },
            columns:[
                {data:'DT_RowIndex', name:'DT_RowIndex', orderable: false, searchable: false},
                {data:'nama', name:'nama'},
                {data:'id', name:'id'},
                {data:'NIK', name:'NIK'},
                {data:'pangkat', name:'pangkat'},
                {data:'golongan', name:'golongan'},
                {data:'jabatan', name:'jabatan'},
                {data:'restore', name:'restore', orderable: false, searchable: false},
                {data:'delete', name:'delete', orderable: false, searchable: false},
                {data:'district', name:'district'},
                {data:'village', name:'village'},
                {data:'tempat_lahir', name:'tempat_lahir'},
                {data:'tanggal_lahir', name:'tanggal_lahir'},
                {data:'jeniskelamin', name:'jeniskelamin'},
                {data:'alamat', name:'alamat'},
                {data:'agama', name:'agama'},
                {data:'pendidikan', name:'pendidikan'},
                {data:'statuskawin', name:'statuskawin'},
                {data:'SK_Jabatan', name:'SK_Jabatan'},
                {data:'no_rek', name:'no_rek'},
                {data:'npwp', name:'npwp'},
                {data:'email', name:'email'},
                {data:'no_HP', name:'no_HP'},
                {data:'foto', name:'foto',
                    render: function( data, type, full, meta ) {
                        return "<img src=\"/images/Asn/" + data + "\" height=\"100\"/>";
                    }
                },
                ],
        })

        table.buttons().container()
            .appendTo( '#gettrashdataasn_wrapper .col-md-6:e(0)' 
        );

        $(".filter").on('change', function() { 
                trashjabatanasn = $("#filter-trashjabatanasn").val()
                trashasnkel = $("#filter-trashasnkel").val()
                table.ajax.reload(null, false);            
            })
    })

</script>

<!--SweetAlert2 Delete ASN -->
<script>
    $(document).on('click', '.destroyasn', function() {
        var id = $(this).attr('data-id')
        var namaid = $(this).attr('data-nama')

        Swal.fire({
            title: 'Yakin di Hapus?',
            text: "Kamu Akan Ngapus Data Diri Dari : " + namaid + " ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Apus Aja!',
            cancelButtonText: 'Gajadi!',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/destroyasn/" + id + ""
                Swal.fire(
                    'Ahsyiappp!',
                    'Datanya Udah Keapus!',
                    'success'
                )
            }
        })
    })
</script>

<script>
    $(document).on('click', '.deleteasn', function() {
        var id = $(this).attr('data-id')
        var namaid = $(this).attr('data-nama')

        Swal.fire({
            title: 'Yakin di Hapus?',
            text: "Kamu Akan Ngapus Data Diri Dari : " + namaid + " ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Apus Aja!',
            cancelButtonText: 'Gajadi!',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/deleteasn/" + id + ""
                Swal.fire(
                    'Ahsyiappp!',
                    'Datanya Udah Keapus Permanent!',
                    'success'
                )
            }
        })
    })
</script>

<!-- DataTables Laporan PAMOR-->
<script>
    let rwpamor = $("#filter-rwpamor").val()
      ,pamorkel = $("#filter-pamorkel").val()
      ,bulan = $("#filter-bulan").val()
      ,tahun = $("#filter-tahun").val()
      ,startdatepamor = $("#filter-startdatepamor").val()
      ,enddatepamor = $("#filter-enddatepamor").val()

    $(document).ready(function() {
        var table = $('#datalaporanpamor').DataTable({
            processing:true,
            serverSide:true,            
            responsive: true,
            autoWidth: false,
            paging: true,
            lengthChange: true,
            ordering: true,
            info: true,
            buttons: ['copy', 'excel', 'print', 'colvis'],           
            dom: 
                "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row'<'col-md-5'i><'col-md-7'p>>",
                lengthMenu:[
                    [5,10,25,50,100,-1],
                    [5,10,25,50,100,"All"]
                ],
            ajax: {
                url : "{{'getdatalaporanpamor'}}",
                data:function(d){
                d.rwpamor = rwpamor;
                d.pamorkel = pamorkel;
                d.bulan = bulan;
                d.tahun = tahun;
                d.startdatepamor = startdatepamor;
                d.enddatepamor = enddatepamor;
                return d               
                }
            },
            columns:[
                {data:'DT_RowIndex', name:'DT_RowIndex', orderable: false, searchable: false},
                {data:'name', name:'name'},
                {data:'tanggal', name:'tanggal'},
                {data:'kegiatan', name:'kegiatan'},
                {data:'jumlah', name:'jumlah'},
                {data:'seksi', name:'seksi'},
                {data:'keterangan', name:'keterangan'},
                {data:'tinjut', name:'tinjut'},
                {data:'rt', name:'rt'},
                {data:'rw', name:'rw'},
                {data:'village', name:'village'},
                {data:'edit', name:'edit', orderable: false, searchable: false},
                {data:'view', name:'view', orderable: false, searchable: false},
                {data:'hapus', name:'hapus', orderable: false, searchable: false},
                {data:'foto', name:'foto',
                render: function( data, type, full, meta ) {
                        return "<img src=\"/images/LaporanHarian/" + data + "\" height=\"100\"/>";
                    }
                },
                ],
        })

        table.buttons().container()
            .appendTo( '#datalaporanpamor_wrapper .col-md-6:e(0)' 
        );

            $(".filter").on('change', function() { 
                rwpamor = $("#filter-rwpamor").val()
                pamorkel = $("#filter-pamorkel").val()
                bulan = $("#filter-bulan").val()
                tahun = $("#filter-tahun").val()
                startdatepamor = $("#filter-startdatepamor").val()
                enddatepamor = $("#filter-enddatepamor").val()
                table.ajax.reload(null, false);  
                         
            })
    })

    $(document).on('click', '.viewlaporanpamor', function(){
        console.log($(this).data('id'))
        let id = $(this).data('id')
        $.ajax({
            url:`/laporanpamor/${id}`,
            method:"GET",
            success:function(data){
                console.log(data)
                $('#modal-viewlaporanpamor').find('.modal-body').html(data)
                $('#modal-viewlaporanpamor').modal('show')
            },
            error:function(error){
                console.log(error)
            }
        })
    })
</script>

<!--SweetAlert2 Delete Laporan pamor -->
<script>
    $(document).on('click', '.deletelaporanpamor', function() {
        var id = $(this).attr('data-id')
        var namaid = $(this).attr('data-nama')
        var tglid = $(this).attr('data-tgl')

        Swal.fire({
            title: 'Yakin di Hapus?',
            text: "Kamu Akan Ngapus Laporan Harian pada Tanggal : " + tglid + " ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Apus Aja!',
            cancelButtonText: 'Gajadi!',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/destroylaporanpamor/" + id + ""
                Swal.fire(
                    'Ahsyiappp!',
                    'Datanya Udah Keapus!',
                    'success'
                )
            }
        })
    })
</script>

<!-- DataTables User-->
<script>
    let rwuser = $("#filter-rwuser").val()
        ,userkel = $("#filter-userkel").val()

    $(document).ready(function() {
        var table = $('#datauser').DataTable({
            processing:true,
            serverSide:true,            
            responsive: true,
            autoWidth: false,
            paging: true,
            lengthChange: true,
            info: true,
            buttons: ['copy', 'csv', 'excel', 'print', 'colvis'],           
            dom: 
                "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row'<'col-md-5'i><'col-md-7'p>>",
                lengthMenu:[
                    [10,25,50,100,-1],
                    [10,25,50,100,"All"]
                ],
            ajax: {
                url : "{{'getdatauser'}}",
                data:function(d){
                d.rwuser = rwuser;
                d.userkel = userkel;
                return d               
                }
            },
            columns:[
                {data:'DT_RowIndex', name:'DT_RowIndex', orderable: false, searchable: false},
                {data:'name', name:'name'},
                {data:'username', name:'username'},
                {data:'role', name:'role'},
                {data:'email', name:'email'},
                {data:'rw', name:'rw'},
                {data:'district', name:'district'},
                {data:'village', name:'village'},
                {data:'reset', name:'reset', orderable: false, searchable: false},
                {data:'view', name:'view', orderable: false, searchable: false},
                {data:'hapus', name:'hapus', orderable: false, searchable: false},
                ],
        })

        table.buttons().container()
            .appendTo( '#datauser_wrapper .col-md-6:e(0)' 
        );

            $(".filter").on('change', function() { 
                rwuser = $("#filter-rwuser").val()
                userkel = $("#filter-userkel").val()
                table.ajax.reload(null, false);            
            })
    })

    $(document).on('click', '.viewuser', function(){
        console.log($(this).data('id'))
        let id = $(this).data('id')
        $.ajax({
            url:`/user/${id}`,
            method:"GET",
            success:function(data){
                console.log(data)
                $('#modal-view').find('.modal-body').html(data)
                $('#modal-view').modal('show')
            },
            error:function(error){
                console.log(error)
            }
        })
    })
</script>

<!--SweetAlert2 User -->
<script>
    $(document).on('click', '.deleteuser', function() {
        var id = $(this).attr('data-id')
        var namaid = $(this).attr('data-nama')

        Swal.fire({
            title: 'Yakin di Hapus?',
            text: "Kamu Akan Ngapus User Dengan Nama : " + namaid + " ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Apus Aja!',
            cancelButtonText: 'Gajadi!',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/destroyuser/" + id + ""
                Swal.fire(
                    'Ahsyiappp!',
                    'Datanya Udah Keapus!',
                    'success'
                )
            }
        })
    })

</script>

<!-----------------------------------------------KESSOS---------------------------->
<!-- DataTables DTKS NON DTKS-->
<script>
    let rwdtksnondtks = $("#filter-rwdtksnondtks").val()
        ,rtdtksnondtks = $("#filter-rtdtksnondtks").val()
        ,dtksnondtkskel = $("#filter-dtksnondtkskel").val()

    $(document).ready(function() {
        var table = $('#datadtksnondtks').DataTable({
            processing:true,
            serverSide:true,            
            responsive: true,
            autoWidth: false,
            paging: true,
            lengthChange: true,
            info: true,
            buttons: ['copy', 'csv', 'excel', 'print', 'colvis'],           
            dom: 
                "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row'<'col-md-5'i><'col-md-7'p>>",
                lengthMenu:[
                    [10,25,50,100,-1],
                    [10,25,50,100,"All"]
                ],
            ajax: {
                url : "{{'getdatadtksnondtks'}}",
                data:function(d){
                d.rwdtksnondtks = rwdtksnondtks;
                d.rtdtksnondtks = rtdtksnondtks;
                d.dtksnondtkskel = dtksnondtkskel;
                return d               
                }
            },
            columns:[
                {data:'DT_RowIndex', name:'DT_RowIndex', orderable: false, searchable: false},
                // {data:'ktp_id', name:'ktp_id'},
                // {data:'ktp', name:'ktp'},
                {data:'pkh', name:'pkh'},
                {data:'bpnt', name:'bpnt'},
                {data:'pbi', name:'pbi'},
                {data:'non_bansos', name:'non_bansos'},
                // {data:'rt', name:'rt'},
                // {data:'rw', name:'rw'},
                {data:'keterangan', name:'keterangan'},
                // {data:'district', name:'district'},
                // {data:'village', name:'village'},
                {data:'edit', name:'edit', orderable: false, searchable: false},
                {data:'view', name:'view', orderable: false, searchable: false},
                {data:'hapus', name:'hapus', orderable: false, searchable: false},
                ],
        })

        table.buttons().container()
            .appendTo( '#datadtksnondtks_wrapper .col-md-6:e(0)' 
        );

            $(".filter").on('change', function() { 
                rwdtksnondtks = $("#filter-rwdtksnondtks").val()
                rtdtksnondtks = $("#filter-rtdtksnondtks").val()
                dtksnondtkskel = $("#filter-dtksnondtkskel").val()
                table.ajax.reload(null, false);            
            })
    })

    $(document).on('click', '.viewdtksnondtks', function(){
        console.log($(this).data('id'))
        let id = $(this).data('id')
        $.ajax({
            url:`/dtksnondtks/${id}`,
            method:"GET",
            success:function(data){
                console.log(data)
                $('#modal-view').find('.modal-body').html(data)
                $('#modal-view').modal('show')
            },
            error:function(error){
                console.log(error)
            }
        })
    })
</script>

<!--SweetAlert2 DTKS NON DTKS-->
<script>
    $(document).on('click', '.deletedtksnondtks', function() {
        var id = $(this).attr('data-id')
        var namaid = $(this).attr('data-nama')

        Swal.fire({
            title: 'Yakin di Hapus?',
            text: "Kamu Akan Ngapus Data Dengan Nama: " + namaid + " ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Apus Aja!',
            cancelButtonText: 'Gajadi!',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/destroydtksnondtks/" + id + ""
                Swal.fire(
                    'Ahsyiappp!',
                    'Datanya Udah Keapus!',
                    'success'
                )
            }
        })
    })
</script>

<!-- DataTables DTKS-->
<script>
    let rwdtks = $("#filter-rwdtks").val()
        ,rtdtks = $("#filter-rtdtks").val()
        ,dtkskel = $("#filter-dtkskel").val()

    $(document).ready(function() {
        var table = $('#datadtks').DataTable({
            processing:true,
            serverSide:true,            
            responsive: true,
            autoWidth: false,
            paging: true,
            lengthChange: true,
            info: true,
            buttons: ['copy', 'csv', 'excel', 'print', 'colvis'],           
            dom: 
                "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row'<'col-md-5'i><'col-md-7'p>>",
                lengthMenu:[
                    [10,25,50,100,-1],
                    [10,25,50,100,"All"]
                ],
            ajax: {
                url : "{{'getdatadtks'}}",
                data:function(d){
                d.rwdtks = rwdtks;
                d.rtdtks = rtdtks;
                d.dtkskel = dtkskel;
                return d               
                }
            },
            columns:[
                {data:'DT_RowIndex', name:'DT_RowIndex', orderable: false, searchable: false},
                {data:'ktp', name:'ktp'},
                {data:'ktp_id', name:'ktp_id'},
                {data:'pkh', name:'pkh'},
                {data:'bpnt', name:'bpnt'},
                {data:'pbi', name:'pbi'},
                {data:'non_bansos', name:'non_bansos'},
                {data:'rt', name:'rt'},
                {data:'rw', name:'rw'},
                {data:'district', name:'district'},
                {data:'village', name:'village'},
                {data:'keterangan', name:'keterangan'},
                {data:'edit', name:'edit', orderable: false, searchable: false},
                {data:'view', name:'view', orderable: false, searchable: false},
                {data:'hapus', name:'hapus', orderable: false, searchable: false},
                ],
        })

        table.buttons().container()
            .appendTo( '#datadtks_wrapper .col-md-6:e(0)' 
        );

            $(".filter").on('change', function() { 
                rwdtks = $("#filter-rwdtks").val()
                rtdtks = $("#filter-rtdtks").val()
                dtkskel = $("#filter-dtkskel").val()
                table.ajax.reload(null, false);            
            })
    })

    $(document).on('click', '.viewdtks', function(){
        console.log($(this).data('id'))
        let id = $(this).data('id')
        $.ajax({
            url:`/dtks/${id}`,
            method:"GET",
            success:function(data){
                console.log(data)
                $('#modal-view').find('.modal-body').html(data)
                $('#modal-view').modal('show')
            },
            error:function(error){
                console.log(error)
            }
        })
    })
</script>

<!--SweetAlert2 DTKS -->
<script>
    $(document).on('click', '.deletedtks', function() {
        var id = $(this).attr('data-id')
        var namaid = $(this).attr('data-nama')

        Swal.fire({
            title: 'Yakin di Hapus?',
            text: "Kamu Akan Ngapus Data Dengan Nama: " + namaid + " ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Apus Aja!',
            cancelButtonText: 'Gajadi!',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/destroydtks/" + id + ""
                Swal.fire(
                    'Ahsyiappp!',
                    'Datanya Udah Keapus!',
                    'success'
                )
            }
        })
    })

</script>

<!-- DataTables Sarana Ibadah-->
<script>
    let rwsaranaibadah = $("#filter-rwsaranaibadah").val()
        ,saranaibadahkel = $("#filter-saranaibadahkel").val()

    $(document).ready(function() {
        var table = $('#datasaranaibadah').DataTable({
            processing:true,
            serverSide:true,            
            responsive: true,
            autoWidth: false,
            paging: true,
            lengthChange: true,
            info: true,
            buttons: ['copy', 'csv', 'excel', 'print', 'colvis'],           
            dom: 
                "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row'<'col-md-5'i><'col-md-7'p>>",
                lengthMenu:[
                    [10,25,50,100,-1],
                    [10,25,50,100,"All"]
                ],
            ajax: {
                url : "{{'getdatasaranaibadah'}}",
                data:function(d){
                d.rwsaranaibadah = rwsaranaibadah;
                d.saranaibadahkel = saranaibadahkel;
                return d               
                }
            },
            columns:[
                {data:'DT_RowIndex', name:'DT_RowIndex', orderable: false, searchable: false},
                {data:'nama', name:'nama'},
                {data:'tipeibadah', name:'tipeibadah'},
                {data:'statustanah', name:'statustanah'},
                {data:'ktp', name:'ktp'},
                {data:'alamat', name:'alamat'},
                {data:'rt', name:'rt'},
                {data:'rw', name:'rw'},
                {data:'district', name:'district'},
                {data:'village', name:'village'},
                {data:'no_SK', name:'no_SK'},
                {data:'no_HP', name:'no_HP'},
                {data:'foto', name:'foto',
                render: function( data, type, full, meta ) {
                        return "<img src=\"/images/SaranaIbadah/" + data + "\" height=\"100\"/>";
                    }
                },
                {data:'edit', name:'edit', orderable: false, searchable: false},
                {data:'view', name:'view', orderable: false, searchable: false},
                {data:'hapus', name:'hapus', orderable: false, searchable: false},
                ],
        })

        table.buttons().container()
            .appendTo( '#datasaranaibadah_wrapper .col-md-6:e(0)' 
        );

            $(".filter").on('change', function() { 
                rwsaranaibadah = $("#filter-rwsaranaibadah").val()
                saranaibadahkel = $("#filter-saranaibadahkel").val()
                table.ajax.reload(null, false);            
            })
    })

    $(document).on('click', '.viewsaranaibadah', function(){
        console.log($(this).data('id'))
        let id = $(this).data('id')
        $.ajax({
            url:`/saranaibadah/${id}`,
            method:"GET",
            success:function(data){
                console.log(data)
                $('#modal-view').find('.modal-body').html(data)
                $('#modal-view').modal('show')
            },
            error:function(error){
                console.log(error)
            }
        })
    })
</script>

<!--SweetAlert2 SaranaIbadah -->
<script>
    $(document).on('click', '.deletesaranaibadah', function() {
        var id = $(this).attr('data-id')
        var namaid = $(this).attr('data-nama')

        Swal.fire({
            title: 'Yakin di Hapus?',
            text: "Kamu Akan Ngapus Data Dengan Nama Sarana Ibadah: " + namaid + " ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Apus Aja!',
            cancelButtonText: 'Gajadi!',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/destroysaranaibadah/" + id + ""
                Swal.fire(
                    'Ahsyiappp!',
                    'Datanya Udah Keapus!',
                    'success'
                )
            }
        })
    })

</script>

<!-- DataTables Sarana Pendidikan-->
<script>
    let rwsaranapendidikan = $("#filter-rwsaranapendidikan").val()
        ,saranapendidikankel = $("#filter-saranapendidikankel").val()

    $(document).ready(function() {
        var table = $('#datasaranapendidikan').DataTable({
            processing:true,
            serverSide:true,            
            responsive: true,
            autoWidth: false,
            paging: true,
            lengthChange: true,
            info: true,
            buttons: ['copy', 'csv', 'excel', 'print', 'colvis'],           
            dom: 
                "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row'<'col-md-5'i><'col-md-7'p>>",
                lengthMenu:[
                    [10,25,50,100,-1],
                    [10,25,50,100,"All"]
                ],
            ajax: {
                url : "{{'getdatasaranapendidikan'}}",
                data:function(d){
                d.rwsaranapendidikan = rwsaranapendidikan;
                d.saranapendidikankel = saranapendidikankel;
                return d               
                }
            },
            columns:[
                {data:'DT_RowIndex', name:'DT_RowIndex', orderable: false, searchable: false},
                {data:'nama', name:'nama'},
                {data:'tipependidikan', name:'tipependidikan'},
                {data:'statustanah', name:'statustanah'},
                {data:'nama_pimpinan', name:'nama_pimpinan'},
                {data:'alamat', name:'alamat'},
                {data:'rt', name:'rt'},
                {data:'rw', name:'rw'},
                {data:'district', name:'district'},
                {data:'village', name:'village'},
                {data:'no_HP', name:'no_HP'},
                {data:'foto', name:'foto',
                render: function( data, type, full, meta ) {
                        return "<img src=\"/images/SaranaPendidikan/" + data + "\" height=\"100\"/>";
                    }
                },
                {data:'edit', name:'edit', orderable: false, searchable: false},
                {data:'view', name:'view', orderable: false, searchable: false},
                {data:'hapus', name:'hapus', orderable: false, searchable: false},
                ],
        })

        table.buttons().container()
            .appendTo( '#datasaranapendidikan_wrapper .col-md-6:e(0)' 
        );

            $(".filter").on('change', function() { 
                rwsaranapendidikan = $("#filter-rwsaranapendidikan").val()
                saranapendidikankel = $("#filter-saranapendidikankel").val()
                table.ajax.reload(null, false);            
            })
    })

    $(document).on('click', '.viewsaranapendidikan', function(){
        console.log($(this).data('id'))
        let id = $(this).data('id')
        $.ajax({
            url:`/saranapendidikan/${id}`,
            method:"GET",
            success:function(data){
                console.log(data)
                $('#modal-view').find('.modal-body').html(data)
                $('#modal-view').modal('show')
            },
            error:function(error){
                console.log(error)
            }
        })
    })
</script>

<!--SweetAlert2 Sarana Pendidikan -->
<script>
    $(document).on('click', '.deletesaranapendidikan', function() {
        var id = $(this).attr('data-id')
        var namaid = $(this).attr('data-nama')

        Swal.fire({
            title: 'Yakin di Hapus?',
            text: "Kamu Akan Ngapus Data Dengan Nama : " + namaid + " ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Apus Aja!',
            cancelButtonText: 'Gajadi!',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/destroysaranapendidikan/" + id + ""
                Swal.fire(
                    'Ahsyiappp!',
                    'Datanya Udah Keapus!',
                    'success'
                )
            }
        })
    })

</script>

<!-- DataTables Sarana Kesehatan-->
<script>
    let rwsaranakesehatan = $("#filter-rwsaranakesehatan").val()
        ,saranakesehatankel = $("#filter-saranakesehatankel").val()

    $(document).ready(function() {
        var table = $('#datasaranakesehatan').DataTable({
            processing:true,
            serverSide:true,            
            responsive: true,
            autoWidth: false,
            paging: true,
            lengthChange: true,
            info: true,
            buttons: ['copy', 'csv', 'excel', 'print', 'colvis'],           
            dom: 
                "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row'<'col-md-5'i><'col-md-7'p>>",
                lengthMenu:[
                    [10,25,50,100,-1],
                    [10,25,50,100,"All"]
                ],
            ajax: {
                url : "{{'getdatasaranakesehatan'}}",
                data:function(d){
                d.rwsaranakesehatan = rwsaranakesehatan;
                d.saranakesehatankel = saranakesehatankel;
                return d               
                }
            },
            columns:[
                {data:'DT_RowIndex', name:'DT_RowIndex', orderable: false, searchable: false},
                {data:'nama', name:'nama'},
                {data:'tipekesehatan', name:'tipekesehatan'},
                {data:'statustanah', name:'statustanah'},
                {data:'nama_pimpinan', name:'nama_pimpinan'},
                {data:'alamat', name:'alamat'},
                {data:'rt', name:'rt'},
                {data:'rw', name:'rw'},
                {data:'district', name:'district'},
                {data:'village', name:'village'},
                {data:'no_HP', name:'no_HP'},
                {data:'foto', name:'foto',
                render: function( data, type, full, meta ) {
                        return "<img src=\"/images/SaranaKesehatan/" + data + "\" height=\"100\"/>";
                    }
                },
                {data:'edit', name:'edit', orderable: false, searchable: false},
                {data:'view', name:'view', orderable: false, searchable: false},
                {data:'hapus', name:'hapus', orderable: false, searchable: false},
                ],
        })

        table.buttons().container()
            .appendTo( '#datasaranakesehatan_wrapper .col-md-6:e(0)' 
        );

            $(".filter").on('change', function() { 
                rwsaranakesehatan = $("#filter-rwsaranakesehatan").val()
                saranakesehatankel = $("#filter-saranakesehatankel").val()
                table.ajax.reload(null, false);            
            })
    })

    $(document).on('click', '.viewsaranakesehatan', function(){
        console.log($(this).data('id'))
        let id = $(this).data('id')
        $.ajax({
            url:`/saranakesehatan/${id}`,
            method:"GET",
            success:function(data){
                console.log(data)
                $('#modal-view').find('.modal-body').html(data)
                $('#modal-view').modal('show')
            },
            error:function(error){
                console.log(error)
            }
        })
    })
</script>

<!--SweetAlert2 Sarana Kesehatan -->
<script>
    $(document).on('click', '.deletesaranakesehatan', function() {
        var id = $(this).attr('data-id')
        var namaid = $(this).attr('data-nama')

        Swal.fire({
            title: 'Yakin di Hapus?',
            text: "Kamu Akan Ngapus Data Dengan Nama : " + namaid + " ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Apus Aja!',
            cancelButtonText: 'Gajadi!',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/destroysaranakesehatan/" + id + ""
                Swal.fire(
                    'Ahsyiappp!',
                    'Datanya Udah Keapus!',
                    'success'
                )
            }
        })
    })

</script>

<!-----------------------------------------------PERMASBANG---------------------------->
<!-- DataTables SPPT PBB-->
<script>
    let rwpbb = $("#filter-rwpbb").val()
        ,rtpbb = $("#filter-rtpbb").val()
        ,pbbkel = $("#filter-pbbkel").val()
        ,tahunpbb = $("#filter-tahunpbb").val()


    $(document).ready(function() {
        var table = $('#datapbb').DataTable({
            processing:true,
            serverSide:true,            
            responsive: true,
            autoWidth: false,
            paging: true,
            lengthChange: true,
            info: true,
            buttons: ['copy', 'csv', 'excel', 'print', 'colvis'],           
            dom: 
                "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row'<'col-md-5'i><'col-md-7'p>>",
                lengthMenu:[
                    [10,25,50,100,-1],
                    [10,25,50,100,"All"]
                ],
            ajax: {
                url : "{{'getdatapbb'}}",
                data:function(d){
                d.rwpbb = rwpbb;
                d.rtpbb = rtpbb;
                d.pbbkel = pbbkel;
                d.tahunpbb = tahunpbb;
                return d               
                }
            },
            columns:[
                {data:'DT_RowIndex', name:'DT_RowIndex', orderable: false, searchable: false},
                {data:'NOP', name:'NOP'},
                {data:'NM_WP_SPPT', name:'NM_WP_SPPT'},
                {data:'TOTAL_LUAS_BUMI', name:'TOTAL_LUAS_BUMI'},
                {data:'ALM_OP', name:'ALM_OP'},
                {data:'PBB_TERHUTANG_SPPT', name: 'PBB_TERHUTANG_SPPT'},
                {data:'rt', name:'rt'},
                {data:'rw', name:'rw'},
                {data:'edit', name:'edit', orderable: false, searchable: false},
                {data:'hapus', name:'hapus', orderable: false, searchable: false},
                {data:'KETERANGAN', name:'KETERANGAN'},
                {data:'NJOP_BUMI_SPPT', name:'NJOP_BUMI_SPPT'},
                {data:'TOTAL_LUAS_BNG', name:'TOTAL_LUAS_BNG'},
                {data:'NJOP_BNG_SPPT', name:'NJOP_BNG_SPPT'},
                {data:'ALM_WP', name:'ALM_WP'},
                {data:'TAHUN_SPPT', name:'TAHUN_SPPT'},
                {data:'district', name:'district'},
                {data:'village', name:'village'},
                ],
        })
      
        table.buttons().container()
            .appendTo( '#datapbb_wrapper .col-md-6:e(0)' 
        );

        $(".filter").on('change', function() { 
            rwpbb = $("#filter-rwpbb").val()
            rtpbb = $("#filter-rtpbb").val()
            pbbkel = $("#filter-pbbkel").val()
            tahunpbb = $("#filter-tahunpbb").val()
            table.ajax.reload(null, false); 
                        
        })
    })

    $(document).ready(function() {
        var table = $('#detaildatapbb').DataTable({
            processing:true,
            serverSide:true,            
            responsive: true,
            autoWidth: false,
            paging: true,
            lengthChange: true,
            info: true,
            buttons: ['copy', 'csv', 'excel', 'print', 'colvis'],           
            dom: 
                "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row'<'col-md-5'i><'col-md-7'p>>",
                lengthMenu:[
                    [10,25,50,100,-1],
                    [10,25,50,100,"All"]
                ],
            ajax: {
                url : "{{'getdetaildatapbb'}}",
                data:function(d){
                d.rwpbb = rwpbb;
                d.rtpbb = rtpbb;
                d.pbbkel = pbbkel;
                d.tahunpbb = tahunpbb;
                return d               
                }
            },
            columns:[
                {data:'DT_RowIndex', name:'DT_RowIndex', orderable: false, searchable: false},
                {data:'rt', name:'rt'},
                {data:'rw', name:'rw'},
                {data:'jumlahsppt', name:'jumlahsppt'},
                ],
        })
      
        table.buttons().container()
            .appendTo( '#detaildatapbb_wrapper .col-md-6:e(0)' 
        );

        $(".filter").on('change', function() { 
            rwpbb = $("#filter-rwpbb").val()
            rtpbb = $("#filter-rtpbb").val()
            pbbkel = $("#filter-pbbkel").val()
            tahunpbb = $("#filter-tahunpbb").val()
            table.ajax.reload(null, false); 
                        
        })
    })

    $(document).on('click', '.viewpbb', function(){
        console.log($(this).data('id'))
        let id = $(this).data('id')
        $.ajax({
            url:`/pbb/${id}`,
            method:"GET",
            success:function(data){
                console.log(data)
                $('#modal-view').find('.modal-body').html(data)
                $('#modal-view').modal('show')
            },
            error:function(error){
                console.log(error)
            }
        })
    })
</script>

<!--SweetAlert2 PBB -->
<script>
    $(document).on('click', '.deletepbb', function() {
        var id = $(this).attr('data-id')
        var namaid = $(this).attr('data-nama')

        Swal.fire({
            title: 'Yakin di Hapus?',
            text: "Kamu Akan Ngapus Data Dengan NOP : " + namaid + " ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Apus Aja!',
            cancelButtonText: 'Gajadi!',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/destroypbb/" + id + ""
                Swal.fire(
                    'Ahsyiappp!',
                    'Datanya Udah Keapus!',
                    'success'
                )
            }
        })
    })

</script>

<!-- DataTables PSU-->
<script>
    let rwfasosfasum = $("#filter-rwfasosfasum").val()
        ,rtfasosfasum = $("#filter-rtfasosfasum").val()
        ,fasosfasumkel = $("#filter-fasosfasumkel").val()

    $(document).ready(function() {
        var table = $('#datafasosfasum').DataTable({
            processing:true,
            serverSide:true,            
            responsive: true,
            autoWidth: false,
            paging: true,
            lengthChange: true,
            info: true,
            buttons: ['copy', 'csv', 'excel', 'print', 'colvis'],           
            dom: 
                "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row'<'col-md-5'i><'col-md-7'p>>",
                lengthMenu:[
                    [10,25,50,100,-1],
                    [10,25,50,100,"All"]
                ],
            ajax: {
                url : "{{'getdatafasosfasum'}}",
                data:function(d){
                d.rwfasosfasum = rwfasosfasum;
                d.rtfasosfasum = rtfasosfasum;
                d.fasosfasumkel = fasosfasumkel;
                return d               
                }
            },
            columns:[
                {data:'DT_RowIndex', name:'DT_RowIndex', orderable: false, searchable: false},
                {data:'nama', name:'nama'},
                {data:'alamat', name:'alamat'},
                {data:'rt', name:'rt'},
                {data:'rw', name:'rw'},
                {data:'edit', name:'edit', orderable: false, searchable: false},
                {data:'view', name:'view', orderable: false, searchable: false},
                {data:'hapus', name:'hapus', orderable: false, searchable: false},
                {data:'district', name:'district'},
                {data:'village', name:'village'},
                {data:'koordinat', name:'koordinat'},
                {data:'luas', name:'luas'},
                {data:'pemanfaatan', name:'pemanfaatan'},
                {data:'nama_pengembang', name:'nama_pengembang'},
                {data:'nama_perumahan', name:'nama_perumahan'},
                {data:'foto', name:'foto',
                render: function( data, type, full, meta ) {
                        return "<img src=\"/images/FasosFasum/" + data + "\" height=\"100\"/>";
                    }
                },
                ],
        })

        table.buttons().container()
            .appendTo( '#datafasosfasum_wrapper .col-md-6:e(0)' 
        );

            $(".filter").on('change', function() { 
                rwfasosfasum = $("#filter-rwfasosfasum").val()
                rtfasosfasum = $("#filter-rtfasosfasum").val()
                fasosfasumkel = $("#filter-fasosfasumkel").val()
                table.ajax.reload(null, false);              
            })
    })

    $(document).on('click', '.viewfasosfasum', function(){
        console.log($(this).data('id'))
        let id = $(this).data('id')
        $.ajax({
            url:`/fasosfasum/${id}`,
            method:"GET",
            success:function(data){
                console.log(data)
                $('#modal-view').find('.modal-body').html(data)
                $('#modal-view').modal('show')
            },
            error:function(error){
                console.log(error)
            }
        })
    })
</script>

<!--SweetAlert2 Fasos Fasum -->
<script>
    $(document).on('click', '.deletefasosfasum', function() {
        var id = $(this).attr('data-id')
        var namaid = $(this).attr('data-nama')

        Swal.fire({
            title: 'Yakin di Hapus?',
            text: "Kamu Akan Ngapus Data PSU Dengan Nama : " + namaid + " ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Apus Aja!',
            cancelButtonText: 'Gajadi!',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/destroyfasosfasum/" + id + ""
                Swal.fire(
                    'Ahsyiappp!',
                    'Datanya Udah Keapus!',
                    'success'
                )
            }
        })
    })

</script>

<!-- DataTables Posyandu-->
<script>
    let rwposyandu = $("#filter-rwposyandu").val()
        ,rtposyandu = $("#filter-rtposyandu").val()
        ,posyandukel = $("#filter-posyandukel").val()

    $(document).ready(function() {
        var table = $('#dataposyandu').DataTable({
            processing:true,
            serverSide:true,            
            responsive: true,
            autoWidth: false,
            paging: true,
            lengthChange: true,
            info: true,
            buttons: ['copy', 'csv', 'excel', 'print', 'colvis'],           
            dom: 
                "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row'<'col-md-5'i><'col-md-7'p>>",
                lengthMenu:[
                    [10,25,50,100,-1],
                    [10,25,50,100,"All"]
                ],
            ajax: {
                url : "{{'getdataposyandu'}}",
                data:function(d){
                d.rwposyandu = rwposyandu;
                d.rtposyandu = rtposyandu;
                d.posyandukel = posyandukel;
                return d               
                }
            },
            columns:[
                {data:'DT_RowIndex', name:'DT_RowIndex', orderable: false, searchable: false},
                {data:'ktp_id', name:'ktp_id'},
                {data:'ktp', name:'ktp'},
                {data:'jabatan', name:'jabatan'},
                {data:'no_SK', name:'no_SK'},
                {data:'nama_posyandu', name:'nama_posyandu'},
                {data:'rw', name:'rw'},
                {data:'district', name:'district'},
                {data:'village', name:'village'},
                {data:'edit', name:'edit', orderable: false, searchable: false},
                {data:'view', name:'view', orderable: false, searchable: false},
                {data:'hapus', name:'hapus', orderable: false, searchable: false},
                ],
        })

        table.buttons().container()
            .appendTo( '#dataposyandu_wrapper .col-md-6:e(0)' 
        );

            $(".filter").on('change', function() { 
                rwposyandu = $("#filter-rwposyandu").val()
                rtposyandu = $("#filter-rtposyandu").val()
                posyandukel = $("#filter-posyandukel").val()
                table.ajax.reload(null, false);            
            })
    })

    $(document).on('click', '.viewposyandu', function(){
        console.log($(this).data('id'))
        let id = $(this).data('id')
        $.ajax({
            url:`/posyandu/${id}`,
            method:"GET",
            success:function(data){
                console.log(data)
                $('#modal-view').find('.modal-body').html(data)
                $('#modal-view').modal('show')
            },
            error:function(error){
                console.log(error)
            }
        })
    })
</script>

<!--SweetAlert2 Posyandu -->
<script>
    $(document).on('click', '.deleteposyandu', function() {
        var id = $(this).attr('data-id')
        var namaid = $(this).attr('data-nama')

        Swal.fire({
            title: 'Yakin di Hapus?',
            text: "Kamu Akan Ngapus Data Dengan Nama: " + namaid + " ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Apus Aja!',
            cancelButtonText: 'Gajadi!',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/destroyposyandu/" + id + ""
                Swal.fire(
                    'Ahsyiappp!',
                    'Datanya Udah Keapus!',
                    'success'
                )
            }
        })
    })

</script>

<!-- DataTables PKK-->
<script>
    let rwpkk = $("#filter-rwpkk").val()
        ,rtpkk = $("#filter-rtpkk").val()
        ,pkkkel = $("#filter-pkkkel").val()

    $(document).ready(function() {
        var table = $('#datapkk').DataTable({
            processing:true,
            serverSide:true,            
            responsive: true,
            autoWidth: false,
            paging: true,
            lengthChange: true,
            info: true,
            buttons: ['copy', 'csv', 'excel', 'print', 'colvis'],           
            dom: 
                "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row'<'col-md-5'i><'col-md-7'p>>",
                lengthMenu:[
                    [10,25,50,100,-1],
                    [10,25,50,100,"All"]
                ],
            ajax: {
                url : "{{'getdatapkk'}}",
                data:function(d){
                d.rwpkk = rwpkk;
                d.rtpkk = rtpkk;
                d.pkkkel = pkkkel;
                return d               
                }
            },
            columns:[
                {data:'DT_RowIndex', name:'DT_RowIndex', orderable: false, searchable: false},
                {data:'ktp_id', name:'ktp_id'},
                {data:'ktp', name:'ktp'},
                {data:'jabatan', name:'jabatan'},
                {data:'no_SK', name:'no_SK'},
                {data:'pokja', name:'pokja'},
                {data:'rw', name:'rw'},
                {data:'district', name:'district'},
                {data:'village', name:'village'},
                {data:'edit', name:'edit', orderable: false, searchable: false},
                {data:'view', name:'view', orderable: false, searchable: false},
                {data:'hapus', name:'hapus', orderable: false, searchable: false},
                ],
        })

        table.buttons().container()
            .appendTo( '#datapkk_wrapper .col-md-6:e(0)' 
        );

            $(".filter").on('change', function() { 
                rwpkk = $("#filter-rwpkk").val()
                rtpkk = $("#filter-rtpkk").val()
                pkkkel = $("#filter-pkkkel").val()
                table.ajax.reload(null, false);            
            })
    })

    $(document).on('click', '.viewpkk', function(){
        console.log($(this).data('id'))
        let id = $(this).data('id')
        $.ajax({
            url:`/pkk/${id}`,
            method:"GET",
            success:function(data){
                console.log(data)
                $('#modal-view').find('.modal-body').html(data)
                $('#modal-view').modal('show')
            },
            error:function(error){
                console.log(error)
            }
        })
    })
</script>

<!--SweetAlert2 PKK -->
<script>
    $(document).on('click', '.deletepkk', function() {
        var id = $(this).attr('data-id')
        var namaid = $(this).attr('data-nama')

        Swal.fire({
            title: 'Yakin di Hapus?',
            text: "Kamu Akan Ngapus Data Dengan Nama: " + namaid + " ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Apus Aja!',
            cancelButtonText: 'Gajadi!',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/destroypkk/" + id + ""
                Swal.fire(
                    'Ahsyiappp!',
                    'Datanya Udah Keapus!',
                    'success'
                )
            }
        })
    })

</script>

<!-- DataTables POSPIN-->
<script>
    let rwpospin = $("#filter-rwpospin").val()
        ,posyandupin = $("#filter-posyandupin").val()
        ,pospinkel = $("#filter-pospinkel").val()

    $(document).ready(function() {
        var table = $('#datapospin').DataTable({
            processing:true,
            serverSide:true,            
            responsive: true,
            autoWidth: false,
            paging: true,
            lengthChange: true,
            info: true,
            buttons: ['copy', 'csv', 'excel', 'print', 'colvis'],           
            dom: 
                "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row'<'col-md-5'i><'col-md-7'p>>",
                lengthMenu:[
                    [10,25,50,100,-1],
                    [10,25,50,100,"All"]
                ],
            ajax: {
                url : "{{'getdatapospin'}}",
                data:function(d){
                d.rwpospin = rwpospin;
                d.posyandupin = posyandupin;
                d.pospinkel = pospinkel;
                return d               
                }
            },
            columns:[
                {data:'DT_RowIndex', name:'DT_RowIndex', orderable: false, searchable: false},
                {data:'ktp_id', name:'ktp_id'},
                {data:'nama_ktp', name:'nama_ktp'},
                {data:'jk_ktp', name:'jk_ktp'},
                {data:'tgllahir_ktp', name:'tgllahir_ktp'},
                {data:'nama_ortu', name:'nama_ortu'},
                {data:'saranakesehatan', name:'saranakesehatan'},
                {data:'rw', name:'rw'},
                {data:'pin_1', name:'pin_1'},
                {data:'pin_2', name:'pin_2'},
                {data:'district', name:'district'},
                {data:'village', name:'village'},
                {data:'edit', name:'edit', orderable: false, searchable: false},
                {data:'view', name:'view', orderable: false, searchable: false},
                {data:'hapus', name:'hapus', orderable: false, searchable: false},
                ],
        })

        table.buttons().container()
            .appendTo( '#datapospin_wrapper .col-md-6:e(0)' 
        );

            $(".filter").on('change', function() { 
                rwpospin = $("#filter-rwpospin").val()
                posyandupin = $("#filter-posyandupin").val()
                pospinkel = $("#filter-pospinkel").val()
                table.ajax.reload(null, false);            
            })
    })

    $(document).on('click', '.viewpospin', function(){
        console.log($(this).data('id'))
        let id = $(this).data('id')
        $.ajax({
            url:`/pospin/${id}`,
            method:"GET",
            success:function(data){
                console.log(data)
                $('#modal-view').find('.modal-body').html(data)
                $('#modal-view').modal('show')
            },
            error:function(error){
                console.log(error)
            }
        })
    })
</script>

<!--SweetAlert2 POSPIN-->
<script>
    $(document).on('click', '.deletepospin', function() {
        var id = $(this).attr('data-id')
        var namaid = $(this).attr('data-nama')

        Swal.fire({
            title: 'Yakin di Hapus?',
            text: "Kamu Akan Ngapus Data Dengan Nama: " + namaid + " ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Apus Aja!',
            cancelButtonText: 'Gajadi!',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/destroypospin/" + id + ""
                Swal.fire(
                    'Ahsyiappp!',
                    'Datanya Udah Keapus!',
                    'success'
                )
            }
        })
    })

</script>

