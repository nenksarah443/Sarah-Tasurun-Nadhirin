<nav class="navbar navbar-expand navbar-dark bg-primary static-top">

      <a class="navbar-brand mr-1" href="{{route('home')}}">
      Piknik Tour & Travel </a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <ul class="ml-auto"></ul>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        
        <li class=" dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw text-white"></i> {{ Auth::user()->fullname }}
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item  text-primary" href="{{route('pengguna.setting')}}" ><i class="fas fa-user-circle fa-fw"></i> Settings </a>
            <div class="divider">
           <a class="dropdown-item text-danger " href="#" data-toggle="modal" data-target="#logoutModal" ><i class="fas fa-sign fa-fw"></i> Logout </a>
          </div>
          </div>
        </li>
      </ul>

    </nav>
