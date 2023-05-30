<header id="header" class="fixed-top {{ request()->is('/') || request()->is('/*') ? '' :'header-inner-pages' }}">
    <div class="container d-flex align-items-center">
     <a href="/" class="me-auto text-white">
         <img  src="{{ trans('panel.logo') }}" alt="logo" height="40" >
     </a>
      <nav id="navbar" class="navbar">
        <ul>
            <li><a class="nav-link scrollto {{ request()->is('/#hero') ? 'active' : '' }}" href="/">Home</a></li>
          @if (Auth::user())
            <li><a class="nav-link scrollto  {{ request()->is('customer/appointment_service') || request()->is('customer/appointment_service/*') ? 'active' : '' }}" href="/customer/appointment_service">Appointment</a></li>
            <li><a class="nav-link scrollto  {{ request()->is('customer/manage_appointment') || request()->is('customer/manage_appointment/*') ? 'active' : '' }}" href="/customer/manage_appointment">Manage Appointment</a></li>
          @else
            <li><a class="nav-link scrollto" href="/#pricing">Services</a></li>
            <li><a class="nav-link scrollto" href="/#team">Employee</a></li>
          @endif
          <li><a class="nav-link scrollto" href="/#contact">Contact</a></li>
          <li class="dropdown"><a href="#" class="{{ request()->is('login') || request()->is('register') ? 'active' : '' }}"><span>Accounts</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
                @if (Auth::user())
                <li><a href="/customer/account">Edit Account</a></li>
                <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                @else
                <li><a href="/login">Login</a></li>
                <li><a href="/register">Register</a></li>
                @endif
            </ul>
          </li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>
