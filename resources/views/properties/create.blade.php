@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
@endsection

@section('content')
<div class="container mx-auto px-4 pt-24 pb-8">
    <h1 class="text-3xl font-bold mb-8">Nieuwe Property Aanmaken</h1>

    <form action="{{ route('properties.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="property_category_id">Categorie</label>
            <input type="number" name="property_category_id" id="property_category_id" value="{{ old('property_category_id') }}">
        </div>

        <div class="mb-4">
            <label for="title">Titel</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required>
        </div>

        <div class="mb-4">
            <label for="description">Beschrijving</label>
            <textarea name="description" id="description">{{ old('description') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="location">Locatie</label>
            <input type="text" name="location" id="location" value="{{ old('location') }}">
        </div>

        <div class="mb-4">
            <label for="latitude">Latitude</label>
            <input type="text" name="latitude" id="latitude" value="{{ old('latitude') }}" readonly>
        </div>

        <div class="mb-4">
            <label for="longitude">Longitude</label>
            <input type="text" name="longitude" id="longitude" value="{{ old('longitude') }}" readonly>
        </div>

        <div id="map" style="height: 300px;" class="mb-8"></div>

        <div class="mb-4">
            <label for="price">Prijs (€)</label>
            <input type="number" step="0.01" name="price" id="price" value="{{ old('price') }}" required>
        </div>

        <div class="mb-4">
            <label for="bedrooms">Slaapkamers</label>
            <input type="number" name="bedrooms" id="bedrooms" value="{{ old('bedrooms') }}">
        </div>

        <div class="mb-4">
            <label for="bathrooms">Badkamers</label>
            <input type="number" name="bathrooms" id="bathrooms" value="{{ old('bathrooms') }}">
        </div>

        <div class="mb-4">
            <label for="area_sqft">Oppervlakte (m²)</label>
            <input type="number" name="area_sqft" id="area_sqft" value="{{ old('area_sqft') }}">
        </div>

        <div class="mb-4">
            <label for="year_built">Bouwjaar</label>
            <input type="number" name="year_built" id="year_built" value="{{ old('year_built') }}">
        </div>

        <div class="mb-4">
            <label for="property_type">Type</label>
            <input type="text" name="property_type" id="property_type" value="{{ old('property_type') }}">
        </div>

        <div class="mb-4">
            <label for="status">Status</label>
            <input type="text" name="status" id="status" value="{{ old('status') }}">
        </div>

        <div class="mb-4">
            <label for="list_date">Datum op lijst</label>
            <input type="date" name="list_date" id="list_date" value="{{ old('list_date') }}">
        </div>

        <div class="mb-4">
            <label for="sold_date">Verkocht op</label>
            <input type="date" name="sold_date" id="sold_date" value="{{ old('sold_date') }}">
        </div>

        <div class="mb-4">
            <label for="user_id">Gebruiker ID</label>
            <input type="number" name="user_id" id="user_id" value="{{ old('user_id') }}">
        </div>

        <div class="mb-4">
            <label for="team_id">Team ID</label>
            <input type="number" name="team_id" id="team_id" value="{{ old('team_id') }}">
        </div>

        <div class="mb-4">
            <label for="virtual_tour_url">Virtuele Tour URL</label>
            <input type="text" name="virtual_tour_url" id="virtual_tour_url" value="{{ old('virtual_tour_url') }}">
        </div>

        <div class="mb-4">
            <label for="is_featured">Uitgelicht?</label>
            <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
        </div>

        <div class="mb-4">
            <label for="rightmove_id">Rightmove ID</label>
            <input type="text" name="rightmove_id" id="rightmove_id" value="{{ old('rightmove_id') }}">
        </div>

        <div class="mb-4">
            <label for="zoopla_id">Zoopla ID</label>
            <input type="text" name="zoopla_id" id="zoopla_id" value="{{ old('zoopla_id') }}">
        </div>

        <div class="mb-4">
            <label for="onthemarket_id">OnTheMarket ID</label>
            <input type="text" name="onthemarket_id" id="onthemarket_id" value="{{ old('onthemarket_id') }}">
        </div>

        <div class="mb-4">
            <label for="energy_rating">Energieklasse</label>
            <input type="text" name="energy_rating" id="energy_rating" value="{{ old('energy_rating') }}">
        </div>

        <div class="mb-4">
            <label for="energy_score">Energie Score</label>
            <input type="number" name="energy_score" id="energy_score" value="{{ old('energy_score') }}">
        </div>

        <div class="mb-4">
            <label for="energy_rating_date">Energieklasse Datum</label>
            <input type="date" name="energy_rating_date" id="energy_rating_date" value="{{ old('energy_rating_date') }}">
        </div>

        <div class="mb-4">
            <label for="smart_home_features">Smart Home Features (JSON)</label>
            <textarea name="smart_home_features" id="smart_home_features">{{ old('smart_home_features') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="floor_plan_data">Plattegrond Data (JSON)</label>
            <textarea name="floor_plan_data" id="floor_plan_data">{{ old('floor_plan_data') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="floor_plan_image">Plattegrond Afbeelding (URL)</label>
            <input type="text" name="floor_plan_image" id="floor_plan_image" value="{{ old('floor_plan_image') }}">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Opslaan</button>
        <a href="{{ route('properties.index') }}" class="ml-4 text-gray-600">Annuleren</a>
    </form>
</div>
@endsection

@section('scripts')
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        var map = L.map('map').setView([52.370216, 4.895168], 7); // Nederland als startpunt

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
        }).addTo(map);

        var marker;

        map.on('click', function(e) {
            var lat = e.latlng.lat;
            var lng = e.latlng.lng;

            if (marker) {
                marker.setLatLng(e.latlng);
            } else {
                marker = L.marker(e.latlng).addTo(map);
            }

            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lng;
        });
    </script>
@endsection