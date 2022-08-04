<div>
    <input type="text" name="search" id="userSearch" wire:model.lazy="search" class="block w-full text-sm mb-12 rounded-md border-1" placeholder="Pesquisar..."/>

    <div class="bg-white overflow-auto text-sm">
        <table class="w-full table-auto border border-solid border-2">
            <thead>
                <tr>
                <th class="px-4 py-2 border border-solid border-2">#</th>
                <th class="px-4 py-2 border border-solid border-2">NOME</th>
                <th class="px-4 py-2 border border-solid border-2">E-MAIL</th>
                <th class="px-4 py-2 border border-solid border-2">GERENCIADOR<br>DE ÁREAS</th>
                <th class="px-4 py-2 border border-solid border-2">GERENCIADOR<br>DE GRUPOS</th>
                <th class="px-4 py-2 border border-solid border-2">GERENCIADOR<br>DE PACIENTES</th>
                <th class="px-4 py-2 border border-solid border-2">GERENCIADOR<br>DE USUÁRIOS</th>
                <th class="px-4 py-2 border border-solid border-2"></th>
                </tr>
            </thead>
            <tbody>
                @if(isset($users) && $users->total() > 0)
                @foreach($users as $user)
                <tr>
                <td class="px-4 py-2 border border-solid border-2">{{ $user->id }}</td>
                <td class="px-4 py-2 border border-solid border-2">{{ $user->name }}</td>
                <td class="px-4 py-2 border border-solid border-2">{{ $user->email }}</td>
                <td class="px-4 py-2 border border-solid border-2">@if($user->isAdmArea) Sim @else Não @endif</td>
                <td class="px-4 py-2 border border-solid border-2">@if($user->isAdmGroup) Sim @else Não @endif</td>
                <td class="px-4 py-2 border border-solid border-2">@if($user->isAdmPatient) Sim @else Não @endif</td>
                <td class="px-4 py-2 border border-solid border-2">@if($user->isAdmUser) Sim @else Não @endif</td>
                <td class="px-4 py-2 border border-solid border-2">
                    <a href="{{ route('user.update', ['user' => $user->id]) }}" class="px-6 py-3 text-gray-800 bg-transparent hover:underline">
                        Editar
                    </a>
                </td>
                </tr>
                @endforeach
                @else
                <tr>
                <td colspan="8" class="px-4 py-2 border border-solid border-2">Não foram encontradas pacientes cadastrados.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class="py-2">
        {{ $users->links('pagination') }}
    </div>
</div>