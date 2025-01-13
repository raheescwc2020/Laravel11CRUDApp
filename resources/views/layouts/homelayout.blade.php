<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MyApp')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>
        /* Automatically expand the collapsible menu on hover */
        #productMenu {
            display: none;
        }

        .nav-item:hover #productMenu {
            display: block;
        }
        .slider {
    position: relative;
    width: 100%;
    max-width: 800px;
    height: 400px;
    margin: 0 auto;
    overflow: hidden;
}

/* Slides Container */
.slides {
    display: flex;
    width: 400%; /* 4 images, so 100% * 4 */
    height: 100%;
    transition: transform 0.5s ease-in-out;
}

/* Individual Slide */
.slide {
    width: 100%;
    height: 100%;
    flex-shrink: 0;
}

/* Slide Image */
.slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
    </style>
    <script>

const slides = document.querySelector('.slides');
const totalSlides = document.querySelectorAll('.slide').length;

let currentIndex = 0;

function showNextSlide() {
    currentIndex = (currentIndex + 1) % totalSlides; // Loop back to the first slide
    slides.style.transform = `translateX(-${currentIndex * 100}%)`;
}

// Automatically change slides every 3 seconds
setInterval(showNextSlide, 3000);


    </script>
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
@include('partials.navbarguest') 
@include('partials.slider') 

    @include('partials.footer')
</body>
</html>
