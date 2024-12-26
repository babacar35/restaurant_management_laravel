<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Statistiques globales -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-xl font-semibold mb-4">Aperçu général</h3>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        <div class="p-4 bg-blue-50 rounded-lg shadow-lg shadow-blue-300">
                            <p class="text-2xl font-bold text-blue-600">{{ \App\Models\User::count() }}</p>
                            <p class="text-sm text-gray-600">Utilisateurs total</p>
                            <p class="text-xs text-gray-500 mt-1">+{{ \App\Models\User::where('created_at', '>=', now()->subDays(7))->count() }} cette semaine</p>
                        </div>
                        <div class="p-4 bg-yellow-50 rounded-lg shadow-lg shadow-yellow-100">
                            <p class="text-2xl font-bold text-yellow-600">{{ \App\Models\Category::count() }}</p>
                            <p class="text-sm text-gray-600">Catégories</p>
                            <p class="text-xs text-gray-500 mt-1">{{ \App\Models\Category::where('is_active', true)->count() }} actives</p>
                        </div>
                        <div class="p-4 bg-purple-50 rounded-lg">
                            <p class="text-2xl font-bold text-purple-600">{{ \App\Models\Menu::count() }}</p>
                            <p class="text-sm text-gray-600">Plats</p>
                            <p class="text-xs text-gray-500 mt-1">{{ \App\Models\Menu::where('is_active', true)->count() }} disponibles</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gestion des utilisateurs et rôles -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-xl font-semibold mb-4">Administration des utilisateurs</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <a href="{{ route('admin.users.index') }}" class="block p-6 bg-white border rounded-lg shadow hover:bg-gray-50">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Gestion des utilisateurs</h5>
                            <p class="font-normal text-gray-700">Gérer les utilisateurs, leurs rôles et leurs permissions.</p>
                            <div class="mt-4 flex items-center text-sm text-gray-500">
                                <span>{{ \App\Models\User::count() }} utilisateurs</span>
                                <span class="mx-2">•</span>
                                <span>{{ \App\Models\User::whereDate('created_at', today())->count() }} aujourd'hui</span>
                            </div>
                        </a>

                        <a href="{{ route('admin.roles.index') }}" class="block p-6 bg-white border rounded-lg shadow hover:bg-gray-50">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Gestion des rôles</h5>
                            <p class="font-normal text-gray-700">Gérer les rôles et leurs permissions dans le système.</p>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Gestion du restaurant -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-xl font-semibold mb-4">Gestion du restaurant</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <a href="{{ route('admin.categories.index') }}" class="block p-6 bg-white border rounded-lg shadow hover:bg-gray-50">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Gestion des catégories</h5>
                            <p class="font-normal text-gray-700">Gérer les catégories de plats et menus.</p>
                            <div class="mt-4 flex items-center text-sm text-gray-500">
                                <span class="mr-2">{{ \App\Models\Category::count() }} catégories</span>
                                <span class="mx-2">•</span>
                                <span>{{ \App\Models\Category::where('is_active', true)->count() }} actives</span>
                            </div>
                        </a>

                        <a href="{{ route('admin.menus.index') }}" class="block p-6 bg-white border rounded-lg shadow hover:bg-gray-50">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Gestion des menus</h5>
                            <p class="font-normal text-gray-700">Gérer les plats et menus disponibles.</p>
                            <div class="mt-4 flex items-center text-sm text-gray-500">
                                <span class="mr-2">{{ \App\Models\Menu::count() }} plats</span>
                                <span class="mx-2">•</span>
                                <span>{{ \App\Models\Menu::where('is_active', true)->count() }} actifs</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
