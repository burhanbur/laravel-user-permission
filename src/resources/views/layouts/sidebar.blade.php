  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('home') }}" class="brand-link">
      <img src="{{ asset('assets/logo-only.png') }}" alt="Biondi" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Biondi</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/images/contents/default.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('home') }}" class="d-block"><?= (Auth::check() ? Auth::user()->name : 'Administrator') ?></a>
        </div>
      </div>

      {{-- <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --> --}}

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item has-treeview">
            <a href="{{ route('home') }}" class="nav-link @if (Request::is('home*') || Request::is('/')) active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>          

          @role('user')
          <li class="nav-item has-treeview">
            <a href="{{ route('profile') }}" class="nav-link @if (Request::is('profile')) active @endif">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                Profile
              </p>
            </a>
          </li>
          @endrole

          @hasrole('super-admin')
          <li class="nav-header">USER MANAGEMENT</li>

          <li class="nav-item has-treeview @if (Request::is('manage-users', 'manage-admins')) menu-open @endif">
            <a href="#" class="nav-link @if (Request::is('manage-users', 'manage-admins')) active @endif">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Manage Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('manage-users') }}" class="nav-link  @if (Request::is('manage-users')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="{{ route('manage-admins') }}" class="nav-link  @if (Request::is('manage-admins')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Branch Admin</p>
                </a>
              </li> --}}
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="{{ route('manage-permissions') }}" class="nav-link @if (Request::is('manage-permissions*')) active @endif">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                Manage Permissions
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="{{ route('manage-roles') }}" class="nav-link @if (Request::is('manage-roles*')) active @endif">
              <i class="nav-icon fas fa-user-tag"></i>
              <p>
                Manage Roles
              </p>
            </a>
          </li>
          @endhasrole

        </ul>
      </nav>
    </div>
    
  </aside>