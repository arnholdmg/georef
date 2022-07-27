<div>
    <input type="text" name="search" id="groupSearch" wire:model.lazy="search" class="block w-full text-sm mb-12 rounded-md border-1" placeholder="Pesquisar..."/>

    <div class="bg-white overflow-auto text-sm">
        <table class="w-full table-auto border border-solid border-2">
            <thead>
                <tr>
                <th class="px-4 py-2 border border-solid border-2">#</th>
                <th class="px-4 py-2 border border-solid border-2">NOME</th>
                <th class="px-4 py-2 border border-solid border-2">COR</th>
                <th class="px-4 py-2 border border-solid border-2"></th>
                </tr>
            </thead>
            <tbody>
                @if(isset($groups) && $groups->total() > 0)
                @foreach($groups as $group)
                <tr>
                <td class="px-4 py-2 border border-solid border-2">{{ $group->id }}</td>
                <td class="px-4 py-2 border border-solid border-2">{{ $group->name }}</td>
                <td class="px-4 py-2 border border-solid border-2"><span class="inline-block w-2 h-2 mr-2 rounded-full" style="background-color: {{ $group->color }}"></span>{{ $group->color }}</td>
                <td class="px-4 py-2 border border-solid border-2">
                    <a href="{{ route('group.update', ['group' => $group->id]) }}" class="px-6 py-3 text-gray-800 bg-transparent hover:underline">
                        Editar
                    </a>
                </td>
                </tr>
                @endforeach
                @else
                <tr>
                <td colspan="5" class="px-4 py-2 border border-solid border-2">Não foram encontrados grupos cadastrados.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class="py-2">
        {{ $groups->links('pagination') }}
    </div>
</div>