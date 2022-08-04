<div>
    <form wire:submit.prevent="submit">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-white px-4 py-4 rounded sm:px-6 lg:px-8">
                <label>
                    <span class="block text-sm uppercase font-bold mb-2">Áreas</span>
                </label>
                <div class="max-h-32 overflow-auto">
                    @foreach($areas as $area)
                    <div class="flex items-start items-center mb-2">
                        <div class="flex my-0 h-5">
                            <input type="checkbox" name="area_id" id="area_id_{{ $area->id }}" wire:model="area_id" value="{{ $area->id }}" class="h-4 w-4 border-gray-300 rounded">
                        </div>
                        <div class="flex items-center ml-3 my-0 text-sm">
                            <label for="area_id_{{ $area->id }}" class="font-medium text-gray-700 align-middle"><span class="inline-block w-6 h-3 mr-2 rounded-md" style="background-color: {{ $area->color }}"></span>{{ $area->name }}</label>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="bg-white px-4 py-4 rounded sm:px-6 lg:px-8">
                <label>
                    <span class="block text-sm uppercase font-bold mb-2">Grupos</span>
                </label>
                <div class="max-h-32 overflow-auto">
                    @foreach($groups as $group)
                    <div class="flex items-start items-center mb-2">
                        <div class="flex my-0 h-5">
                            <input type="checkbox" name="group_id" id="group_id_{{ $group->id }}" wire:model="group_id" value="{{ $group->id }}" class="h-4 w-4 border-gray-300 rounded">
                        </div>
                        <div class="flex items-center ml-3 my-0 text-sm">
                            <label for="group_id_{{ $group->id }}" class="font-medium text-gray-700 align-middle"><span class="inline-block w-6 h-3 mr-2 rounded-md" style="background-color: {{ $group->color }}"></span>{{ $group->name }}</label>
                        </div>
                    </div>
                    @endforeach
                    <div class="flex items-start items-center mb-2">
                        <div class="flex my-0 h-5">
                            <input type="checkbox" class="h-4 w-4 border-transparent rounded" disabled>
                        </div>
                        <div class="flex items-center ml-3 my-0 text-sm">
                            <label class="font-medium text-gray-700 align-middle"><span class="inline-block w-6 h-3 mr-2 rounded-md" style="background-color: black"></span>Endereço com mais de um grupo</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white px-4 py-4 rounded sm:px-6 lg:px-8">
                <label for="search">
                    <span class="block text-sm uppercase font-bold">PACIENTE</span>
                </label>
                <input type="text" name="search" id="search" wire:model.lazy="search" class="my-2 block w-full text-sm rounded-md border-1" placeholder="Pesquisar pelo nome, CNS ou telefone..."/>
                <label>
                    <span class="block text-sm uppercase mt-6 text-center">Endereços com mais de um paciente terão um indicador númerico abaixo.</span>
                </label>
            </div>
            <div class="md:col-start-2 items-center my-0">
                <button type="submit" class="px-6 py-3 block w-full text-center text-white rounded-full bg-blue-700 hover:bg-blue-800">
                    Filtrar
                </button>
            </div>
        </div>
    </form>

    
    @push('scripts')
    <script>
        function pinSymbol(color){
            return {
                path: 'M 0,0 C -2,-20 -10,-22 -10,-30 A 10,10 0 1,1 10,-30 C 10,-22 2,-20 0,0 z',
                fillColor: color,
                fillOpacity: 1,
                strokeColor: '#FFF',
                strokeWeight: 2,
                scale: 1,
            };
        }

        function drawAreas(){
            let areas = Object.values(@this.sa)
            
            areas.forEach((area) => {
                let coords = [];

                area.coords.split(';').forEach((coord) => {
                    let buffer = coord.split(',');
                    coords.push({ lat: parseFloat(buffer[0]), lng: parseFloat(buffer[1]) });
                });

                let gArea = new google.maps.Polygon({
                    paths: coords,
                    strokeColor: area.color,
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: area.color,
                    fillOpacity: 0.35,
                });
                
                gArea.setMap(map)
                gAreas.push(gArea);
            });
        }

        function deleteAreas(){
            gAreas.forEach((gArea) => {
                gArea.setMap(null);
            });
            gAreas = [];
        }

        function drawMarkers(){
            let coords = Object.values(@this.coords);

            coords.forEach((coord) => {
                console.log(coord);

                

                let confs = {
                    position: {
                        lat: parseFloat(coord.coord[0]),
                        lng: parseFloat(coord.coord[1])
                    },
                    map: map,
                    icon: pinSymbol(coord.color)
                };
                if(coord.size > 1){
                    confs.label = {
                        text: String(coord.size),
                        color: "black",
                        fontWeight: "bold"
                    }
                }

                let gMarker = new google.maps.Marker(confs);

                let markerContent = '<div id="content">'+
                    '<span class="text-lg font-bold">'+coord.patients[0].address+'</span>'+
                    '<div id="bodyContent">';

                coord.patients.forEach((patient) => {
                    markerContent = markerContent +
                        '<span class="text-sm font-bold mt-2"><br>'+patient.name+', '+patient.age+' - '+patient.groupName+'<br></span>'+
                        '<span class="text-sm">CNS: '+patient.cns+'<br></span>'+
                        '<span class="text-sm">DN: '+patient.birthbr+'<br></span>'+
                        '<span class="text-sm">Telefone: '+patient.phone;
                    
                    if(patient.responsible != null){
                        markerContent = markerContent +
                            ' - '+patient.responsible
                    }
                    if(patient.relationship != null){
                        markerContent = markerContent +
                            ' ('+patient.relationship+')'
                    }
                    markerContent = markerContent +
                        '<br></span>'
                });
                markerContent = markerContent +
                    "</div>" +
                    "</div>";
                
                let markerInfo = new google.maps.InfoWindow({
                    content: markerContent
                });

                gMarker.addListener("click", () => {
                    try {
                        if(last != null){
                            last.close()
                        }
                    } finally {
                    last = markerInfo;
                    markerInfo.open({
                        anchor: gMarker,
                        map,
                        shouldFocus: false,
                    });
                    }
                })

                gMarkers.push(gMarker);
            });
        }

        function deleteMarkers(){
            gMarkers.forEach((gMarker) => {
                gMarker.setMap(null);
            });
            gMarkers = [];
        }

        let map;
        let gAreas = [];
        let gMarkers = [];
        let last = null

        Livewire.on('reloadMap', () => {
            deleteAreas();
            drawAreas();
            deleteMarkers();
            drawMarkers();
        });
        
        function initMap(){            
            const center = {
                lat: -31.756360,
                lng: -52.307682
            };
            
            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 16,
                center: center,
                gestureHandling: "cooperative",
                styles: [{
                    elementType: "labels",
                    stylers: [{ visibility: "off" }]
                },{
                    featureType: "road",
                    elementType: "labels",
                    stylers: [{ visibility: "on" }]

                },{
                    featureType: "water",
                    elementType: "labels",
                    stylers: [{ visibility: "on" }]

                }],
            });

            drawAreas();
            drawMarkers();
        }

        window.initMap = initMap;
    </script>
    @endpush
</div>