<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    public function showAll(Request $request)
    {
        $countries = Country::all();
        return view('admin.countries.manage', compact('countries'));
    }
}
ini_set('max_execution_time', 60);
