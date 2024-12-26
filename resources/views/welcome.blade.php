<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Le Festin - Restaurant Gastronomique</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <!-- Swiper CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    </head>
    <body class="antialiased">
        <!-- Navigation -->
        <nav class="bg-white shadow-lg fixed w-full z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="flex-shrink-0 flex items-center">
                            <h1 class="text-2xl font-bold text-gray-800">Le Festin</h1>
                        </div>
                    </div>
                    <div class="flex items-center">
                        @if (Route::has('login'))
                            <div class="space-x-4">
                                @auth
                                    @if(auth()->user()->isAdmin())
                                        <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-gray-900">Dashboard Admin</a>
                                    @elseif(auth()->user()->isManager())
                                        <a href="{{ route('manager.dashboard') }}" class="text-gray-700 hover:text-gray-900">Dashboard Manager</a>
                                    @else
                                        <a href="{{ route('client.dashboard') }}" class="text-gray-700 hover:text-gray-900">Dashboard Client</a>
                                    @endif
                                @else
                                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900">Se connecter</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-900 font-medium">
                                            S'inscrire
                                        </a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <div class="relative bg-center bg-cover h-screen" style="background-image: url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80');">
            <div class="absolute inset-0 bg-black opacity-50"></div>
            <div class="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8 h-full flex items-center">
                <div class="text-center">
                    <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl md:text-6xl">
                        Bienvenue au Festin
                    </h1>
                    <p class="mt-6 max-w-2xl mx-auto text-xl text-gray-300">
                        Une expérience gastronomique unique dans un cadre exceptionnel
                    </p>
                    <div class="mt-10 flex justify-center gap-4">
                        <a href="#reservation" class="bg-indigo-600 text-white px-8 py-3 rounded-md hover:bg-indigo-700 transition">
                            Réserver une table
                        </a>
                        <a href="#menu" class="bg-white text-gray-900 px-8 py-3 rounded-md hover:bg-gray-100 transition">
                            Voir le menu
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                        Nos Services
                    </h2>
                    <p class="mt-4 text-xl text-gray-600">
                        Découvrez tout ce que nous avons à vous offrir
                    </p>
                </div>

                <div class="mt-12 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    <!-- Réservation en ligne -->
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <div class="text-center">
                            <i class="fas fa-calendar-alt text-4xl text-indigo-600 mb-4"></i>
                            <h3 class="text-xl font-bold text-gray-900">Réservation en ligne</h3>
                            <p class="mt-4 text-gray-600">
                                Réservez votre table en quelques clics et recevez une confirmation instantanée.
                            </p>
                        </div>
                    </div>

                    <!-- Menu en ligne -->
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <div class="text-center">
                            <i class="fas fa-utensils text-4xl text-indigo-600 mb-4"></i>
                            <h3 class="text-xl font-bold text-gray-900">Menu en ligne</h3>
                            <p class="mt-4 text-gray-600">
                                Consultez notre carte et découvrez nos spécialités avant votre visite.
                            </p>
                        </div>
                    </div>

                    <!-- Suivi de commande -->
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <div class="text-center">
                            <i class="fas fa-clock text-4xl text-indigo-600 mb-4"></i>
                            <h3 class="text-xl font-bold text-gray-900">Suivi de commande</h3>
                            <p class="mt-4 text-gray-600">
                                Suivez en temps réel l'état de votre commande et votre réservation.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Menu Preview Section -->
        <div id="menu" class="py-16 bg-gradient-to-b from-gray-50 to-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-4xl font-bold text-gray-900 sm:text-5xl mb-2">
                        Notre Menu
                    </h2>
                    <div class="w-24 h-1 bg-indigo-600 mx-auto mb-8"></div>
                    <p class="mt-4 text-xl text-gray-600">
                        Un aperçu de nos spécialités
                    </p>
                </div>

                <div class="mt-12">
                    <div class="py-16 relative">
                        <div class="swiper menuSwiper">
                            <div class="swiper-wrapper">
                                @foreach($menus as $menu)
                                    <div class="swiper-slide p-4">
                                        <div class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-500 h-full flex flex-col backdrop-blur-sm bg-white/90 border border-gray-200">
                                            <div class="relative pt-[66.67%] overflow-hidden">
                                                @if($menu->image_path)
                                                    <img src="{{ asset('storage/' . $menu->image_path) }}"
                                                         alt="{{ $menu->name }}"
                                                         class="absolute top-0 left-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                                         onerror="this.src='{{ asset('images/default-menu.jpg') }}'">
                                                @else
                                                    <img src="{{ asset('images/default-menu.jpg') }}"
                                                         alt="{{ $menu->name }}"
                                                         class="absolute top-0 left-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                                @endif
                                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                                            </div>
                                            <div class="p-8 flex-1 flex flex-col">
                                                <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-indigo-600 transition-colors">{{ $menu->name }}</h3>
                                                <p class="text-gray-600 line-clamp-3 mb-6 flex-1">{{ $menu->description }}</p>
                                                <div class="flex justify-between items-center">
                                                    <p class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-violet-500">
                                                        {{ number_format($menu->price, 2) }} €
                                                    </p>
                                                    <button class="px-6 py-3 bg-gradient-to-r from-indigo-600 to-violet-500 text-white rounded-xl hover:shadow-lg hover:shadow-indigo-500/30 transform hover:-translate-y-1 transition-all duration-300">
                                                        Commander
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination !-bottom-2"></div>
                            <div class="swiper-button-next !w-12 !h-12 !bg-white/80 backdrop-blur-sm !rounded-full !shadow-xl after:!text-lg hover:!bg-white transition-colors"></div>
                            <div class="swiper-button-prev !w-12 !h-12 !bg-white/80 backdrop-blur-sm !rounded-full !shadow-xl after:!text-lg hover:!bg-white transition-colors"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reservation Section -->
        <div id="reservation" class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                        Réservez votre table
                    </h2>
                    <p class="mt-4 text-xl text-gray-600">
                        Simple, rapide et pratique
                    </p>
                </div>

                <div class="mt-12 max-w-lg mx-auto">
                    <div class="bg-gray-50 p-8 rounded-lg shadow-md">
                        <p class="text-center text-gray-600 mb-6">
                            Pour réserver une table, connectez-vous ou créez un compte.
                        </p>
                        <div class="flex justify-center space-x-4">
                            <a href="{{ route('login') }}" class="bg-indigo-600 text-white px-6 py-3 rounded-md hover:bg-indigo-700">
                                Se connecter
                            </a>
                            <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-900 px-6 py-3 rounded-md border border-indigo-600 hover:border-indigo-900">
                                S'inscrire
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-gray-900">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div>
                        <h3 class="text-white text-lg font-bold mb-4">Le Festin</h3>
                        <p class="text-gray-400">
                            Une expérience gastronomique unique
                        </p>
                    </div>
                    <div>
                        <h3 class="text-white text-lg font-bold mb-4">Contact</h3>
                        <p class="text-gray-400">
                            123 Rue de la Gastronomie<br>
                            75000 Paris<br>
                            Tél: 01 23 45 67 89<br>
                            Email: contact@lefestin.fr
                        </p>
                    </div>
                    <div>
                        <h3 class="text-white text-lg font-bold mb-4">Horaires</h3>
                        <p class="text-gray-400">
                            Lundi - Samedi<br>
                            12h00 - 14h30<br>
                            19h00 - 22h30<br>
                            Fermé le dimanche
                        </p>
                    </div>
                </div>
                <div class="mt-8 border-t border-gray-800 pt-8 text-center">
                    <p class="text-gray-400">&copy; 2024 Le Festin. Tous droits réservés.</p>
                </div>
            </div>
        </footer>

        <!-- Swiper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
        <script>
            var swiper = new Swiper(".menuSwiper", {
                effect: "coverflow",
                grabCursor: true,
                centeredSlides: true,
                slidesPerView: "auto",
                coverflowEffect: {
                    rotate: 0,
                    stretch: 0,
                    depth: 100,
                    modifier: 2,
                    slideShadows: false,
                },
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                    dynamicBullets: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                breakpoints: {
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 30,
                    },
                },
            });
        </script>
    </body>
</html>
