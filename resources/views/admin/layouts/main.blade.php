<!--
=========================================================
* Soft UI Dashboard - v1.0.7
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('adm/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('adm/assets/img/favicon.png') }}">
    <title>
        Rz-synC by SyncAllow
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <!-- Nucleo Icons -->
    <link href="{{ asset('adm/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('adm/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('adm/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Summernote -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('adm/assets/css/soft-ui-dashboard.css?v=1.0.7') }}" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100">
@include('admin.inc.sidebar')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <h6 class="font-weight-bolder mb-0">Dashboard</h6>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="Type here...">
                    </div>
                </div>
                <ul class="navbar-nav  justify-content-end">
                    <li class="nav-item d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                            <i class="fas fa-sign-out-alt me-sm-1"></i>
                            <span class="d-sm-inline d-none">Logout</span>
                        </a>
                    </li>
                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item px-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0">
                            <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                        </a>
                    </li>
{{--                    <li class="nav-item dropdown pe-2 d-flex align-items-center">--}}
{{--                        <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                            <i class="fa fa-bell cursor-pointer"></i>--}}
{{--                        </a>--}}
{{--                        <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">--}}
{{--                            <li class="mb-2">--}}
{{--                                <a class="dropdown-item border-radius-md" href="javascript:;">--}}
{{--                                    <div class="d-flex py-1">--}}
{{--                                        <div class="my-auto">--}}
{{--                                            <img src="{{ asset('adm/assets/img/team-2.jpg') }}" class="avatar avatar-sm  me-3 ">--}}
{{--                                        </div>--}}
{{--                                        <div class="d-flex flex-column justify-content-center">--}}
{{--                                            <h6 class="text-sm font-weight-normal mb-1">--}}
{{--                                                <span class="font-weight-bold">New message</span> from Laur--}}
{{--                                            </h6>--}}
{{--                                            <p class="text-xs text-secondary mb-0 ">--}}
{{--                                                <i class="fa fa-clock me-1"></i>--}}
{{--                                                13 minutes ago--}}
{{--                                            </p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="mb-2">--}}
{{--                                <a class="dropdown-item border-radius-md" href="javascript:;">--}}
{{--                                    <div class="d-flex py-1">--}}
{{--                                        <div class="my-auto">--}}
{{--                                            <img src="{{ asset('adm/assets/img/small-logos/logo-spotify.svg') }}" class="avatar avatar-sm bg-gradient-dark  me-3 ">--}}
{{--                                        </div>--}}
{{--                                        <div class="d-flex flex-column justify-content-center">--}}
{{--                                            <h6 class="text-sm font-weight-normal mb-1">--}}
{{--                                                <span class="font-weight-bold">New album</span> by Travis Scott--}}
{{--                                            </h6>--}}
{{--                                            <p class="text-xs text-secondary mb-0 ">--}}
{{--                                                <i class="fa fa-clock me-1"></i>--}}
{{--                                                1 day--}}
{{--                                            </p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a class="dropdown-item border-radius-md" href="javascript:;">--}}
{{--                                    <div class="d-flex py-1">--}}
{{--                                        <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">--}}
{{--                                            <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">--}}
{{--                                                <title>credit-card</title>--}}
{{--                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                                                    <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">--}}
{{--                                                        <g transform="translate(1716.000000, 291.000000)">--}}
{{--                                                            <g transform="translate(453.000000, 454.000000)">--}}
{{--                                                                <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>--}}
{{--                                                                <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>--}}
{{--                                                            </g>--}}
{{--                                                        </g>--}}
{{--                                                    </g>--}}
{{--                                                </g>--}}
{{--                                            </svg>--}}
{{--                                        </div>--}}
{{--                                        <div class="d-flex flex-column justify-content-center">--}}
{{--                                            <h6 class="text-sm font-weight-normal mb-1">--}}
{{--                                                Payment successfully completed--}}
{{--                                            </h6>--}}
{{--                                            <p class="text-xs text-secondary mb-0 ">--}}
{{--                                                <i class="fa fa-clock me-1"></i>--}}
{{--                                                2 days--}}
{{--                                            </p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        @yield('content')
        <footer class="footer pt-3  ">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            © <script>
                                document.write(new Date().getFullYear())
                            </script>,
                            made with <i class="fa fa-heart"></i> by
                            <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                            for a better web.
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</main>
<div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
        <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg ">
        <div class="card-header pb-0 pt-3 ">
            <div class="float-start">
                <h5 class="mt-3 mb-0">Soft UI Configurator</h5>
                <p>See our dashboard options.</p>
            </div>
            <div class="float-end mt-4">
                <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                    <i class="fa fa-close"></i>
                </button>
            </div>
            <!-- End Toggle Button -->
        </div>
        <hr class="horizontal dark my-1">
        <div class="card-body pt-sm-3 pt-0">
            <!-- Sidebar Backgrounds -->
            <div>
                <h6 class="mb-0">Sidebar Colors</h6>
            </div>
            <a href="javascript:void(0)" class="switch-trigger background-color">
                <div class="badge-colors my-2 text-start">
                    <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
                </div>
            </a>
            <!-- Sidenav Type -->
            <div class="mt-3">
                <h6 class="mb-0">Sidenav Type</h6>
                <p class="text-sm">Choose between 2 different sidenav types.</p>
            </div>
            <div class="d-flex">
                <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
                <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
            </div>
            <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
            <!-- Navbar Fixed -->
            <div class="mt-3">
                <h6 class="mb-0">Navbar Fixed</h6>
            </div>
            <div class="form-check form-switch ps-0">
                <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
            </div>
            <hr class="horizontal dark my-sm-4">
            <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/soft-ui-dashboard">Free Download</a>
            <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/license/soft-ui-dashboard">View documentation</a>
            <div class="w-100 text-center">
                <a class="github-button" href="https://github.com/creativetimofficial/soft-ui-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/soft-ui-dashboard on GitHub">Star</a>
                <h6 class="mt-3">Thank you for sharing!</h6>
                <a href="https://twitter.com/intent/tweet?text=Check%20Soft%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
                    <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/soft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
                    <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
                </a>
            </div>
        </div>
    </div>
</div>
<!--   Core JS Files   -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="{{ asset('adm/assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('adm/assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('adm/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('adm/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('adm/assets/js/soft-ui-dashboard.min.js?v=1.0.7') }}"></script>

<!-- Ajax CRUD scripts -->
<script>
    $(document).ready(function (){
        $('#summernote').summernote({height:200});

        /*    Settings save function Start */
            $("#save_settings").on('click',(function (e) {
                e.preventDefault();
                let formData = new FormData($("#update_settings")[0]);
                formData.append('_method', 'PATCH');
                $.ajax({headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: "{{ route('admin.settings.update') }}",
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        console.log(data);
                        if (data.success) {
                            $('#title').val(data.data.title)
                            $('#header_logo_preview').attr('src','/storage/'+data.data.header_logo)
                            $('#main_logo_preview').attr('src','/storage/'+data.data.main_logo)
                            $('#footer_logo_preview').attr('src','/storage/'+data.data.footer_logo)
                            $('#copyright_text').val(data.data.copyright_text)
                            $('#facebook_link').val(data.data.facebook_link)
                            $('#discord_link').val(data.data.discord_link)
                            Toastify({
                                text: "Saved successfully!",
                                className: "info",
                                style: {
                                    background: "linear-gradient(310deg,#17ad37,#84dc14)",
                                }
                            }).showToast();
                        }
                    },
                    error: function (data) {
                        console.log(data);
                        Toastify({
                            text: data.responseJSON.message,
                            className: "danger",
                            style: {
                                background: "linear-gradient(310deg,#ea0606,#ff3d59)",
                            }
                        }).showToast();
                    }
                });
            }));
        /*    Settings save function End */

        /* Server update function start */
            @if(\Illuminate\Support\Facades\Route::currentRouteNamed('admin.servers.edit'))
            $('#update_server').on('click',(function (e){
                e.preventDefault();
                let formData = new FormData($("#edit_server")[0]);
                formData.append('_method', 'PATCH');
                $.ajax({
                   headers: {
                       'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                   },
                   type: "POST",
                   url: "{{ route('admin.servers.update', $server->id) }}",
                   data: formData,
                   dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        console.log(response);
                        $('#title').val(response.data.title)
                        $('#image_preview').attr('src', '/storage/'+response.data.image)
                        $('#auth_ip').val(response.data.auth_ip)
                        $('#auth_port').val(response.data.auth_port)
                        Toastify({
                            text: "Saved successfully!",
                            className: "info",
                            style: {
                                background: "linear-gradient(310deg,#17ad37,#84dc14)",
                            }
                        }).showToast();
                    },
                    error: function (response) {
                        console.log(response);
                        Toastify({
                            text: response.responseJSON.message,
                            className: "danger",
                            style: {
                                background: "linear-gradient(310deg,#ea0606,#ff3d59)",
                            }
                        }).showToast();
                    }
                });
            }));
            @endif
        /* Server update function end */

        /* Server delete function start */
            @if(\Illuminate\Support\Facades\Route::currentRouteNamed('admin.servers.index'))
                $('.delete_server').on('click',(function (e){
                    e.preventDefault();
                    let formData = new FormData();
                    formData.append('_method', 'DELETE')
                    let serverId = $(this).data('id')
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        url: "servers/delete/"+serverId,
                        data: formData,
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            console.log(response);
                            $('tr#server_' + serverId).remove();
                            Toastify({
                                text: "Saved successfully!",
                                className: "info",
                                style: {
                                    background: "linear-gradient(310deg,#17ad37,#84dc14)",
                                }
                            }).showToast();
                        },
                        error: function (response) {
                            console.log(response);
                            Toastify({
                                text: response.responseJSON.message,
                                className: "danger",
                                style: {
                                    background: "linear-gradient(310deg,#ea0606,#ff3d59)",
                                }
                            }).showToast();
                        }
                    });
            }));
            @endif
        /* Server delete function end */

        /* News/Category update function start */
            @if(\Illuminate\Support\Facades\Route::currentRouteNamed('admin.news.categories.edit'))
        $('#update_category').on('click',(function (e){
            e.preventDefault();
            let formData = new FormData($("#edit_category")[0]);
            formData.append('_method', 'PATCH');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "{{ route('admin.news.categories.update', $category->id) }}",
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log(response);
                    $('#title').addClass('is-valid').val(response.data.title)
                    Toastify({
                        text: "Saved successfully!",
                        className: "info",
                        style: {
                            background: "linear-gradient(310deg,#17ad37,#84dc14)",
                        }
                    }).showToast();
                },
                error: function (response) {
                    console.log(response);
                    $('#title').addClass('is-valid')
                    Toastify({
                        text: response.responseJSON.message,
                        className: "danger",
                        style: {
                            background: "linear-gradient(310deg,#ea0606,#ff3d59)",
                        }
                    }).showToast();
                }
            });
        }));
        @endif
        /* News/Category update function end */

        /* News/Category delete function start */
            @if(\Illuminate\Support\Facades\Route::currentRouteNamed('admin.news.categories.index'))
        $('.delete_category').on('click',(function (e){
            e.preventDefault();

            let formData = new FormData();
            formData.append('_method', 'DELETE')
            let categoryId = $(this).data('id')
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "categories/delete/"+categoryId,
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log(response);
                    $('tr#category_' + categoryId).hide(800, function () {
                        $(this).remove()
                    });
                    Toastify({
                        text: "Saved successfully!",
                        className: "info",
                        style: {
                            background: "linear-gradient(310deg,#17ad37,#84dc14)",
                        }
                    }).showToast();
                },
                error: function (response) {
                    console.log(response);
                    Toastify({
                        text: response.responseJSON.message,
                        className: "danger",
                        style: {
                            background: "linear-gradient(310deg,#ea0606,#ff3d59)",
                        }
                    }).showToast();
                }
            });
        }));
        @endif
        /* News/Category delete function end */

        /* News/Category update function start */
        @if(\Illuminate\Support\Facades\Route::currentRouteNamed('admin.news.edit'))
        $('#save_post').on('click',(function (e){
            e.preventDefault();
            let formData = new FormData($("#update_post")[0]);
            formData.append('_method', 'PATCH');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "{{ route('admin.news.update', $new->id) }}",
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log(response);
                    $('#title').val(response.data.title)
                    $('#preview_image_preview').attr('src', '/storage/'+response.data.preview_image)
                    $('#image_preview').attr('src', '/storage/'+response.data.image)
                    $('#event_image_preview').attr('src', '/storage/'+response.data.event_image)
                    $('#summernote').val(response.data.content)
                    $('#category_id').val(response.data.category_id)
                    Toastify({
                        text: "Saved successfully!",
                        className: "info",
                        style: {
                            background: "linear-gradient(310deg,#17ad37,#84dc14)",
                        }
                    }).showToast();
                },
                error: function (response) {
                    console.log(response);
                    Toastify({
                        text: response.responseJSON.message,
                        className: "danger",
                        style: {
                            background: "linear-gradient(310deg,#ea0606,#ff3d59)",
                        }
                    }).showToast();
                }
            });
        }));
        @endif
        /* News/Category update function end */

        /* News/Category delete function start */
        @if(\Illuminate\Support\Facades\Route::currentRouteNamed('admin.news.index'))
        $('.delete_new').on('click',(function (e){
            e.preventDefault();

            let formData = new FormData();
            formData.append('_method', 'DELETE')
            let newId = $(this).data('id')
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "news/delete/"+newId,
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log(response);
                    $('tr#new_' + newId).hide(800, function () {
                        $(this).remove()
                    });
                    Toastify({
                        text: "Saved successfully!",
                        className: "info",
                        style: {
                            background: "linear-gradient(310deg,#17ad37,#84dc14)",
                        }
                    }).showToast();
                },
                error: function (response) {
                    console.log(response);
                    Toastify({
                        text: response.responseJSON.message,
                        className: "danger",
                        style: {
                            background: "linear-gradient(310deg,#ea0606,#ff3d59)",
                        }
                    }).showToast();
                }
            });
        }));
        @endif
        /* News/Category delete function end */


        /* Common Toast notifies start */
            @if(session('success'))
                Toastify({
                    text: "{{ session('success') }}",
                    className: "success",
                    style: {
                        background: "linear-gradient(310deg,#17ad37,#84dc14)",
                    }
                }).showToast();
            @endif
            @if(session('error'))
                Toastify({
                    text: "{{ session('error') }}",
                    className: "danger",
                    style: {
                        background: "linear-gradient(310deg,#ea0606,#ff3d59)",
                    }
                }).showToast();
            @endif
        /* Common Toast notifies end */
    });
</script>
</body>

</html>
