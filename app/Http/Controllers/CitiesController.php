<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    public function index()
    {
        return City::get(['plate', 'name', 'id']);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');

        return City::search($search)->get(['plate', 'name', 'id']);
    }

}
