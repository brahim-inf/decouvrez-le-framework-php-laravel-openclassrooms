<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function getForm()
    {
    	return view('contact');
    }

    public function postForm(Request $Request)
    {
    	return view('confirm');
    }
}
