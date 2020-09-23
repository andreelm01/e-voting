    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('administrator')}}">
        <div class="sidebar-brand-icon">
          <i class="fas fa-vote-yea"></i>
        </div>
        <div class="sidebar-brand-text mx-3">E-Voting</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{route('administrator')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading User Master-->
      <div class="sidebar-heading">
        Master
      </div>

      <!-- Nav Item - RW -->
      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse" aria-expanded="true" aria-controls="collapse">
          <i class="fas fa-fw fa-list"></i>
          <span>RW</span>
        </a>
        <div id="collapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menu RW:</h6>
            <a class="collapse-item" href="{{route('admin-rw.create')}}">Tambah RW</a>
            <a class="collapse-item" href="{{route('admin-rw.index')}}">Data RW</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - RT -->
      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
          <i class="fas fa-fw fa-list"></i>
          <span>RT</span>
        </a>
        <div id="collapse1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menu RT:</h6>
            <a class="collapse-item" href="{{route('admin-rt.create')}}">Tambah RT</a>
            <a class="collapse-item" href="{{route('admin-rt.index')}}">Data RT</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - User -->
      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
          <i class="fas fa-fw fa-users"></i>
          <span>User</span>
        </a>
        <div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menu User:</h6>
            <a class="collapse-item" href="{{route('admin-user.create')}}">Tambah User</a>
            <a class="collapse-item" href="{{route('admin-user.index')}}">Data User</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Pemilihan -->
      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Pemilihan</span>
        </a>
        <div id="collapse3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menu Pemilihan:</h6>
            <a class="collapse-item" href="{{route('admin-pemilihan.create')}}">Tambah Pemilihan</a>
            <a class="collapse-item" href="{{route('admin-pemilihan.index')}}">Data Pemilihan</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Pemilihan -->
      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse4" aria-expanded="true" aria-controls="collapse4">
          <i class="fas fa-fw fa-users"></i>
          <span>Calon</span>
        </a>
        <div id="collapse4" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menu Calon:</h6>
            <a class="collapse-item" href="{{route('admin-calon.create')}}">Tambah Calon</a>
            <a class="collapse-item" href="{{route('admin-calon.index')}}">Data Calon</a>
          </div>
        </div>
      </li>
    
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Hasil -->
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin-hasil.index') }}">
          <i class="fas fa-fw fa-vote-yea"></i>
          <span>Hasil</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Hasil -->
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin-log.index') }}">
          <i class="fas fa-fw fa-history"></i>
          <span>Log User</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>