<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MyApp')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>
        /* Automatically expand the collapsible menu on hover */
        #productMenu {
            display: none;
        }

        .nav-item:hover #productMenu {
            display: block;
        }
   
    </style>
 
    <script>


document.querySelectorAll('.nav-item').forEach(item => {
    item.addEventListener('mouseenter', function() {
        let collapseMenu = item.querySelector('.collapse');
        if (collapseMenu) {
            new bootstrap.Collapse(collapseMenu, { toggle: true });
        }
    });

    item.addEventListener('mouseleave', function() {
        let collapseMenu = item.querySelector('.collapse');
        if (collapseMenu) {
            new bootstrap.Collapse(collapseMenu, { toggle: false });
        }
    });
});
    </script>
</head>
<body class="d-flex flex-column min-vh-100">
@include('partials.navbar') 
<div class="container-fluid">
        <div class="row">
            <!-- Vertical Navbar Column -->
            <div class="col-md-3">
                @include('partials.verticalNavbar') <!-- Vertical Navbar included here -->
            </div>

            <!-- Content Column -->
            <div class="col-md-9">
                <div class="container mt-4">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @include('partials.footer')
</body>
</html>
