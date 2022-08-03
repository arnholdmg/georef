<div>
    <form wire:submit.prevent="submit">
        <div class="mb-6">
            <label for="name">
                <span class="block text-sm uppercase font-bold">Nome</span>
            </label>
            <input type="text" name="name" id="name" wire:model="name" class="my-2 block w-full text-sm rounded-md border-1"/>
            @error('name')
            <label for="name">
                <span class="block text-sm text-red-600">{{ $message }}</span>
            </label>
            @enderror
        </div>
        <div class="mb-6">
            <label for="color">
                <span class="block text-sm uppercase font-bold">Cor</span>
                <span class="block text-sm">Hexadecimal no formato #FFFFFF.</span>
            </label>
            <input type="color" name="color" id="color" wire:model="color" class="my-2 block h-10 w-full text-sm rounded-md border-1"/>
            @error('color')
            <label for="color">
                <span class="block text-sm text-red-600">{{ $message }}</span>
            </label>
            @enderror
        </div>
        <div class="mb-6">
            <button type="submit" class="px-6 py-3 block w-full text-center text-white rounded-full bg-blue-700 hover:bg-blue-800">
                Salvar Grupo
            </button>
        </div>
    </form>
    <div class="mb-6">
        <a href="{{ route('group') }}" class="px-6 py-3 block w-full text-center text-gray-800 no-underline bg-gray-200 rounded-full hover:bg-gray-300">
            Voltar
        </a>
    </div>
</div>