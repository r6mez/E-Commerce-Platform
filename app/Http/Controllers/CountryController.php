<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        $countries = Country::all();

        return view('dashboard.countries.manage', compact('countries'));
    }

    public function create()
    {
        return view('dashboard.countries.add');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'iso_code' => 'required|string|max:2',
                'currency_code' => 'required|string|max:3',
                'currency_symbol' => 'required|string|max:5',
                'usd_value' => 'required|numeric',
            ]);

            Country::create($request->only([
                'name',
                'iso_code',
                'currency_code',
                'currency_symbol',
                'usd_value',
            ]));

            return redirect()->route('countries.index')->with('success', 'Country created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('countries.index')->with('error', 'An error occurred while creating the country.');
        }
    }

    public function edit(Country $country)
    {
        return view('dashboard.countries.edit', compact('country'));
    }

    public function update(Request $request, Country $country)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'iso_code' => 'required|string|max:2',
                'currency_code' => 'required|string|max:3',
                'currency_symbol' => 'required|string|max:5',
                'usd_value' => 'required|numeric',
            ]);

            $country->update($request->only([
                'name',
                'iso_code',
                'currency_code',
                'currency_symbol',
                'usd_value',
            ]));

            return redirect()->route('countries.index')->with('success', 'Country updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('countries.index')->with('error', 'An error occurred while updating the country.');
        }
    }

    public function destroy(Country $country)
    {
        try {
            $country->delete();

            return redirect()->route('countries.index')->with('success', 'Country deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('countries.index')->with('error', 'An error occurred while deleting the country.');
        }
    }
}
ini_set('max_execution_time', 60);
