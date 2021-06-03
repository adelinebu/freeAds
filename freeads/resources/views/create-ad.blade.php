<x-app-layout>
    <x-slot name="header">
    <x-success-message />
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('Créer une annonce') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-validation-errors />
                    <x-success-message />

                <form method="POST" action="{{ route('ad.store') }}" enctype="multipart/form-data">
                @csrf

            <!-- Title -->
            <div>
                <x-label for="title" :value="__('Title')" />
                <x-input id="title" class="block mt-1 w-full" type="text" name="title"/>
            </div>

            <!-- Content -->
            <div class="mt-4">
                <x-label for="content" :value="__('Description')" />
                <textarea id="content" class="block mt-1 w-full h-24 rounded-md shadow-sm border-gray-300 focus:border-pink-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="content"></textarea>
            </div>

            <!-- Localisation -->
            <div class="mt-4">
                <x-label for="localisation" :value="__('Localisation')" />
                <x-input id="localisation" class="block mt-1 w-full" type="text" name="localisation"/>
            </div>

            <!-- Prix -->
            <div class="mt-4">
                <x-label for="price" :value="__('Price')" />
                <x-input id="price" class="block mt-1 w-full" type="number" name="price"/>
            </div>

            <!-- Image -->
            <div class="mt-4">
                <x-label for="image" :value="__('Image')" />
                <x-input id="image" class="block mt-1 w-full" type="file" name="image"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Ajouter mon annonce') }}
                </x-button>
            </div>
        </form>
                </div>            
            </div> 
        </div> 
    </div>
</x-app-layout>     