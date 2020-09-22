<ul class="sidebar navbar-nav bg-dark">
<nav class="sidebar sidebar-expand sidebar-dark bg-dark"  >  
  <center><img src="{{ url('images/ssuka.png') }}" > </center>
  <center><marquee><p><a class="nav-link text-primary">Welcome to airplane and train tickets !</a></p></marquee></center>
    
        <li class="nav-item">
          <a class="nav-link text-primary dropdown-item" href="{{route('home')}}">
            <i class="fas fa-fw fa-tachometer-alt "></i>
            <span>Dashboard</span>
          </a>
        </li>

        @if(Auth::user()->level == 'admin')
        <li class="nav-item">
          <a class="nav-link text-primary dropdown-item" href="{{route('pengguna.data')}}">
            <i class="fas fa-fw fa-user "></i>
            <span>Pengguna</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-primary dropdown-item" href="{{route('transportation-type.data')}}">
            <i class="fas fa-fw fa-tags"></i>
            <span>Tipe Transportasi</span>
          </a>
        </li>

         <li class="nav-item">
          <a class="nav-link text-primary dropdown-item" href="{{route('transportation.data')}}">
            <i class="fas fa-fw fa-plane "></i>
            <span>Transportasi</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-primary dropdown-item" href="{{route('rute.data')}}">
            <i class="fas fa-fw fa-road "></i>
            <span>Rute</span>
          </a>
        </li>

         <li class="nav-item">
          <a class="nav-link text-primary dropdown-item" href="{{route('jadwal.data')}}">
            <i class="fas fa-fw fa-clock "></i>
            <span>Jadwal</span>
          </a>
        </li>

       

        @endif

         <li class="nav-item">
          <a class="nav-link text-primary dropdown-item" href="{{route('customer.data')}}">
            <i class="fas fa-fw fa-users "></i>
            <span>Pelanggan</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-primary dropdown-item" href="{{route('reservation.data')}}">
            <i class="fas fa-fw fa-calendar-alt "></i>
            <span>Reservation</span>
          </a>
        </li>

</ul>
