<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
class LikeController extends Controller
{
    public function index(Request $request)
	{
		
        $condition = ['image_id' => $request->image_id,
    				  'user_id' => $request->user_id];
		$image_likes = Like::where($condition)->get();
		$length = count($image_likes);
		$like = "sorry";
		if($length>0)
		{
			$like = "sorry";
		}else{
			$like=Like::create([
            'image_id' => $request->image_id,
            'user_id' => $request->user_id,
        	]);

        	//return response()->json($like);
		}

		//$like_count = Like::where('image_id',$request->image_id)->get();
		return response()->json($like);
    	
	}

}