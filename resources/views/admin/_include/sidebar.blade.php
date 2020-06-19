<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
  <div class="scrollbar-inner">
    <!-- Brand -->
    <div class="sidenav-header  align-items-center">
      <a class="navbar-brand" href="javascript:void(0)">
        <img src="/assets/img/icons/logo-dark.png" class="navbar-brand-img">
        <span>SMK 14</span>
      </a>
    </div>
    <div class="navbar-inner">
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Nav items -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="/" class="nav-link {{Request::is('/')?'active':''}}">
              <i class="ni ni-tv-2 text-primary"></i>
              <span class="nav-link-text">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/murid" class="nav-link {{Request::is('admin/murid')?'active':''}}">
              <i class="fas fa-users text-orange"></i>
              <span class="nav-link-text">Murid</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/guru" class="nav-link {{Request::is('admin/guru')?'active':''}}">
              <i class="fas fa-user text-primary"></i>
              <span class="nav-link-text">Guru</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/kelas" class="nav-link {{Request::is('admin/kelas')?'active':''}}">
              <i class="ni ni-hat-3 text-yellow"></i>
              <span class="nav-link-text">Kelas</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/mapel" class="nav-link {{Request::is('admin/mapel')?'active':''}}">
              <i class="ni ni-books text-default"></i>
              <span class="nav-link-text">Mapel</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/remedial" class="nav-link {{Request::is('admin/remedial')?'active':''}}">
              <i class="fa fa-book text-info"></i>
              <span class="nav-link-text">Remedial</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>