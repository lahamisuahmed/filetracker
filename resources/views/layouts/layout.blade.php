<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Penetralia Hub FMS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  @include('partials.style')
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <a href="{{ route('home') }}" class="logo">
                <span class="logo-mini"><b>FMS</span>
                <span class="logo-lg"><b>Penetralia Hub FMS</b></span>
            </a>
            @include("partials.navbar")
        </header>

        <aside class="main-sidebar">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>{{ auth()->user()->name }}</p>
                        <a href="#">
                            <i class="fa fa-circle text-success"></i> Online
                        </a>
                    </div>
                </div>

                <ul class="sidebar-menu" data-widget="tree">
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Admin</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>

                        <ul class="treeview-menu">
                            <li><a href="{{ route('home') }}"><i class="fa fa-circle-o"></i> Dashboard</a></li>

                            <!-- <li class="treeview">
                                <li><a href="#"><i class="glyphicon glyphicon-user"></i> Administrators</a></li>
                            </li> -->

                            <li class="treeview">
                                <li><a href="{{ route('departments.index') }}"><i class="fa fa-building"></i> Departments </a></li>
                            </li>

                            <li class="treeview">
                                <li><a href="{{ route('units.index') }}"><i class="fa fa-building-o"></i> Units </a></li>
                            </li>

                            <li class="treeview">
                                <li><a href="{{ route('files.index') }}"><i class="fa fa-file"></i> Files </a></li>
                            </li>

                            <li class="treeview">
                                <a href="#"><i class="fa fa-arrows"></i> File Movements
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="{{ route('histories.create') }}"><i class="fa fa-plus"></i> Issue File</a></li>

                                    <li><a href="{{ route('histories.index') }}"><i class="fa fa-close"></i> Pending Files</a></li>

                                    <li><a href="{{ route('returnedfiles') }}"><i class="fa fa-check"></i> Returned Files</a></li>

                                    <li><a href="{{ route('duefiles') }}"><i class="fa fa-sign-out"></i> Due Files</a></li>
                                </ul>
                            </li>

                            
                        </ul>
                    </li>

                    <!-- <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>System</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>

                        <ul class="treeview-menu">
                            <li class="treeview">
                                <li><a href="#"><i class="fa fa-user"></i> Users</a></li>
                            </li>
                        </ul>
                    </li> -->

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <li>
                        <a 
                            href="{{ route('logout') }}" 
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        >
                            <i class="glyphicon glyphicon-log-out"></i><span> Logout</span>
                        </a>
                    </li>
                </ul>
            </section>
        </aside>

        <div class="content-wrapper">
            @yield('content')
        </div>

        @include("partials.footer")
    </div>

    @include('partials.scripts')
    @include('vendor.lara-izitoast.toast')
    @yield('script')
</body>
</html>
