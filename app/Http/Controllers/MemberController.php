<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Country;

class MemberController extends Controller
{

	public function index()
	{

		$members = Member::all();
		$countries = Country::all();
    	return view('welcome')->with('members',$members)->with('countries',$countries);
	}

    public function show($id)
    {
        
    }
}
