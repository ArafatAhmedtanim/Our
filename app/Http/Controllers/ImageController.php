<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Image;
use App\Like;
class ImageController extends Controller
{
    public function index($id)
	{
		$i=0;
		$photos = Image::where('area_id', $id)->get();
		$photo_num = count($photos);
		$like_photo_count=array();
		$like_photos = array();
		if($photo_num > 0){
			foreach ($photos as $photo) {
				$like_photo =Like::where('image_id', $photo->id)->get();
				$like_photos[$i] = $like_photo; 
				$count = count($like_photo);
				$like_photo_count[$photo->id] = $count;
				$i++;
			}
		}
		return response()->json(array('photos'=> $photos, 'like_photo_count'=>$like_photo_count, 'like_photos'=>$like_photos));		

	}
}
