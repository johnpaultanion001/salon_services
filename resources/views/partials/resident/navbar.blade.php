<nav class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
    <div class="container-fluid">
        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="../pages/dashboard.html">
            {{ trans('panel.site_title') }}
        </a>
        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon mt-2">
            <span class="navbar-toggler-bar bar1"></span>
            <span class="navbar-toggler-bar bar2"></span>
            <span class="navbar-toggler-bar bar3"></span>
        </span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
                @if(Auth()->user())
                    <li class="nav-item">
                        <a  class="btn btn-sm mb-0 me-1 btn-primary text-uppercase" href="../pages/sign-up.html">
                            <i class="fas fa-home  me-1"></i>
                            Home
                        </a>
                    </li>   
                    <li class="nav-item">
                        <a  class="btn btn-sm mb-0 me-1 text-uppercase" href="../pages/sign-up.html">
                            <i class="fas fa-file  me-1"></i>
                            New Request
                        </a>
                    </li>
                    <li class="nav-item">
                        <a  id="dropdownMenuButton" class="btn btn-sm mb-0 me-1 text-uppercase" href="javascript:;" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user  me-1"></i>
                            Profile
                            <i class="fas fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                            <li class="">
                                <a class="dropdown-item border-radius-md" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                                    <div class="d-flex py-1">
                                    <div class="my-auto">
                                        <i class="fas fa-arrow-right-from-bracket me-3"></i>
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                        <span class="font-weight-bold">LOGOUT</span>
                                        </h6>
                                    </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>    
                    
                @else
                    <li class="nav-item">
                        <a  class="btn btn-sm mb-0 me-1 btn-primary text-uppercase" href="../pages/sign-up.html">
                            <i class="fas fa-key  me-1"></i>
                            Sign In
                        </a>
                    </li>   
                    <li class="nav-item">
                        <a  class="btn btn-sm mb-0 me-1 text-uppercase" href="../pages/sign-up.html">
                            <i class="fas fa-user-circle  me-1"></i>
                            Sign Up
                        </a>
                    </li> 
                @endif
            </ul>
        </div>
    </div>
</nav>