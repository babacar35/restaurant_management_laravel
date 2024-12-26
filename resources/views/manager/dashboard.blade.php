<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Manager') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-xl font-semibold mb-6">Gestion du restaurant</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <a href="{{ route('manager.categories.index') }}" class="block p-6 bg-white border rounded-lg shadow hover:bg-gray-50">
                            <div class="flex items-center justify-between mb-2">
                                <h5 class="text-2xl font-bold tracking-tight text-gray-900">Catégories</h5>
                                <span class="bg-indigo-100 text-indigo-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                    {{ \App\Models\Category::count() }} total
                                </span>
                            </div>
                            <p class="font-normal text-gray-700 mb-4">Gérer les catégories de plats et menus.</p>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-500">
                                    {{ \App\Models\Category::where('is_active', true)->count() }} catégories actives
                                </span>
                                <span class="inline-flex items-center text-indigo-600 hover:text-indigo-700">
                                    Gérer les catégories
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </span>
                            </div>
                        </a>

                        <a href="{{ route('manager.menus.index') }}" class="block p-6 bg-white border rounded-lg shadow hover:bg-gray-50">
                            <div class="flex items-center justify-between mb-2">
                                <h5 class="text-2xl font-bold tracking-tight text-gray-900">Menus</h5>
                                <span class="bg-emerald-100 text-emerald-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                    {{ \App\Models\Menu::count() }} total
                                </span>
                            </div>
                            <p class="font-normal text-gray-700 mb-4">Gérer les plats et menus disponibles.</p>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-500">
                                    {{ \App\Models\Menu::where('is_active', true)->count() }} plats actifs
                                </span>
                                <span class="inline-flex items-center text-emerald-600 hover:text-emerald-700">
                                    Gérer les menus
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 