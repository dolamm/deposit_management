<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
    <!-- Scripts -->
    @livewireStyles
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Dashboard</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="/" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                            </a>
                        </li>
                        <!-- <li>
                            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span> </a>
                            <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 1 </a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 2 </a>
                                </li>
                            </ul>
                        </li> -->
                        <li>
                            <a href="{{route('quanli-kyhan')}}" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Quản lí kỳ hạn</span></a>
                        </li>
                        <li>
                            <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                                <i class="fs-4 bi-piggy-bank-fill"></i><span class="ms-1 d-none d-sm-inline">Sổ Tiết Kiệm</span></a>
                            <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="{{route('add-passbook', Auth::user()->id)}}" class="nav-link px-0"> <span class="d-none d-sm-inline">Mở Sổ Tiết Kiệm</span></a>
                                </li>
                                <li>
                                    <a href="{{route('user-passbook', Auth::user()->id)}}" class="nav-link px-0"> <span class="d-none d-sm-inline">Sổ Tiết Kiệm Của Tôi</span></a>
                                </li>
                                @can('admin-officer')
                                <li>
                                    <a href="{{route('list-passbook')}}" class="nav-link px-0"> <span class="d-none d-sm-inline">Quản Lí Sổ Tiết Kiệm</span></a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                        @can('view-report')
                        <li>
                            <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-clipboard-data-fill"></i><span class="ms-1 d-none d-sm-inline">Báo cáo</span> </a>
                            <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="{{route('bcdoanhso')}}" class="nav-link px-0"> <span class="d-none d-sm-inline">Báo Cáo Doanh Số</span></a>
                                </li>
                                <li>
                                    <a href="{{route('bcslso')}}" class="nav-link px-0"> <span class="d-none d-sm-inline">Báo Cáo Số Lượng Sổ</span></a>
                                </li>
                            </ul>
                        </li>
                        @endcan
                        <li class="nav-item">
                            <a href="{{route('user-notification')}}" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-bell-fill"></i> <span class="ms-1 d-none d-sm-inline">Thông báo</span>
                                <span class="translate-end badge rounded-pill bg-danger">
                                    {{Auth::user()->unreadNotifications->count()}}
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('list-user')}}" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Thông Tin Người Dùng</span> </a>
                        </li>
                        <li>
                            <a href="#submenu4" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                                <i class="fs-4 bi-gear-fill"></i> <span class="ms-1 d-none d-sm-inline">Cài Đặt Hệ Thống</span></a>
                            <ul class="collapse nav flex-column ms-1" id="submenu4" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="{{route('system-config')}}" class="nav-link px-0"> <span class="d-none d-sm-inline">Thông Số Hệ Thống</span></a>
                                </li>
                                <li>
                                    <a href="{{route('edit-permission')}}" class="nav-link px-0"> <span class="d-none d-sm-inline">Quyền Người Dùng</span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <hr>
                    <div class="dropdown pb-4">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{Auth::user()->avatar}}" alt="hugenerd" width="30" height="30" class="rounded-circle">
                            <span class="d-none d-sm-inline mx-1">{{Auth::user()->fullname}}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                            <!-- <li><a class="dropdown-item" href="#">New project...</a></li> -->
                            <li><a class="dropdown-item" href="{{route('system-config')}}">Settings</a></li>
                            <li><a class="dropdown-item" href="{{route('update-profile', Auth::user()->id)}}">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Sign out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col py-3">
                <main>
                    @yield('content')
                </main>
                @livewireScripts
            </div>
        </div>
    </div>
</body>
<script>
    //notification
    window.addEventListener('alert', event => {
        toastr[event.detail.type](event.detail.message,
            event.detail.title ?? ''), toastr.options = {
            "closeButton": true,
            "progressBar": true,
        }
    });
</script>

</html>