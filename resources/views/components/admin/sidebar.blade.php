<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="/admin">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Control Planel
            </a>
            <div class="sb-sidenav-menu-heading">Main</div>
            <a class="nav-link" href="{{ route('admin.categories') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Categorys
            </a>
            <a class="nav-link" href="{{ route('admin.news') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                News
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        Start Bootstrap
    </div>
</nav>