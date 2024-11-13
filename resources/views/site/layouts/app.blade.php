<!doctype html>
<html lang="@if(isset($all_view['loacale'])){{ $all_view['locale'] }}@endif">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Naya Press
    </title>
    <link rel="shortcut icon" href="{{asset('assets/frontend/images/Logo.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/scss/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/custom.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css"
        referrerpolicy="no-referrer" />
    @yield('css')
<style>
    .newsportal-info-pic.text-center ul{
    list-style: none; !important
    }
</style>
</head>

<body>

  @include('site.includes.header')


  @include('site.includes.nav')

  @yield('content')

  @include('site.includes.footer')

<!-- For Js Library -->
<script src="{{asset('assets/frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/jquery-3.6.0.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="{{asset('assets/frontend/js/owl.carousel.min.js')}}"></script>
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script>
        var typed = new Typed('#element', {
            strings: [
                @if(isset($all_view['setting']->site_description)) 
                    "{!! addslashes($all_view['setting']->site_description) !!}"
                @else 
                    "Welcome to our website!" // Default message if site_description is not set
                @endif
            ],
            typeSpeed: 50,
            loop: true,
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
            myModal.show();
        });
    </script>
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            navText: ['<span class="fas fa-chevron-left fa-1x"></span>',
                '<span class="fas fa-chevron-right fa-1x"></span>'
            ],
            responsive: {
                0: {
                    items: 1,
                    loop: true,
                    margin: 10,
                    autoplay: true,
                    autoplayTimeout: 3000,
                    autoplayHoverPause: true
                },
                600: {
                    items: 2,
                    loop: true,
                    margin: 10,
                    autoplay: true,
                    autoplayTimeout: 3000,
                    autoplayHoverPause: true
                },
                1000: {
                    items: 3,
                    loop: true,
                    margin: 10,
                    autoplay: true,
                    autoplayTimeout: 3000,
                    autoplayHoverPause: true
                },
                1200: {
                    items: 4,
                    loop: true,
                    margin: 10,
                    autoplay: true,
                    autoplayTimeout: 3000,
                    autoplayHoverPause: true

                }
            }
        });
        $('.play').on('click', function () {
            owl.trigger('play.owl.autoplay', [1000])
        })
        $('.stop').on('click', function () {
            owl.trigger('stop.owl.autoplay')
        })

        $('#digital-owl').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            navText: ['<span class="fas fa-chevron-left fa-1x"></span>',
                '<span class="fas fa-chevron-right fa-1x"></span>'
            ],
            responsive: {
                0: {
                    items: 1,
                    loop: true,
                    margin: 10,
                    autoplay: true,
                    autoplayTimeout: 3000,
                    autoplayHoverPause: true
                },
                600: {
                    items: 2,
                    loop: true,
                    margin: 10,
                    autoplay: true,
                    autoplayTimeout: 3000,
                    autoplayHoverPause: true
                },
                1200: {
                    items: 3,
                    loop: true,
                    margin: 10,
                    autoplay: true,
                    autoplayTimeout: 3000,
                    autoplayHoverPause: true

                }
            }
        });
        $('.play').on('click', function () {
            owl.trigger('play.owl.autoplay', [1000])
        })
        $('.stop').on('click', function () {
            owl.trigger('stop.owl.autoplay')
        })

    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var dropdownSubmenus = document.querySelectorAll('.dropdown-submenu .dropdown-toggle');

            dropdownSubmenus.forEach(function (element) {
                element.addEventListener('click', function (event) {
                    event.preventDefault();
                    event.stopPropagation();

                    var submenu = this.nextElementSibling;

                    document.querySelectorAll('.dropdown-submenu .dropdown-menu.show').forEach(function (openSubmenu) {
                        if (openSubmenu !== submenu) {
                            openSubmenu.classList.remove('show');
                        }
                    });

                    if (submenu) {
                        submenu.classList.toggle('show');
                    }
                });
            });

            document.addEventListener('click', function (event) {
                if (!event.target.closest('.dropdown')) {
                    document.querySelectorAll('.dropdown-submenu .dropdown-menu.show').forEach(function (openSubmenu) {
                        openSubmenu.classList.remove('show');
                    });
                }
            });
        });

        document.addEventListener('click', function (event) {
            if (!event.target.closest('.dropdown')) {
                document.querySelectorAll('.dropdown-submenu .dropdown-menu.show').forEach(function (openSubmenu) {
                    openSubmenu.classList.remove('show');
                });
            }
        });
    </script>

@yield('js')
</body>

</html>