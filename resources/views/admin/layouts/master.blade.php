<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mentora Admin</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <div class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon">
                    <img class="w-75 h-75 rounded-circle" src="{{ asset('logoImages/logo.png') }}" alt="">
                </div>
                <div class="sidebar-brand-text mx-3">Mentora Admin</div>

            </div>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('dashboard') }}"><i
                        class="fas fa-fw fa-table text-white"></i><span>Dashboard
                    </span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('admin#category') }}"><i
                        class="fa-solid fa-circle-plus text-white"></i></i><span>Category </span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('admin#bookAdd') }}"><i
                        class="fa-solid fa-plus text-white"></i></i><span>Add
                        Books </span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('admin#bookList') }}"><i
                        class="fa-solid fa-layer-group text-white"></i><span>Book List </span></a>
            </li>


            <li class="nav-item">
                <a class="nav-link text-white" href="#"><i
                        class="fa-solid fa-credit-card text-white"></i></i><span>Payment Method
                    </span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="#"><i class="fa-solid fa-list text-white"></i><span>Sale
                        Information </span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href=""><i
                        class="fa-solid fa-cart-shopping text-white"></i><span>Order Board
                    </span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href=""><i
                        class="fa-solid fa-lock text-white"></i></i></i><span>Change Password
                    </span></a>
            </li>

            {{-- <li class="nav-item">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <span class="nav-link">
                        <button type="submit" class="btn bg-danger text-white"><i
                                class="fa-solid fa-right-from-bracket text-white"></i>
                            Logout</button>
                    </span>
                </form>
            </li> --}}
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3 text-primary">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Code Lab</span>
                                <img class="img-profile rounded-circle" src="">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>

                                <a class="dropdown-item" href="">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Add New Admin Account
                                </a>
                                <a class="dropdown-item" href="">
                                    <i class="fas fa-users fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Admin List
                                </a>

                                <a class="dropdown-item" href="">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    User List
                                </a>


                                <a class="dropdown-item" href="">
                                    <i class="fa-solid fa-lock fa-sm fa-fw mr-2 text-gray-400"></i></i></i>
                                    Change Password
                                </a>
                                <div class="dropdown-divider"></div>
                                <span class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <input type="submit" class="btn btn-danger text-white w-100" value="Logout">
                                    </form>
                                </span>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->


                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    {{-- <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#sidebarToggleTop').on('click', function() {
                $('body').toggleClass('sidebar-toggled');
            });
        });
    </script>

    @include('sweetalert::alert')

    @yield('script')
</body>

</html>
