<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Gestion des menus') }}
            </h2>
            <a href="{{ route('manager.menus.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                Créer un menu
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($menus as $menu)
                            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                                @if($menu->image_path)
                                    <img src="{{ Storage::url($menu->image_path) }}" alt="{{ $menu->name }}" class="w-full h-48 object-cover">
                                @else
                                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                        <span class="text-gray-400">Pas d'image</span>
                                    </div>
                                @endif

                                <div class="p-4">
                                    <div class="flex justify-between items-start mb-2">
                                        <h3 class="text-lg font-semibold">{{ $menu->name }}</h3>
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $menu->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $menu->is_active ? 'Actif' : 'Inactif' }}
                                        </span>
                                    </div>

                                    <p class="text-sm text-gray-600 mb-2">{{ Str::limit($menu->description, 100) }}</p>

                                    <div class="flex justify-between items-center mb-2">
                                        <span class="text-indigo-600 font-semibold">{{ number_format($menu->price, 2) }} €</span>
                                        <span class="text-sm text-gray-500">{{ $menu->category->name }}</span>
                                    </div>

                                    <div class="flex justify-end space-x-2 mt-4">
                                        <a href="{{ route('manager.menus.edit', $menu) }}"
                                           class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded-md text-sm hover:bg-indigo-200">
                                            Modifier
                                        </a>
                                        <form action="{{ route('manager.menus.destroy', $menu) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="bg-red-100 text-red-700 px-3 py-1 rounded-md text-sm hover:bg-red-200"
                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce menu ?')">
                                                Supprimer
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-6">
                        {{ $menus->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
