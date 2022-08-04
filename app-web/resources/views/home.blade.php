<x-app-layout>
<div id="map" class="w-full h-full min-h-full"></div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @livewire('view-map')
        </div>
    </div>
    @push('styles')
    <style>
        #map {
            height: 550px;
            width: 100%;
        }
    </style>
    @endpush
    @push('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env("GOOGLE_MAPS_API_KEY")}}&callback=initMap&v=weekly" defer></script>
    @endpush
</x-app-layout>

