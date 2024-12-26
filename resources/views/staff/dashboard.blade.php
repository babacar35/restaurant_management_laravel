<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Staff') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold mb-4">Bienvenue, {{ Auth::user()->name }} !</h3>
                    <p class="text-lg text-gray-600">
                        En tant que membre du staff, vous avez accès aux outils nécessaires pour gérer les tâches quotidiennes
                        et assister les clients. N'hésitez pas à utiliser les différentes fonctionnalités à votre disposition.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 