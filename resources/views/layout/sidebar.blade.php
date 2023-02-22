<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Data Master
</div>
@if ($user->level == 1)
    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('produk') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Product</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('user') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>User</span></a>
    </li>
@elseif ($user->level == 2)
    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('produk') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Product</span></a>
    </li>
@endif
