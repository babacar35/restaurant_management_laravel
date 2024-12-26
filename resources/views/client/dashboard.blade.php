<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Espace Client') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold mb-4">Bienvenue chez L3Mio, {{ Auth::user()->name }} !</h3>
                    <p class="text-lg text-gray-600">
                        Bienvenue dans votre espace personnel. Ici, vous pouvez suivre vos réservations,
                        consulter le menu et communiquer avec notre équipe. N'hésitez pas à nous contacter si vous avez
                        besoin d'assistance.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
