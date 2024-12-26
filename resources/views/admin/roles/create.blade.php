<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer un rôle') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('admin.roles.store') }}" class="space-y-6">
                        @csrf

                        <div>
                            <x-input-label for="name" :value="__('Nom')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div>
                            <x-input-label for="slug" :value="__('Slug')" />
                            <x-text-input id="slug" type="text" class="mt-1 block w-full bg-gray-100" readonly
                                :value="old('slug')" placeholder="Le slug sera généré automatiquement" />
                            <x-input-error class="mt-2" :messages="$errors->get('slug')" />
                            <p class="mt-1 text-sm text-gray-500">
                                Le slug est généré automatiquement à partir du nom.
                            </p>
                        </div>

                        <div class="flex items-center justify-end gap-4">
                            <a href="{{ route('admin.roles.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                {{ __('Annuler') }}
                            </a>
                            <x-primary-button>{{ __('Créer') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.getElementById('name').addEventListener('input', function() {
            let slug = this.value
                .toLowerCase()
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '') // Enlever les accents
                .replace(/[^a-z0-9-]/g, '-')     // Remplacer les caractères non autorisés par des tirets
                .replace(/-+/g, '-')             // Remplacer les tirets multiples par un seul
                .replace(/^-|-$/g, '');          // Enlever les tirets au début et à la fin
            document.getElementById('slug').value = slug;
        });
    </script>
    @endpush
</x-app-layout>
