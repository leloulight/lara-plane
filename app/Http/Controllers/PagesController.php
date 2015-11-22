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

        $meta_title = 'Космические корабли';
        return view('home', compact('spaceships', 'meta_title'));
    }

    public function contact() {
        $meta_title = 'Контакты';
    	return view('pages.contact', compact('meta_title'));
    }

    public function search(Request $request) {
        $name = $request->input('name');
        if(!is_null($name)) {
            $spaceships = Spaceships::select('id', 'name')->where('name', 'LIKE', '%' . $name . '%')->paginate(10);

            // if request is similar redirect to page of spaceship
            foreach($spaceships as $value) {
                if($name === $value->name) {
                    return redirect('spaceships/' . $value->id);
                }
            }
        }else {
            $spaceships = false;
        }

        $meta_title = 'Поиск по сайту';
        return view('pages.search', compact('spaceships', 'meta_title'));
    }
}
