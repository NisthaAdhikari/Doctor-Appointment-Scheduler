<!-- Logo -->
<a href="{{ route('dashboard') }}" class="logo">
  <!-- mini logo for sidebar mini 50x50 pixels -->
  <!--<span class="logo-mini"><b><img width="50" height="50" class="img-circle" alt="User Image"></b></span> -->
  <!-- logo for regular state and mobile devices -->
  <span class="logo-lg"><b><img src="{{ asset('img/logo1.png') }}" width="200" height="50" style="margin-left: 0" class="user-image" alt="User Image"></b></span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only"></span>
  </a>

  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <!-- Messages: style can be found in dropdown.less-->

      <!-- User Account: style can be found in dropdown.less -->
      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="{{ asset('img/logo.jpg') }}" class="user-image" alt="User Image">
          <span class="hidden-xs">{{(auth::user()->name)}}</span>
        </a>
        <ul class="dropdown-menu" style="width: 20px">

          <!-- Menu Body -->

          <!-- Menu Footer-->
          <li class="user-footer" >

            <div class="pull-right" >
               <a href="#" class="btn btn-default btn-flat"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Sign out
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
            </div>
          </li>
        </ul>
      </li>
      <!-- Control Sidebar Toggle Button -->

    </ul>
  </div>
</nav>
