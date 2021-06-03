<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Accueil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>Bienvenue sur Piggy Swag !</p>
                    <p>Il est temps de déposer vos annonces pour vous faire un max d'argent...</p>
                    <p>Ou d'acheter ce dont vous rêver pour pas si cher que ça.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
