<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ImagesRequest;

class ImageController extends Controller
{
    public function getForm()
    {
    	return view('image');
    }

    public function postForm(ImagesRequest $request)
    {
    	$image = $request->file('image');
    	if($image->isValid())
    	{
    		$chemin = config('images.path');
    		$extension = $image->getClientOriginalExtension();
    		do{
    			$nom = str_random(10).'.'.$extension;
    		}while(file_exists($chemin.'/'.$nom));
    		if ($image->move($chemin, $nom)) {
    			return view('image_ok');
    		}
    	}
    	return redirect('image')->with('error', 'Désolé mais votre image ne peut pas être envoyée!');
    }
}
