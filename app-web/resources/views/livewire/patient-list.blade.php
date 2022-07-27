<div>
    <input type="text" name="search" id="patientSearch" wire:model.lazy="search" class="block w-full text-sm mb-12 rounded-md border-1" placeholder="Pesquisar pelo nome, CNS ou telefone..."/>

    <div class="bg-white overflow-auto text-sm">
        <table class="w-full table-auto border border-solid border-2">
            <thead>
                <tr>
                <th class="px-4 py-2 border border-solid border-2">#</th>
                <th class="px-4 py-2 border border-solid border-2">NOME</th>
                <th class="px-4 py-2 border border-solid border-2">DATA DE<br>NASCIMENTO</th>
                <th class="px-4 py-2 border border-solid border-2">CNS</th>
                <th class="px-4 py-2 border border-solid border-2">TELEFONE</th>
                <th class="px-4 py-2 border border-solid border-2">ÁREA</th>
                <th class="px-4 py-2 border border-solid border-2">GRUPO</th>
                <th class="px-4 py-2 border border-solid border-2"></th>
                </tr>
            </thead>
            <tbody>
                @if(isset($patients) && $patients->total() > 0)
                @foreach($patients as $patient)
                <tr>
                <td class="px-4 py-2 border border-solid border-2">{{ $patient->id }}</td>
                <td class="px-4 py-2 border border-solid border-2">{{ $patient->name }}</td>
                <td class="px-4 py-2 border border-solid border-2">{{ $patient->birth }}</td>
                <td class="px-4 py-2 border border-solid border-2">{{ $patient->cns }}</td>
                <td class="px-4 py-2 border border-solid border-2">{{ $patient->phone }}</td>
                <td class="px-4 py-2 border border-solid border-2"><span class="inline-block w-2 h-2 mr-2 rounded-full" style="background-color: {{ $patient->area->color }}"></span>{{ $patient->area->name }}</td>
                <td class="px-4 py-2 border border-solid border-2"><span class="inline-block w-2 h-2 mr-2 rounded-full" style="background-color: {{ $patient->group->color }}"></span>{{ $patient->group->name }}</td>
                <td class="px-4 py-2 border border-solid border-2">
                    <a href="{{ route('patient.update', ['patient' => $patient->id]) }}" class="px-6 py-3 text-gray-800 bg-transparent hover:underline">
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
        {{ $patients->links('pagination') }}
    </div>
</div>