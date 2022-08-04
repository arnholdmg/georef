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
            <label for="birth">
                <span class="block text-sm uppercase font-bold">Data de Nascimento</span>
            </label>
            <input type="date" name="birth" id="birth" wire:model="birth" class="my-2 block w-full text-sm rounded-md border-1"/>
            @error('birth')
            <label for="birth">
                <span class="block text-sm text-red-600">{{ $message }}</span>
            </label>
            @enderror
        </div>
        <div class="mb-6">
            <label for="cns">
                <span class="block text-sm uppercase font-bold">CNS</span>
            </label>
            <input type="number" name="cns" id="cns" wire:model="cns" class="my-2 block w-full text-sm rounded-md border-1"/>
            @error('cns')
            <label for="cns">
                <span class="block text-sm text-red-600">{{ $message }}</span>
            </label>
            @enderror
        </div>
        <div class="mb-6">
            <label for="phone">
                <span class="block text-sm uppercase font-bold">Telefone</span>
            </label>
            <input type="number" name="phone" id="phone" wire:model="phone" class="my-2 block w-full text-sm rounded-md border-1"/>
            @error('phone')
            <label for="phone">
                <span class="block text-sm text-red-600">{{ $message }}</span>
            </label>
            @enderror
        </div>
        <div class="mb-6">
            <label for="responsible">
                <span class="block text-sm uppercase font-bold">Responsável</span>
                <span class="block text-sm">Não obrigatório. Preencher com o nome da pessoa, caso se aplique (ex: paciente menor de idade; paciente sem meio formal de comunicação).</span>
            </label>
            <input type="text" name="responsible" id="responsible" wire:model="responsible" class="my-2 block w-full text-sm rounded-md border-1"/>
            @error('responsible')
            <label for="responsible">
                <span class="block text-sm text-red-600">{{ $message }}</span>
            </label>
            @enderror
        </div>
        <div class="mb-6">
            <label for="relationship">
                <span class="block text-sm uppercase font-bold">Relação do responsável com paciente</span>
                <span class="block text-sm">Não obrigatório. Preencher com o tipo de relação, caso se aplique (ex: paciente menor de idade; paciente sem meio formal de comunicação).</span>
            </label>
            <input type="text" name="relationship" id="relationship" wire:model="relationship" class="my-2 block w-full text-sm rounded-md border-1"/>
            @error('relationship')
            <label for="relationship">
                <span class="block text-sm text-red-600">{{ $message }}</span>
            </label>
            @enderror
        </div>
        <div class="mb-6">
            <label for="address">
                <span class="block text-sm uppercase font-bold">Endereço</span>
            </label>
            <input type="text" name="address" id="address" wire:model="address" class="my-2 block w-full text-sm rounded-md border-1"/>
            @error('address')
            <label for="address">
                <span class="block text-sm text-red-600">{{ $message }}</span>
            </label>
            @enderror
        </div>
        <div class="mb-6">
            <label for="coord">
                <span class="block text-sm uppercase font-bold">Coordenada</span>
                <span class="block text-sm">Formato lat,long. (<a target="_blank" class="hover:underline" href="{{ route('coord') }}">Procurar Coordenada</a>)</span>
            </label>
            <input type="text" name="coord" id="coord" wire:model="coord" class="my-2 block w-full text-sm rounded-md border-1"/>
            @error('coord')
            <label for="coord">
                <span class="block text-sm text-red-600">{{ $message }}</span>
            </label>
            @enderror
        </div>
        <div class="mb-6">
            <label for="area_id">
                <span class="block text-sm uppercase font-bold">Área</span>
            </label>
                <select id="area_id" name="area_id"  wire:model="area_id" class="my-2 block w-full text-sm border-1 rounded-md">
                    <option>Selecione uma área...</option>
                    @foreach($areas as $area)
                    <option value="{{ $area->id }}"><span class="inline-block w-2 h-2 mr-2 rounded-full" style="background-color: {{ $area->color }}"></span>#{{ $area->id }} - {{ $area->name }}</option>
                    @endforeach
                </select>
            @error('area_id')
            <label for="area_id">
                <span class="block text-sm text-red-600">{{ $message }}</span>
            </label>
            @enderror
        </div>
        <div class="mb-6">
            <label for="group_id">
                <span class="block text-sm uppercase font-bold">Grupo</span>
            </label>
                <select id="group_id" name="group_id"  wire:model="group_id" class="my-2 block w-full text-sm border-1 rounded-md">
                    <option>Selecione um grupo...</option>
                    @foreach($groups as $group)
                    <option value="{{ $group->id }}"><span class="inline-block w-2 h-2 mr-2 rounded-full" style="background-color: {{ $group->color }}"></span>#{{ $group->id }} - {{ $group->name }}</option>
                    @endforeach
                </select>
            @error('group_id')
            <label for="group_id">
                <span class="block text-sm text-red-600">{{ $message }}</span>
            </label>
            @enderror
        </div>
        <div class="mb-6">
            <button type="submit" class="px-6 py-3 block w-full text-center text-white rounded-full bg-blue-700 hover:bg-blue-800">
                Salvar Paciente
            </button>
        </div>
    </form>
    <div class="mb-6">
        <a href="{{ route('patient') }}" class="px-6 py-3 block w-full text-center text-gray-800 no-underline bg-gray-200 rounded-full hover:bg-gray-300">
            Voltar
        </a>
    </div>
    <div class="mt-12 mb-6">
        <button type="button" class="text-xs text-red-900 float-right" onclick="confirm('Você tem certeza que deseja apagar esse paciente?\n\n!!! Esta ação não poderá ser desfeita !!!') || event.stopImmediatePropagation()" wire:click="remove">
            Deletar Paciente
        </button>
    </div>
</div>