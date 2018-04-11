<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImagesRequest;
use App\Gestion\ImageGestionInterface;

class ImageController extends Controller
{
    public function getForm()
    {
    	return view('image');
    }

    public function postForm(ImagesRequest $request, ImageGestionInterface $imagetogestion)
    {
    	if ($imagetogestion->save($request->file('image'))) {
    		return view('image_ok');
    	}
    	return redirect('image')->with('error', 'Désolé mais votre image ne peut pas être envoyée!');
    }
}
