<?php

namespace App\Http\Controllers;

use App\Person2;
use Illuminate\Http\Request;

class Person2Controller extends Controller
{
    public function index(Request $request){
        $items = Person2::all();
        return view('person2.index', ['items' => $items]);
    }
}
