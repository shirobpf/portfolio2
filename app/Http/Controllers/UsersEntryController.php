<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersEntryController extends Controller
{
    public function input(){
        $hash = array(
            'subtitle' => '入力画面', 
        );
        return view('usersEntry.input')->with($hash);
    }
}
