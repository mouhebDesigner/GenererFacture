<nav class="navbar">
  <a href="#" class="sidebar-toggler">
    <i data-feather="menu"></i>
  </a>
  <div class="navbar-content">
    <form class="search-form">
      <div class="input-group">
       
      </div>
    </form>
    <ul class="navbar-nav">
     
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img class="wd-30 ht-30 rounded-circle" src="{{ asset('storage/'.Auth::user()->avatar) }}" alt="profile">
        </a>
        <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
          <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
            <div class="mb-3">
              <img class="wd-80 ht-80 rounded-circle" src="{{ asset('storage/'.Auth::user()->avatar) }}" alt="">
            </div>
            <div class="text-center">
              <p class="tx-16 fw-bolder">
                
                {{ Auth::user()->nom }} {{ Auth::user()->prenom }}
              </p>
              <p class="tx-12 text-muted">{{ Auth::user()->email }}</p>
            </div>
          </div>
          <ul class="list-unstyled p-1">
           
            
        
            <li class="dropdown-item py-2">
              
              <a class="text-body ms-0" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                <i class="me-2 icon-md" data-feather="log-out"></i>
                  {{ __('Se déconnecté') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</nav>