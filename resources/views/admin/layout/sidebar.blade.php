<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin_dashboard') }}">
                <i class="fas fa-user-shield mr-2"></i> Admin Panel
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin_dashboard') }}">
                <i class="fas fa-shield-alt"></i>
            </a>
        </div>

        <ul class="sidebar-menu mt-3">
            <li class="{{ request()->routeIs('admin_dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i> <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item dropdown {{ request()->is('admin/item1*') || request()->is('admin/item2*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-layer-group"></i> <span>Dropdown Items</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->is('admin/item1*') ? 'active' : '' }}">
                        <a class="nav-link" href="">
                            <i class="fas fa-angle-right"></i> Item 1
                        </a>
                    </li>
                    <li class="{{ request()->is('admin/item2*') ? 'active' : '' }}">
                        <a class="nav-link" href="">
                            <i class="fas fa-angle-right"></i> Item 2
                        </a>
                    </li>
                </ul>
            </li>

            <li class="{{ request()->is('admin/profile*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_profile') }}">
                    <i class="fas fa-user-circle"></i> <span>Profile</span>
                </a>
            </li>

            <li class="{{ request()->is('admin/setting*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_home_banner') }}">
                    <i class="fas fa-image"></i> <span>Home Banner</span>
                </a>
            </li>


            <li class="{{ request()->is('admin/form*') ? 'active' : '' }}">
                <a class="nav-link" href="">
                    <i class="fas fa-edit"></i> <span>Form</span>
                </a>
            </li>

            <li class="{{ request()->is('admin/table*') ? 'active' : '' }}">
                <a class="nav-link" href="">
                    <i class="fas fa-table"></i> <span>Table</span>
                </a>
            </li>

            <li class="{{ request()->is('admin/invoice*') ? 'active' : '' }}">
                <a class="nav-link" href="">
                    <i class="fas fa-file-invoice-dollar"></i> <span>Invoice</span>
                </a>
            </li>
        </ul>
    </aside>
</div>

<script>
    document.querySelectorAll('.has-dropdown').forEach(el => {
        el.addEventListener('click', function (e) {
            e.preventDefault();
            const submenu = this.nextElementSibling;
            submenu.classList.toggle('d-block');
        });
    });
</script>
