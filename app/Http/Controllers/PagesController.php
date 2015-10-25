<?php

namespace App\Http\Controllers;

use App\Spaceships;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function index() {
        $spaceships = Spaceships::latest('created_at')->paginate(10);

        return view('home', compact('spaceships'));
    }

    public function about() {
    	return view('pages.about');
    }

    public function contact() {
    	return view('pages.contact');
    }
}
