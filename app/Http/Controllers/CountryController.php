<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\Area;
use App\Image;

class CountryController extends Controller
{
    public function index($id)
	{
		$countries = Country::all(); //nav country name
		$page = Country::findOrFail($id); // country page
		$page_name = $page->name; // country name
		$areas = Area::where('country_id', $id)->get(); // areas of that country
		$images = Image::all();

    	return view('tour')->with('countries',$countries)->with('page_name', $page_name)->with('areas', $areas)->with('images', $images);
	}
}
