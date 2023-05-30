<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0 text-center" href="/admin/dashboard">
        <img src="{{ trans('panel.logo') }}" class="navbar-brand-img text-center" alt="main_logo" style="height: 100px; width: 100px;">

      </a>
    </div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
    <ul class="navbar-nav">
    @can('admin_access')
      <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/dashboard') || request()->is('admin/dashboard/*') ? 'active' : '' }}" href="/admin/dashboard">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-house text-danger text-sm"></i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/customers') || request()->is('admin/customers/*') ? 'active' : '' }}" href="/admin/customers">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-list text-danger text-sm"></i>
          </div>
          <span class="nav-link-text ms-1">Manage Customers</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/manage_appointments') || request()->is('admin/manage_appointments/*') ? 'active' : '' }}" href="/admin/manage_appointments">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-list text-danger text-sm"></i>
          </div>
          <span class="nav-link-text ms-1">Manage Appointments</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/services') || request()->is('admin/services/*') ? 'active' : '' }}" href="/admin/services">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-list text-danger text-sm"></i>
          </div>
          <span class="nav-link-text  ms-1">Manage Services</span>
        </a>
      </li>
      @endcan
      @can('staff_access')
      <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/my_payroll') || request()->is('admin/my_payroll/*') ? 'active' : '' }}" href="/admin/my_payroll">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-list text-danger text-sm"></i>
          </div>
          <span class="nav-link-text  ms-1">My Payroll</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/my_attendance') || request()->is('admin/my_attendance/*') ? 'active' : '' }}" href="/admin/my_attendance">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-list text-danger text-sm"></i>
          </div>
          <span class="nav-link-text  ms-1">My Attendance</span>
        </a>
      </li>
      @endcan
      <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/feedback') || request()->is('admin/feedback/*') ? 'active' : '' }}" href="/admin/feedback">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-list text-danger text-sm"></i>
          </div>
          <span class="nav-link-text  ms-1">Feedbacks</span>
        </a>
      </li>
      @can('admin_access')
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Setting Pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('admin/payroll') ? 'active' : '' }}" href="/admin/payroll">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-collection text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Manage Payroll</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('admin/attendances') ? 'active' : '' }}" href="/admin/attendances">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-collection text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Manage Attendance</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('admin/admins') ? 'active' : '' }}" href="/admin/admins">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Administrator</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('admin/staffs') ? 'active' : '' }}" href="/admin/staffs">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Staffs</span>
          </a>
        </li>
      @endcan
    </ul>
  </div>

</aside>
