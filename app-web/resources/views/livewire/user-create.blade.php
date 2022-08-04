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
            <label for="email">
                <span class="block text-sm uppercase font-bold">e-Mail</span>
            </label>
            <input type="text" name="email" id="email" wire:model="email" class="my-2 block w-full text-sm rounded-md border-1"/>
            @error('email')
            <label for="email">
                <span class="block text-sm text-red-600">{{ $message }}</span>
            </label>
            @enderror
        </div>
        <div class="mb-6">
            <label>
                <span class="block text-sm uppercase font-bold">Permissões do usuário</span>
            </label>
        </div>
        <div class="mb-6">
            <label for="toggle-isAdmArea" class="inline-flex relative items-center cursor-pointer">
                <input type="checkbox" value="" id="toggle-isAdmArea" class="sr-only peer" wire:click="toggleAdmArea" @if($isAdmArea) checked @endif>
                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                <span class="ml-3 text-md font-medium text-gray-900">Gerenciar áreas</span>
            </label>
        </div>
        <div class="mb-6">
            <label for="toggle-isAdmGroup" class="inline-flex relative items-center cursor-pointer">
                <input type="checkbox" value="" id="toggle-isAdmGroup" class="sr-only peer" wire:click="toggleAdmGroup" @if($isAdmGroup) checked @endif>
                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                <span class="ml-3 text-md font-medium text-gray-900">Gerenciar grupos</span>
            </label>
        </div>
        <div class="mb-6">
            <label for="toggle-isAdmPatient" class="inline-flex relative items-center cursor-pointer">
                <input type="checkbox" value="" id="toggle-isAdmPatient" class="sr-only peer" wire:click="toggleAdmPatient" @if($isAdmPatient) checked @endif>
                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                <span class="ml-3 text-md font-medium text-gray-900">Gerenciar pacientes</span>
            </label>
        </div>
        <div class="mb-6">
            <label for="toggle-isAdmUser" class="inline-flex relative items-center cursor-pointer">
                <input type="checkbox" value="" id="toggle-isAdmUser" class="sr-only peer" wire:click="toggleAdmUser" @if($isAdmUser) checked @endif>
                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                <span class="ml-3 text-md font-medium text-gray-900">Gerenciar usuários</span>
            </label>
        </div>
        <div class="mb-6">
            <label>
                <span class="block text-sm uppercase font-bold">Após o cadastro, o usuário deve ser orientado a solicitar recuperação de senha na página de login e, então, será enviado link para definição de senha de acesso.</span>
            </label>
        </div>
        <div class="mb-6">
            <button type="submit" class="px-6 py-3 block w-full text-center text-white rounded-full bg-blue-700 hover:bg-blue-800">
                Salvar Usuário
            </button>
        </div>
    </form>
    <div class="mb-6">
        <a href="{{ route('user') }}" class="px-6 py-3 block w-full text-center text-gray-800 no-underline bg-gray-200 rounded-full hover:bg-gray-300">
            Voltar
        </a>
    </div>
</div>
