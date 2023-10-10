<ul class="nav">
    <li class="nav-item nav-category">{{ __('Menu') }}</li>
    <li class="nav-item @if(Request::is('home')) active @endif">
        <a href="{{ url('/home') }}" class="nav-link">
            <i class="link-icon" data-feather="box"></i>
            <span class="link-title">{{ __('Acceuil') }}</span>
        </a>
    </li>
    <li class="nav-item @if(Request::is('clients*')) active @endif">
        <a class="nav-link" data-bs-toggle="collapse" href="#clients" role="button"
            aria-expanded="@if(Request::is('clients*')) true @else false @endif" aria-controls="email">
            <i class="link-icon" data-feather="mail"></i>
            <span class="link-title">{{ __('Clients') }}</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse @if(Request::is('clients')) show @endif" id="clients">
            <ul class="nav sub-menu">
                <li class="nav-item">
                    <a href="{{ route('clients.index') }}"
                        class="nav-link @if(Request::is('clients')) active @endif">{{ __('Liste de client') }}</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('clients.create') }}"
                        class="nav-link @if(Request::is('clients/create')) active @endif">{{ __('Ajouter client') }}</a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item @if(Request::is('services*')) active @endif">
        <a class="nav-link" data-bs-toggle="collapse" href="#services" role="button"
            aria-expanded="@if(Request::is('services*')) true @else false @endif" aria-controls="email">
            <i class="link-icon" data-feather="mail"></i>
            <span class="link-title">{{ __('Services') }}</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse @if(Request::is('services')) show @endif" id="services">
            <ul class="nav sub-menu">
                <li class="nav-item">
                    <a href="{{ route('services.index') }}"
                        class="nav-link @if(Request::is('services')) active @endif">{{ __('Liste de services') }}</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('services.create') }}"
                        class="nav-link @if(Request::is('services/create')) active @endif">{{ __('Ajouter service') }}</a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item @if(Request::is('devis*')) active @endif">
        <a class="nav-link" data-bs-toggle="collapse" href="#devis" role="button"
            aria-expanded="@if(Request::is('devis*')) true @else false @endif" aria-controls="email">
            <i class="link-icon" data-feather="mail"></i>
            <span class="link-title">{{ __('Dévis') }}</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse @if(Request::is('devis')) show @endif" id="devis">
            <ul class="nav sub-menu">
                <li class="nav-item">
                    <a href="{{ route('devis.index') }}"
                        class="nav-link @if(Request::is('devis')) active @endif">{{ __('Liste de dévis') }}</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('devis.create') }}"
                        class="nav-link @if(Request::is('devis/create')) active @endif">{{ __('Ajouter dévis') }}</a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item @if(Request::is('factures*')) active @endif">
        <a class="nav-link"  href="{{ route('factures.index') }}" role="button"
            aria-expanded="@if(Request::is('factures*')) true @else false @endif" aria-controls="email">
            <i class="link-icon" data-feather="mail"></i>
            <span class="link-title">{{ __('Factures') }}</span>
        </a>
       
    </li>
    
   

</ul>
