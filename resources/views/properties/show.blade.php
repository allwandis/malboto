@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
@endsection

@section('content')
<div class="container mx-auto px-4 pt-24 pb-8">
    <h1 class="text-3xl font-bold mb-8">{{ $property->title }}</h1>
    <p>{{ $property->description }}</p>
    <p><strong>Locatie:</strong> {{ $property->location }}</p>
    <p><strong>Prijs:</strong> &euro;{{ number_format($property->price, 2, ',', '.') }}</p>

    <div id="map" style="height: 300px;" class="mb-8"></div>

    <a href="{{ route('properties.index') }}" class="text-blue-500 mt-4 inline-block">Terug naar overzicht</a>
</div>
@endsection

@section('scripts')
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        var lat = {{ $property->latitude ?? 52.370216 }};
        var lng = {{ $property->longitude ?? 4.895168 }};
        var map = L.map('map').setView([lat, lng], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
        }).addTo(map);

        if (lat && lng) {
            L.marker([lat, lng]).addTo(map)
                .bindPopup("{{ $property->title }}")
                .openPopup();
        }
    </script>
@endsection