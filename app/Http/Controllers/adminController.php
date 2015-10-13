<?php

namespace App\Http\Controllers;

use App\Spaceships; // for database
use App\Http\Requests\SpaceshipRequest; // for validation
//use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class adminController extends Controller
{
    public function index() {
        $spaceships = Spaceships::latest('created_at')->get();

        return view('admin.index', compact('spaceships'));
    }

    public function create() {
        return view('admin.create');
    }

    public function edit($id) {
        $spaceships = Spaceships::findOrFail($id);
        return view('admin.edit', compact('spaceships'));
    }

    public function update($id, SpaceshipRequest $request) {
        $spaceships = Spaceships::findOrFail($id);
        $spaceships->update($request->all());
        session()->flash('flash_message', 'Корабль обновлен.');
        return redirect('admin');
    }



    public function delete() {
        return view('admin.delete');
    }

    public function show($id) {
        $spaceship = Spaceships::findOrFail($id);

        return view('admin.show', compact('spaceship'));
    }

    // Add to db from the form
    public function store(SpaceshipRequest $request) {
        // validation
        $spaceships = new Spaceships();
        $spaceships->create($request->all());
        session()->flash('flash_message', 'Корабль добавлен в базу.');
        return redirect('admin');
    }


}
