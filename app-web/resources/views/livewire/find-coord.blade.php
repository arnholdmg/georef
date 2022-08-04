<div>
    <form wire:submit.prevent="submit">
        <div class="mb-6">
            <label for="address">
            <span class="block text-sm mb-5 font-bold">Para melhores resultados, busque manualmente o endereço no <a target="_blank" class="hover:underline" href="https://maps.google.com">Google Maps</a>.</span>
            <span class="block text-sm mb-5 font-bold">Esta ferramenta utiliza a API disponibilizada pelo <a target="_blank" class="hover:underline" href="https://nominatim.openstreetmap.org">Nominatin OpenStreetMap</a>. Os resultados devem ser sempre conferidos, podendo ser imprecisos ou até mesmo incorretos.</span>
            <span class="block text-sm">Informe o endereço completo no campo utilizando o formato "NOME DA RUA, NÚMERO, BAIRRO, CIDADE, ESTADO, CEP".</span>
            <span class="block text-sm">Ex.: "Avenida Juscelino Kubitschek de Oliveira, 2200, Areal, Pelotas, Rio Grande do Sul, 96085000"</span>
            </label>
            <input type="text" name="address" id="address" wire:model="address" class="my-2 block w-full text-sm rounded-md border-1"/>
        </div>
        <div class="mb-6">
            <button type="submit" class="px-6 py-3 block w-full text-center text-white rounded-full bg-blue-700 hover:bg-blue-800">
                Buscar Coordenada
            </button>
        </div>
    </form>
    @if($found)
    <div class="text-center">
        <span class="block text-md uppercase font-bold">coordenada aproximada é<br>{{ $lat }},{{ $lng}}</span>
    </div>    
    @endif
</div>