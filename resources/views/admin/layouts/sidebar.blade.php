<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Group Insurance</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="{{route('home')}}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-search"></i>
                        <p>
                            Search
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{route('search.record')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Simple Search</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('user.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Users
                            {{--                            <i class="fas fa-angle-left right"></i>--}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Bank Management
                            <i class="fas fa-angle-left right"></i>
                            {{--                            <span class="badge badge-info right">6</span>--}}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('bank.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Banks</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('branch.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bank Branches</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('claims.all') }}" class="nav-link" >
                        <i class="nav-icon fas fa-copy"></i>
                        @if(Auth::user()->role == 1)
                        <p>
                            Recieved Claims
                        </p>
                        @elseif(Auth::user()->role == 3)
                            <p>
                                Submitted Claims
                            </p>
                        @endif
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('employeeee')}}" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Objection Claims
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Entry Forms
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('retirement.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Retirement</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('death.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Death</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('death.after.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Death After Retirement</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>
                            Reports
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('department.report')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Department Wise List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('department.summary')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Department Summary</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('bank.report')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bank Wise List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('bank.summary')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bank Summary</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('year.summary')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Year Wise Summary</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>
                            Payorder Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('payorder.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>PayOrders</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link"
                       onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt" ></i>
                        <p>
                            Logout
                        </p>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </a>
                </li>
            </ul>
        </nav>

    </div>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Home</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
