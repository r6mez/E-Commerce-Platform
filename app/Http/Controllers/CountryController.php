<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    public function showAll(Request $request)
    {
        $countries = Country::all();
        return view('dashboard.countries.manage', compact('countries'));
    }

    public function createCountry()
    {
        return view('dashboard.countries.add');
    }

    public function storeCountry(Request $request)
    {
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
        return redirect()->route('manageCountries');
    }

    public function editCountry($id)
    {
        $country = Country::findOrFail($id);
        return view('dashboard.countries.edit', compact('country'));
    }

    public function updateCountry(Request $request, $id)
    {
        $country = Country::findOrFail($id);
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
        return redirect()->route('manageCountries');
    }

    public function destroyCountry($id)
    {
        $country = Country::findOrFail($id);
        $country->delete();
        return redirect()->route('manageCountries');
    }
}
ini_set('max_execution_time', 60);
