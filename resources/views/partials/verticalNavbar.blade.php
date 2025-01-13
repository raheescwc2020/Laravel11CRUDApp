<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light">
    <div class="position-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('dashboard') }}">
                    Dashboard
                </a>
            </li>

            <!-- Product Menu (Collapsible) -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#productMenu" aria-expanded="false">
                    <i class="bi bi-box"></i> Products
                </a>
                <div class="collapse" id="productMenu">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('products.create') }}">
                                Create New Product
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('products.index') }}">
                                List of Products
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Other Menu Items -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    Settings
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>
