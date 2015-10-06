<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Spaceships;
use Request;

class adminController extends Controller
{
    public function index() {
        $spaceships = Spaceships::latest('created_at')->get();

        return view('admin.index', compact('spaceships'));
    }

    public function create() {
        return view('admin.create');
    }

    public function update() {
        return view('admin.update');
    }

    public function delete() {
        return view('admin.delete');
    }

    public function store() {
        // Получаем данные из формы
        $input = Request::all();

        $spaceships = new Spaceships();
//        $spaceships->name = $input['name'];
        $spaceships->create($input);
        return redirect('admin');
    }


}
