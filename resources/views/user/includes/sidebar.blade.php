    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('user') }}">
        <div class="sidebar-brand-icon">
          <i class="fas fa-vote-yea"></i>
        </div>
        <div class="sidebar-brand-text mx-3">E-Voting</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('user') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
    
      <hr class="sidebar-divider">
      
      @php
        $id_user = Session::get('id_user');
        $id_pemilihan = Session::get('id_pemilihan');
      @endphp

      <!-- Nav Item - Data Diri -->
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('profile' ,encrypt($id_user)) }}">
          <i class="fas fa-fw fa-user"></i>
          <span>Profile</span></a>
      </li>


      <hr class="sidebar-divider">

      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
          <i class="fas fa-fw fa-vote-yea"></i>
          <span>Pemilhan</span>
        </a>
        <div id="collapse1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menu Pemilihan:</h6>
            <a class="collapse-item" href="{{ route('user-pemilihan' ,encrypt($id_pemilihan)) }}">Pemilihan</a>
            <a class="collapse-item" href="{{ route('user-hasil', encrypt($id_pemilihan)) }}">Hasil Pemilihan</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>