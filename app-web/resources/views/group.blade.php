<x-app-layout>
    <x-slot name="header">
    <div class="flex justify-between">
        <h2 class="font-semibold text-xl py-3 text-gray-800 leading-tight">
            Grupos
        </h2>
        <a href="{{ route('group.create') }}" class="px-6 py-3 text-gray-800 no-underline bg-gray-200 rounded-full hover:bg-gray-300">
            Adicionar
        </a>
    </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @livewire('group-list')
        </div>
    </div>
</x-app-layout>