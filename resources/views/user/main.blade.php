<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>App @yield('title')</title>
        <link href="{{asset('assetuser/css/adminstyles.css')}}" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />

        <!-- tinyMCE -->
        <script src="https://cdn.tiny.cloud/1/5loyy67bxuvii8e1tuaml2l2p054mvbwptkjnw8hfjtm51wl/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
        tinymce.init({
            selector: '#mytextarea',
            plugins: 'quickbars table image link lists media autoresize help code',
            toolbar: 'undo redo | formatselect | bold italic | alignleft aligncentre alignright alignjustify | indent outdent | bullist numlist | code',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
            // plugins: 'image code autolink',
            default_link_target: '_blank',
            link_default_protocol: 'https',
            height : "250",
            image_dimensions: false,
                image_class_list: [
                    {title: 'Responsive', value: 'img-fluid'}
                ]
        });
        // $('select').selectpicker();
        </script>
        <style>
          .bg-dark {
            background-color: #440088 !important;
          }
          .sb-sidenav-dark {
            background-color: #440088 !important;
          }
        </style>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            @yield('role_brand')
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{url('admin/akun/pass/'.$user->id)}}">Ganti Password</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{url('logout')}}">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
          <!-- start sidebar -->
          <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Welcome</div>
                        <a class="nav-link" href="{{url('admin')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Menu Utama</div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInfo" aria-expanded="false" aria-controls="collapseInfo">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Info
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseInfo" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{url('admin/konten')}}"><div class="sb-nav-link-icon"><i class="fas fa-eye"></i></div> Lihat Info</a>
                                <a class="nav-link" href="#"><div class="sb-nav-link-icon"><i class="fas fa-book"></i></div> Panduan</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBerita" aria-expanded="false" aria-controls="collapseBerita">
                            <div class="sb-nav-link-icon"><i class="fas fa-newspaper"></i></div>
                            Berita
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseBerita" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{url('admin/artikel')}}"><div class="sb-nav-link-icon"><i class="fas fa-eye"></i></div> Lihat Berita</a>
                                <a class="nav-link" href="{{url('admin/kategori')}}"><div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div> Kategori</a>
                            </nav>
                        </div>
                        
                        <a style="display: none" class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGallery" aria-expanded="false" aria-controls="collapseGallery">
                            <div class="sb-nav-link-icon"><i class="fas fa-photo-video"></i></div>
                            Gallery
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseGallery" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="#"><div class="sb-nav-link-icon"><i class="fas fa-images"></i></div> Lihat Gallery</a>
                                <a class="nav-link" href="#"><div class="sb-nav-link-icon"><i class="fas fa-archive"></i></div> Album</a>
                            </nav>
                        </div>
        
                        <div class="sb-sidenav-menu-heading">Setting Navigasi</div>
                        <a class="nav-link" href="{{url('admin/menu')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-caret-square-down"></i></div>
                            Menu Utama
                        </a>
                        <a class="nav-link" href="{{url('admin/menusub')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Sub Menu
                        </a>
                        @if (session()->get('user') == 'admin')
                        <a class="nav-link" href="{{url('admin/pengguna')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-circle"></i></div>
                            Akun
                        </a>
                        @endif
                    </div>
                </div>
                @yield('sidenav_footer')
                </nav>
            </div>
            <!-- end sidebar -->
            <!-- start content -->
            <div id="layoutSidenav_content">
                @yield('content')
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Teknologi Informasi dan Pangkalan Data | iaknpky.ac.id</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script> --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assetuser/js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assetuser/assets/demo/datatables-demo.js')}}"></script>
        <script>
        $(document).ready(function(){
            $('body').on('click', '#PhotoTagTambah', function (event) {
                event.preventDefault();
                $("#PhotoTagData").trigger("reset");
                $("#phototag_id").val("");
                $('#modal-title').html("Form Tambah Tag");
                $('#saveBtnPhotoTag').val("Tambah Tag");
                $(".alert").css("display","none");
                // $("#phototag_id").attr("type", "text");
            });

            $("#saveBtnPhotoTag").click(function (e){
                e.preventDefault();
                var id = $("#phototag_id").val();
                var judul = $("#judul").val();
                console.log(judul);
                $.ajax({
                    url: "{{ url('admin/phototag') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id,
                        judul: judul
                    },
                    dataType: 'json',
                    success: function (data) {
                        if (data.errors) {
                            console.log(data.errors);
                            $(".alert").css("display","inline");
                            $('#saveBtnPhotoTag').val("Simpan");
                            $(".alert").text(data.errors);
                            } else {
                            $('#PhotoTagData').trigger("reset");
                            $('#PhotoTagModal').modal('hide');
                            location.reload();
                        }
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
                // console.log(data);
            });

            $('body').on('click', '#PhotoTagEdit', function (event) {
                event.preventDefault();
                var id = $(this).data('id');
                $('#modal-title').html("Form Ubah Tag");
                $('#submit').val("Simpan Perubahan");
                $.ajax({
                    url: 'phototag/'+id+'/edit',
                    type: "GET",
                    success: function(data) {
                        $("#phototag_id").val(data.data.id);
                        $("#judul").val(data.data.judul);
                    },
                    error: function(data) {
                            $(".alert").css("display","inline");
                            $(".alert").text("Data Tidak Ditemukan");
                            $("#PhotoTagData").css("display","none");
                            // setInterval(function(){
                            //     location.reload();
                            // }, 3000)
                            console.log(data);
                    },
                });
            });

            $('body').on('click', '#PhotoTagDelete', function (event) {
                event.preventDefault();
                var id = $(this).data('id');
                $.ajax({
                    url: 'phototag/'+id+'/edit',
                    type: "GET",
                    success: function(data) {
                        $("#phototag_id").val(data.data.id);
                        $("p#judul").html(data.data.judul);
                        },
                    error: function (data) {
                        console.log(data);
                        }
                });
            });

            $('#deleteBtnPhotoTag').click(function (event){
                event.preventDefault();
                var id = $('#phototag_id').val();
                $.ajax({
                    url: 'phototag/'+id+'/hapus',
                    type: "DELETE",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id
                        },
                    success: function(data) {
                        $("p#judul").css("display","none");
                        $(".alert").css("display","inline");
                        $(".alert").text("Data Telah Terhapus");
                        $("#titleCategory").css("display","none");
                        setInterval(function(){
                            location.reload();
                        }, 1000)
                        },
                    error: function (data) {
                        console.log(data);
                        }
                });
            });

        });
        </script>
    </body>
</html>
