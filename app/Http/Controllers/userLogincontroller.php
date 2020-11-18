<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userLogincontroller extends Controller
{
    public function login($id = "")
    {
        return $id.'さんテストだよー';
    }
}
