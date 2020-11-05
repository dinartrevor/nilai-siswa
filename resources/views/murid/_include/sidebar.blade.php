<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
  <div class="scrollbar-inner">
    <!-- Brand -->
    <div class="sidenav-header  align-items-center">
      <a class="navbar-brand" href="javascript:void(0)">
        <img src="/assets/img/icons/logo-dark.png" class="navbar-brand-img">
        <span style="float: left;/">SMKN 14 BANDUNG</span>
      </a>
    </div>
    <div class="navbar-inner">
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Nav items -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="/murid" class="nav-link {{Request::is('murid')?'active':''}}">
              <i class="ni ni-tv-2 text-primary"></i>
              <span class="nav-link-text">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="/murid/histori-nilai" class="nav-link {{Request::is('murid/histori-nilai')?'active':''}}">
              <i class="fas fa-users text-orange"></i>
              <span class="nav-link-text">Histori Nilai</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="/murid/edit-profil" class="nav-link {{Request::is('murid/edit-profil')?'active':''}}">
              <i class="fas fa-user text-success"></i>
              <span class="nav-link-text">Edit Profil</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>