<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getInfos()
    {
    	return view('infos');
    }
    public function postInfos()
    {
    	
    }
}
