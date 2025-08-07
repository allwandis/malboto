<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class PropertyController extends Controller
{
    public function search()
    {
        return view('properties.search');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Haal alle properties op uit de database
        $properties = Property::all();

        // Geef de view properties.index en stuur de data mee
        $properties = Property::all();
        return view('properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('properties.create');
    }

    public function edit(Property $property)
    {
        return view('properties.edit', compact('property'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'property_category_id' => 'nullable|integer',
            'title'                => 'required|max:255',
            'description'          => 'nullable|string',
            'location'             => 'nullable|string',
            'latitude'             => 'nullable|numeric',
            'longitude'            => 'nullable|numeric',
            'price'                => 'required|numeric',
            'bedrooms'             => 'nullable|integer',
            'bathrooms'            => 'nullable|integer',
            'area_sqft'            => 'nullable|integer',
            'year_built'           => 'nullable|integer',
            'property_type'        => 'nullable|string',
            'status'               => 'nullable|string',
            'list_date'            => 'nullable|date',
            'sold_date'            => 'nullable|date',
            'user_id'              => 'nullable|integer',
            'team_id'              => 'nullable|integer',
            'virtual_tour_url'     => 'nullable|string',
            'is_featured'          => 'nullable|boolean',
            'rightmove_id'         => 'nullable|string',
            'zoopla_id'            => 'nullable|string',
            'onthemarket_id'       => 'nullable|string',
            'energy_rating'        => 'nullable|string',
            'energy_score'         => 'nullable|integer',
            'energy_rating_date'   => 'nullable|date',
            'smart_home_features'  => 'nullable|string',
            'floor_plan_data'      => 'nullable|string',
            'floor_plan_image'     => 'nullable|string',
        ]);

        Property::create($validated);

        return redirect()
            ->route('properties.index')
            ->with('success', 'Property succesvol toegevoegd.');
    }

    public function show(Property $property)
    {
        return view('properties.show', compact('property'));
    }

    public function update(Request $request, Property $property)
    {
        $validated = $request->validate([
            'property_category_id' => 'nullable|integer',
            'title'                => 'required|max:255',
            'description'          => 'nullable|string',
            'location'             => 'nullable|string',
            'latitude'             => 'nullable|numeric',
            'longitude'            => 'nullable|numeric',
            'price'                => 'required|numeric',
            'bedrooms'             => 'nullable|integer',
            'bathrooms'            => 'nullable|integer',
            'area_sqft'            => 'nullable|integer',
            'year_built'           => 'nullable|integer',
            'property_type'        => 'nullable|string',
            'status'               => 'nullable|string',
            'list_date'            => 'nullable|date',
            'sold_date'            => 'nullable|date',
            'user_id'              => 'nullable|integer',
            'team_id'              => 'nullable|integer',
            'virtual_tour_url'     => 'nullable|string',
            'is_featured'          => 'nullable|boolean',
            'rightmove_id'         => 'nullable|string',
            'zoopla_id'            => 'nullable|string',
            'onthemarket_id'       => 'nullable|string',
            'energy_rating'        => 'nullable|string',
            'energy_score'         => 'nullable|integer',
            'energy_rating_date'   => 'nullable|date',
            'smart_home_features'  => 'nullable|string',
            'floor_plan_data'      => 'nullable|string',
            'floor_plan_image'     => 'nullable|string',
        ]);

        $property->update($validated);

        return redirect()->route('properties.index')
            ->with('success', 'Property succesvol bijgewerkt.');
    }
}


