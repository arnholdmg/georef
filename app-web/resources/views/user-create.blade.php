<x-app-layout>
    <x-slot name="header">
    <div class="flex justify-between">
        <h2 class="font-semibold text-xl py-3 text-gray-800 leading-tight">
            Novo Usuário
        </h2>
    </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            livewire('patient-create')
        </div>
    </div>
</x-app-layout>